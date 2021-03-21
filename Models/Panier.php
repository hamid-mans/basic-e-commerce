<?php

/* CLASS
* @Author: Hamid
* @GitHub: LapinDev/baisc-e-commerce
* @License: Apache License 2.0
*/

require_once('./Models/Model.php');

class Panier extends Model
{

    public static function get($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM panier WHERE id_article = ?");
        $req->execute([$id_article]);
        $data = $req->fetch();

        return $data;
    }

    public static function add($id_article, $id_var) {
        $db = Model::connect();

        $shop_verif = $db->prepare("SELECT * FROM panier INNER JOIN shop ON shop.id = panier.id_article WHERE panier.id_article = ?");
        $shop_verif->execute([$id_article]);
        $data_shop_verif = $shop_verif->rowCount();

        if($data_shop_verif >= 1) {

            $recup_qte = $db->prepare("SELECT * FROM panier WHERE id_article = ?");
            $recup_qte->execute([$id_article]);
            $data_qte = $recup_qte->fetch();

            $new_qte = $data_qte['qte'] + 1;

            $shop = $db->prepare("SELECT * FROM shop WHERE id = ?");
            $shop->execute([$id_article]);
            $data_shop = $shop->fetch();


            $ex_qte = $db->prepare("SELECT * FROM panier WHERE id_article = ? AND id_user = ?");
            $ex_qte->execute([$id_article, $_SESSION['id']]);
            $data_ex_qte = $ex_qte->fetch();
            $new_plus_qte = $data_ex_qte['qte'] + 1;
            $new_plus_poids = $data_ex_qte['poids'] + $data_shop['poids'];
            $new_plus_prix = $data_ex_qte['prix'] + $data_shop['price'];

            $new_plus_frais = $data_ex_qte['frais'] + $data_shop['frais'];

            $recup_article = $db->prepare("SELECT * FROM shop WHERE id = ?");
            $recup_article->execute([$id_article]);
            $data_article = $recup_article->fetch();

            $new_stock = $data_article['stock'] - 1;

            $moins_stock = $db->prepare("UPDATE shop SET stock = ? WHERE id = ?");
            $moins_stock->execute([$new_stock, $id_article]);

            $get_promo = Promo::get($id_article);
            $new_prix_with_promo = Promo::calcule_promo($id_article, $get_promo['promo']) + $data_ex_qte['prix'];

            if(Promo::exist($id_article)) {
                $add_qte = $db->prepare("UPDATE panier SET qte = ?, poids = ?, prix = ?, frais = ? WHERE id_article = ? AND id_user = ?");
                $add_qte->execute([$new_plus_qte, $new_plus_poids, $new_prix_with_promo, $new_plus_frais, $id_article, $_SESSION['id']]);
            } else {
                $add_qte = $db->prepare("UPDATE panier SET qte = ?, poids = ?, prix = ?, frais = ? WHERE id_article = ? AND id_user = ?");
                $add_qte->execute([$new_plus_qte, $new_plus_poids, $new_plus_prix, $new_plus_frais, $id_article, $_SESSION['id']]);
            }

            
        } else {

            $recup_poids = $db->prepare("SELECT * FROM shop WHERE id = ?");
            $recup_poids->execute([$id_article]);
            $data_poids = $recup_poids->fetch();

            $recup_prix = $db->prepare("SELECT * FROM shop WHERE id = ?");
            $recup_prix->execute([$id_article]);
            $data_prix = $recup_prix->fetch();

            if(Promo::exist($id_article)) {
                $get_promo = Promo::get($id_article);
                $new_prix_with_promo = Promo::calcule_promo($id_article, $get_promo['promo']);
            }

            $recup_frais = $db->prepare("SELECT * fROM shop WHERE id = ?");
            $recup_frais->execute([$id_article]);
            $data_frais = $recup_frais->fetch();


            if(Promo::exist($id_article)) {
                $req = $db->prepare("INSERT INTO panier(id_article, id_var, id_user, qte, poids, prix, frais) VALUES(?,?, ?, ?, ?, ?, ?)");
                $req->execute([$id_article, $id_var, $_SESSION['id'], 1, $data_poids['poids'], $new_prix_with_promo, $data_frais['frais']]);
            } else {
                $req = $db->prepare("INSERT INTO panier(id_article, id_var, id_user, qte, poids, prix, frais) VALUES(?,?, ?, ?, ?, ?, ?)");
                $req->execute([$id_article, $id_var, $_SESSION['id'], 1, $data_poids['poids'], $data_prix['price'], $data_frais['frais']]);
            }

            $new_stock = $data_frais['stock'] - 1;

            $moins_stock = $db->prepare("UPDATE shop SET stock = ? WHERE id = ?");
            $moins_stock->execute([$new_stock, $id_article]);
        }
    }

