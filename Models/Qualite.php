<?php

require_once('./Models/Model.php');

class Qualite extends Model {

    public static function get($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM variants WHERE qualites = ?");
        $req->execute([$id_article]);
        $data = $req->fetch();

        return $data;
    }

    public static function list() {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM qualites");
        $req->execute();
        $data = $req->fetchAll();

        return $data;
    }

}