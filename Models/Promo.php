<?php

require_once('./Models/Model.php');

class Promo extends Model {

    public static function list() {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM promos");
        $req->execute();

        $data = $req->fetchAll();

        return $data;
    }

    public static function get($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM promos WHERE id_article = ?");
        $req->execute([$id_article]);

        $data = $req->fetch();

        return $data;
    }

    public static function add($id_article, $promo) {
        $db = Model::connect();

        $req = $db->prepare("INSERT INTO promos(id_article, promo) VALUES(?,?)");
        $req->execute([$id_article, $promo]);

        return $req;
    }

    public static function exist($id_article) {

        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM promos WHERE id_article = ?");
        $req->execute([$id_article]);
        $data = $req->rowCount();

        if($data == 1) {
            return true;
        }

    }

    public static function edit($id_article, $promo) {
        $db = Model::connect();

        $req = $db->prepare("UPDATE promos SET promo = ? WHERE id_article = ?");
        $req->execute([$promo, $id_article]);

        return $req;
    }
    
    public static function calcule_promo($id_article, $promo) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM shop WHERE id = ?");
        $req->execute([$id_article]);
        $data = $req->fetch();

        $soustraire = $data['price'] / 100;
        $new_price = $soustraire * $promo;
        $soust = $data['price'] - $new_price;
        
        return $soust;
    }

    public static function delete($id) {
        $db = Model::connect();

        $req = $db->prepare("DELETE FROM promos WHERE id = ?");
        $req->execute([$id]);
    }

}