<?php

class Slider extends Model {

    public static function gets() {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM sliders");
        $req->execute();
        $data = $req->fetchAll();

        return $data;
    }

    public static function get($type, $data) {
        $db = Model::connect();

        if($type == 'nom') {
            $req = $db->prepare("SELECT * FROM sliders WHERE nom = ?");
            $req->execute([$data]);
            $data = $req->fetchAll();
        } else if($type == 'id') {
            $req = $db->prepare("SELECT * FROM sliders WHERE id = ?");
            $req->execute([$data]);
            $data = $req->fetchAll();
        }

        return $data;
    }


    public static function edit($id, $link, $chemin) {
        $db = Model::connect();

        $req = $db->prepare("UPDATE sliders SET $link = ? WHERE id = ?");
        $req->execute([$chemin, $id]);

        return $req;
    }

}