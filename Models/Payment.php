<?php
require_once('./Models/Model.php');

class Payment extends Model {

    public static function add_history($name, $email, $addr, $total, $state) {

        $db = Model::connect();

        $req = $db->prepare("INSERT INTO paiements(nom, email, addr, total, ville) VALUES(?,?,?,?,?)");
        $req->execute([$name, $email, $addr, $total, $state]);

        return $req;

    }

}