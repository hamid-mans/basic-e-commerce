<?php
/* CLASS
* @Author: Hamid
* @GitHub: LapinDev/baisc-e-commerce
* @License: Apache License 2.0
*/
require_once('./Models/Model.php');

class Categorie extends Model {

    public static function add($nom, $description) {
        $db = Model::connect();

        $req = $db->prepare("INSERT INTO categories(nom_categorie, description_categorie) VALUES(?,?)");
        $req->execute([$nom, $description]);

        return $req;
    }

    public static function list() {
        $db = Model::connect();

        $req = $db->query("SELECT * FROM categories");
        $data = $req->fetchAll();

        return $data;
    }

    public static function show($id_categorie) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM categories WHERE id = ?");
        $req->execute([$id_categorie]);
        $data = $req->fetch();

        return $data;
    }

    public static function get($id_article) {
        $db = Model::connect();

        

        $req_categorie = $db->prepare("SELECT * FROM fiche WHERE id_article = ?");
        $req_categorie->execute([$id_article]);
        $recup_categorie = $req_categorie->fetch();

        $req_article = $db->prepare("SELECT * FROM categories WHERE id = ?");
        $req_article->execute([$recup_categorie['id_categorie']]);
        $recup_categorie = $req_article->fetch();

        return $recup_categorie;
    }

    public static function fiche($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM fiche WHERE id_article = ?");
        $req->execute([$id_article]);
        $data = $req->fetch();

        return $data;
    }

    public static function edit($id_categorie, $nom_categorie, $description_categorie) {
        $db = Model::connect();

        $req = $db->prepare("UPDATE categories SET nom_categorie = ?, description_categorie = ? WHERE id = ?");
        $req->execute([$nom_categorie, $description_categorie, $id_categorie]);

        return $req;
    }

    public static function delete($id) {
        $db = Model::connect();

        $req = $db->prepare("DELETE FROM categories WHERE id = ?");
        $req->execute([$id]);

        return $req;
    }

}