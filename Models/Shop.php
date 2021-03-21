<?php

/* CLASS
* @Author: Hamid
* @GitHub: LapinDev/baisc-e-commerce
* @License: Apache License 2.0
*/

require_once('./Models/Model.php');
//require_once('./Models/Categorie.php');

class Shop extends Model
{
    public static function add($title, $categorie, $description, $image, $price, $poids, $frais, $qualite, $marque, $variation = NULL) {
        $db = Model::connect();
        
        $req = $db->prepare("INSERT INTO shop(title, description, image, price, poids, variation) VALUES(?, ?, ?, ?, ?, ?)");
        $req->execute([$title, $description, $image, $price, $poids, $variation]);
        
        $recup_article = $db->prepare("SELECT * FROM shop WHERE title = ? AND description = ? AND image = ? AND price = ?");
        $recup_article->execute([$title, $description, $image, $price]);
        $data_article = $recup_article->fetch();

        $req_fiche = $db->prepare("INSERT INTO fiche(id_categorie, id_article, qualite, marque) VALUES(?, ?, ?, ?)");
        $req_fiche->execute([$categorie, $data_article['id'], $qualite, $marque]);
    
        $req_image = $db->prepare("INSERT INTO images(id_article, num_image, lien, active) VALUES(?,?,?,?)");
        $req_image->execute([$data_article['id'], 'image1', $image, 1]);
    }

    public static function delete($id) {
        $db = Model::connect();

        $req = $db->prepare("DELETE FROM shop WHERE id = ?");
        $req->execute([$id]);
    }

    public static function edit($id, $title, $categorie, $description, $image = 0, $price, $poids, $frais) {
        $db = Model::connect();

        if($image == 0) {
            $req_shop = $db->prepare("UPDATE shop SET title = ?, description = ?, price = ?, poids = ?, frais = ? WHERE id = ?");
            $req_shop->execute([$title, $description, $price, $poids, $frais, $id]);
        } else {
            $req_shop = $db->prepare("UPDATE shop SET title = ?, description = ?, image = ?, price = ?, poids = ?, frais = ? WHERE id = ?");
            $req_shop->execute([$title, $description, $image, $price, $poids, $frais, $id]);
        }

        $req_categorie = $db->prepare("UPDATE fiche SET id_categorie = ? WHERE id_article = ?");
        $req_categorie->execute([$categorie, $id]);
    }

    public static function exist($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM shop WHERE id = ?");
        $req->execute([$id_article]);
        $data = $req->rowCount();

        return $data;
    }

    public static function edit_fiche($id, $qualite, $practicite, $garantie, $recharge, $marque, $frais) {

        $db = Model::connect();

        $req_fiche = $db->prepare("UPDATE fiche SET qualite = ?, practicite = ?, garantie = ?, recharge = ?, marque = ? WHERE id_article = ?");
        $req_fiche->execute([$qualite, $practicite, $garantie, $recharge, $marque, $id]);

        $req_frais = $db->prepare("UPDATE shop SET frais = ? WHERE id = ?");
        $req_frais->execute([$frais, $id]);

    }

    public static function list($limit = 0) {
        $db = Model::connect();

        if(isset($limit) && !empty($limit)) {
            $req = $db->query("SELECT * FROM shop ORDER BY id DESC LIMIT 0,$limit");
        } else if($limit == 0) {
            $req = $db->query("SELECT * FROM shop");
            
        }

        $data = $req->fetchAll();

        return $data;
    }

    public static function listWithoutVariants($limit = 0) {
        $db = Model::connect();

        if(isset($limit) && !empty($limit)) {
            $req = $db->query("SELECT * FROM shop WHERE variation IS NULL ORDER BY id DESC LIMIT 0,$limit");
        } else if($limit == 0) {
            $req = $db->query("SELECT * FROM shop WHERE variation IS NULL");
            
        }

        $data = $req->fetchAll();

        return $data;
    }

    public static function show($id) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM shop WHERE id = ?");
        $req->execute([$id]);
        $data = $req->fetch();

        return $data;
    }

    public static function showFiche($id) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM fiche WHERE id_article = ?");
        $req->execute([$id]);
        $data = $req->fetch();

        return $data;
    }

    public static function frais($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM shop WHERE id = ?");
        $req->execute([$id_article]);
        $data = $req->fetch();

        $soustraire = $data['price'] / 100;
        $new_price = $soustraire * $data['frais'];
        //$soust = $data['price'] - $new_price;
        //return $soust;

        return $new_price;
    }

    public static function moment() {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM shop ORDER BY id DESC LIMIT 0,3");
        $req->execute();
        $data = $req->fetchAll();

        return $data;
    }

    public static function getSameCategory($id) {

        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM fiche WHERE id_categorie = ?");
        $req->execute([Categorie::get($id)['id']]);
        $data = $req->fetchAll();

        return $data;

    }

    public static function showMultiple($id) {

        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM shop WHERE id = ?");
        $req->execute([$id]);
        $data = $req->fetchAll();

        return $data;

    }

    
}
