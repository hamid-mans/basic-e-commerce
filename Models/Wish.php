<?php
/* CLASS
* @Author: Hamid
* @GitHub: LapinDev/baisc-e-commerce
* @License: Apache License 2.0
*/
require_once('./Models/Model.php');

class Wish extends Model
{
    public static function add($id_article) {
        $db = Model::connect();

        $req = $db->prepare("INSERT INTO wishlist(id_article, is_wish) VALUES(?, ?)");
        $req->execute([$id_article, 1]);

        return $req;
    }

    public static function show($id_article) {
        $db = Model::connect();;

        $req = $db->prepare("SELECT * FROM shop WHERE id = ?");
        $req->execute([$id_article]);
        $data = $req->fetch();

        return $data;
    }

    public static function all() {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM wishlist WHERE is_wish = 1");
        $req->execute();
        $data = $req->fetchAll();

        return $data;
    }

    public static function select($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM wishlist WHERE id_article = ? AND is_wish = 1");
        $req->execute([$id_article]);
        $data = $req->fetchAll();

        return $data;
    }

    public static function exist($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM wishlist WHERE id_article = ?");
        $req->execute([$id_article]);
        $data = $req->rowCount();

        return $data;
    }

    public static function remove($id_article) {
        $db = Model::connect();

        $req = $db->prepare("DELETE FROM wishlist WHERE id_article = ?");
        $req->execute([$id_article]);
        
        return $req;
    }
}