    public static function delete($id_article) {
        $db = Model::connect();

        $req = $db->prepare("DELETE FROM panier WHERE id_article = ? AND id_user = ?");
        $req->execute([$id_article, $_SESSION['id']]);

        $recup_article = $db->prepare("SELECT * FROM shop WHERE id = ?");
        $recup_article->execute([$id_article]);
        $data_article = $recup_article->fetch();

        $new_stock = $data_article['stock'] + 1;

        $moins_stock = $db->prepare("UPDATE shop SET stock = ? WHERE id = ?");
        $moins_stock->execute([$new_stock, $id_article]);

        return $req;
    }

    public static function add_qte($id_article) {
        $db = Model::connect();

        $shop = $db->prepare("SELECT * FROM shop WHERE id = ?");
        $shop->execute([$id_article]);
        $data_shop = $shop->fetch();

        $ex_qte = $db->prepare("SELECT * FROM panier WHERE id_article = ? AND id_user = ?");
        $ex_qte->execute([$id_article, $_SESSION['id']]);
        $data_ex_qte = $ex_qte->fetch();
        $new_plus_qte = $data_ex_qte['qte'] + 1;
        $new_plus_poids = $data_ex_qte['poids'] + $data_shop['poids'];

        $new_plus_frais = $data_ex_qte['frais'] + $data_shop['frais'];

        $recup_article = $db->prepare("SELECT * FROM shop WHERE id = ?");
        $recup_article->execute([$id_article]);
        $data_article = $recup_article->fetch();

        $new_stock = $data_article['stock'] - 1;

        $moins_stock = $db->prepare("UPDATE shop SET stock = ? WHERE id = ?");
        $moins_stock->execute([$new_stock, $id_article]);
        
        if(!Promo::exist($id_article)) {
            $new_plus_prix = $data_ex_qte['prix'] + $data_shop['price'];

            $add_qte = $db->prepare("UPDATE panier SET qte = ?, poids = ?, prix = ?, frais = ? WHERE id_article = ? AND id_user = ?");
            $add_qte->execute([$new_plus_qte, $new_plus_poids, $new_plus_prix, $new_plus_frais, $id_article, $_SESSION['id']]);
        } else {
            $new_plus_prix = $data_ex_qte['prix'] + Promo::calcule_promo($id_article, Promo::get($id_article)['promo']);

            $add_qte = $db->prepare("UPDATE panier SET qte = ?, poids = ?, prix = ?, frais = ? WHERE id_article = ? AND id_user = ?");
            $add_qte->execute([$new_plus_qte, $new_plus_poids, $new_plus_prix, $new_plus_frais, $id_article, $_SESSION['id']]);
        }

        return $add_qte;
        
    }

