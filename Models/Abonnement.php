<?php
require_once('./Models/Model.php');
class Abonnement extends Model {

    public static function list() {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM abonnements");
        $req->execute();
        $data = $req->fetchAll();

        return $data;
    }

    public static function get($id) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM abonnements WHERE id = ?");
        $req->execute([$id]);
        $data = $req->fetch();

        return $data;
    }

    public static function set($id_user, $id_abo) {
        $db = Model::connect();

        $req = $db->prepare("UPDATE users SET abonnement = ? WHERE id = ?");
        $req->execute([$id_abo, $id_user]);

        return $req;
    }
}