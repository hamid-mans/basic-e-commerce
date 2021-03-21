<?php

require_once('./Models/Model.php');

class Couleur extends Model {

    public static function gets() {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM couleurs");
        $req->execute();

        $data = $req->fetchAll();

        return $data;
    }

    public static function get($id) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM couleurs WHERE id = ?");
        $req->execute([$id]);

        $data = $req->fetchAll();

        return $data;
    }

}