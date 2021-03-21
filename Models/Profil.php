<?php

require_once('./Models/User.php');
require_once('./Models/Abonnement.php');

class Profil extends Model {

    public static function me() {

        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM users WHERE id = ?");
        $req->execute([$_SESSION['id']]);
        $data = $req->fetch();

        return $data;

    }
}