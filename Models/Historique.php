<?php

class Historique extends Model{

    public static function list() {
        $db = Model::connect();
        
        $req = $db->prepare("SELECT * FROM paiements");
        $req->execute();
        $data = $req->fetchAll();

        return $data;
    }

}