    public static function moins_qte($id_article) {
        $db = Model::connect();

        $req_shop = $db->prepare("SELECT * FROM shop WHERE id = ?");
        $req_shop->execute([$id_article]);
        $data_shop = $req_shop->fetch();

        

        $ex_qte = $db->prepare("SELECT * FROM panier WHERE id_article = ? AND id_user = ?");
        $ex_qte->execute([$id_article, $_SESSION['id']]);
        $data_ex_qte = $ex_qte->fetch();
        $new_moins_qte = $data_ex_qte['qte'] - 1;

        $new_moins_poids = $data_ex_qte['poids'] - $data_shop['poids'];
        
        $new_moins_frais = $data_ex_qte['frais'] - $data_shop['frais'];

        $recup_article = $db->prepare("SELECT * FROM shop WHERE id = ?");
        $recup_article->execute([$id_article]);
        $data_article = $recup_article->fetch();

        $new_stock = $data_article['stock'] + 1;

        $moins_stock = $db->prepare("UPDATE shop SET stock = ? WHERE id = ?");
        $moins_stock->execute([$new_stock, $id_article]);

        if(!$new_moins_qte <= 0) {
            
            if(!Promo::exist($id_article)) {
                $new_moins_prix = $data_ex_qte['prix'] - $data_shop['price'];

                $add_qte = $db->prepare("UPDATE panier SET qte = ?, poids = ?, prix = ?, frais = ? WHERE id_article = ? AND id_user = ?");
                $add_qte->execute([$new_moins_qte, $new_moins_poids, $new_moins_prix, $new_moins_frais, $id_article, $_SESSION['id']]);
            } else {
                $new_moins_prix = $data_ex_qte['prix'] - Promo::calcule_promo($id_article, Promo::get($id_article)['promo']);

                $add_qte = $db->prepare("UPDATE panier SET qte = ?, poids = ?, prix = ?, frais = ? WHERE id_article = ? AND id_user = ?");
                $add_qte->execute([$new_moins_qte, $new_moins_poids, $new_moins_prix, $new_moins_frais, $id_article, $_SESSION['id']]);
            }

            
        } else {
            $remove = $db->prepare("DELETE FROM panier WHERE id_article = ?");
            $remove->execute([$id_article]);
        }

        return $add_qte;
    }

    public static function checkStock($id_article) {
        $db = Model::connect();

        $recup_article = $db->prepare("SELECT * FROM shop WHERE id = ?");
        $recup_article->execute([$id_article]);
        $data_article = $recup_article->fetch();

        if($data_article['stock'] == 0) return false; else return true;
    }

    public static function all($session_id) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM panier WHERE id_user = ?");
        $req->execute([$session_id]);
        $data = $req->fetchAll();

        return $data;
    }

    public static function show($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM shop WHERE id = ?");
        $req->execute([$id_article]);
        $data = $req->fetch();

        return $data;
    }

    public static function count($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM panier WHERE id_article = ?");
        $req->execute([$id_article]);
        $data = $req->rowCount();

        return $data;
    }

    public static function exist_on_panier($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM panier WHERE id_article = ?");
        $req->execute([$id_article]);
        $exist_article = $req->rowCount();
        
        if($exist_article >= 1) {
            return true;
        } else {
            return false;
        }
        
    }

    public static function total($table) {
        $db = Model::connect();

        $req = $db->prepare("SELECT SUM($table) FROM panier WHERE id_user = ?");
        $req->execute([$_SESSION['id']]);

        $data = $req->fetch();

        return $data;
    }

    public static function many() {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM panier");
        $req->execute();

        $data = $req->rowCount();

        return $data;
    }

    public static function get_qte_id($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM panier WHERE id = ?");
        $req->execute([$id_article]);

        $data = $req->fetch();

        return $data;
    }

    public static function frais($prix, $pourcentage) {

        $frais = $prix * ($pourcentage / 100);
        
        return $frais;

    }

    public static function reset($id_user) {
        $db = Model::connect();
        
        $req = $db->prepare("DELETE FROM panier WHERE id_user = ?");
        $req->execute([$id_user]);

        return $req;
    }
}
