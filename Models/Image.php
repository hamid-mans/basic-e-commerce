<?php

/* CLASS
* @Author: Hamid
* @GitHub: LapinDev/baisc-e-commerce
* @License: Apache License 2.0
*/

require_once('./Models/Model.php');

class Image extends Model {

    public static function list($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM images WHERE id_article = ?");
        $req->execute([$id_article]);
        $data = $req->fetchAll();

        return $data;
    }

    public static function get_by_num_image($id_article, $num_image) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM images WHERE id_article = ? AND num_image = ?");
        $req->execute([$id_article, $num_image]);
        $data = $req->fetch();

        return $data;
    }

    public function exist($id_article, $num_image) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM images WHERE id_article = ? AND num_image = ?");
        $req->execute([$id_article, $num_image]);
        $data = $req->rowCount();
        
        if($data >= 1)
            return true;
    }

    public static function edit($id_article, $num_image, $lien) {
        $db = Model::connect();

        $req1 = $db->prepare("SELECT * FROM images WHERE id_article = ? AND num_image = ?");
        $req1->execute([$id_article, $num_image]);
        $data1 = $req1->rowCount();
    

        if(!$data1 >= 1) {
            $req = $db->prepare("INSERT INTO images(id_article, num_image, lien, active) VALUES(?,?,?,?)");
            if($num_image == 'image1') {
                $req->execute([$id_article, $num_image, $lien, 1]);
            } else {
                $req->execute([$id_article, $num_image, $lien, 0]);
            }
        } else {
            $req = $db->prepare("UPDATE images SET lien = ? WHERE id_article = ? AND num_image = ?");
            $req->execute([$lien, $id_article, $num_image]);
        }

        return $req;
    }

}