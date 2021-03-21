<?php

require_once('./Models/Model.php');

class Variant extends Model {

    public static function addNewVariant($id_article, $title, $color, $price, $variation) {
        $db = Model::connect();

        $ex_article = $db->prepare("SELECT * FROM shop WHERE id = ?");
        $ex_article->execute([$id_article]);
        $data_article = $ex_article->fetch();
        
        Shop::add($title, $data_article['categorie'], $data_article['description'], $data_article['image'], $price, $data_article['poids'], $data_article['frais'], $data_article['qualite'], $data_article['marque'], $variation);


        return $req;
    }

    public static function getArticles() {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM shop WHERE variation IS NOT NULL");
        $req->execute();
        $data = $req->fetchAll();

        return $data;
    }

    public static function gets($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM shop WHERE id = ?");
        $req->execute([$id_article]);
        $data = $req->fetchAll();

        return $data;
    }

    public static function getVariations($id_article, $id_var) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM variants WHERE id_article = ? AND id = ?");
        $req->execute([$id_article, $id_var]);
        $data = $req->fetch();

        return $data;
    }

    public static function getVariationsJustIdArticle($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM shop WHERE variation IS NOT NULL");
        $req->execute([$id_article]);
        $data = $req->fetchAll();

        return $data;
    }

    /*public static function onVerra($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM variants WHERE id_article = ?");*
        $req->execute([$id_article]);
        $data = $req->fetch
    }*/

    public static function existVariant($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM variants WHERE id_article = ?");
        $req->execute([$id_article]);
        $count = $req->rowCount();

        if ($count >= 1) return true;
    }

}