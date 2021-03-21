<?php
/* CLASS
* @Author: Hamid
* @GitHub: LapinDev/baisc-e-commerce
* @License: Apache License 2.0
*/
require_once('./Models/Model.php');

class Avis extends Model {

    public static function get_validation($id_avis) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM avis_validation WHERE id = ?");
        $req->execute([$id_avis]);
        $data = $req->fetch();

        return $data;
    }


    public static function add_validation($id_user, $id_article, $post_avis) {
        $db = Model::connect();

        if(!empty($post_avis)) {
            if(is_int($id_article) && is_int($id_user)) {
                $avis = htmlspecialchars($post_avis);

                $req = $db->prepare("INSERT INTO avis_validation(id_user, id_article, avis) VALUES(?,?,?)");
                $req->execute([$id_user, $id_article, $avis]);

                return $req;
                    
            }

        }

    }

    public static function add($id_user, $id_article, $post_avis) {
        $db = Model::connect();
            if(is_int($id_article) && is_int($id_user)) {
                $avis = htmlspecialchars($post_avis);

                $req = $db->prepare("INSERT INTO avis(id_user, id_article, avis) VALUES(?,?,?)");
                $req->execute([$id_user, $id_article, $avis]);

                return $req;
                    
            }

    }

    public static function list($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM avis WHERE id_article = ?");
        $req->execute([$id_article]);
        $data = $req->fetchAll();

        return $data;
    }

    public static function list_validations() {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM avis_validation");
        $req->execute();
        $data = $req->fetchAll();

        return $data;
    }

    public static function noter($id_article, $id_user, $note) {
        $db = Model::connect();

        $req = $db->prepare("INSERT INTO notes(id_article, id_user, note) VALUES(?,?,?)");
        $req->execute([$id_article, $id_user, $note]);

        return $req;
    }

    public static function note_moyenne($id_article) {
        $db = Model::connect();

        $req_somme = $db->prepare("SELECT SUM(note) FROM notes WHERE id_article = ?");
        $req_somme->execute([$id_article]);

        $req_lenght = $db->prepare("SELECT * FROM notes WHERE id_article = ?");
        $req_lenght->execute([$id_article]);

        $data_somme = $req_somme->fetch();
        $data_lenght = $req_lenght->rowCount();
        
        if($data_lenght != 0) {
            $data = $data_somme[0] / $data_lenght;
        }
        
        $data = 0;

        return $data;

    }

    public static function remove($id_avis) {
        $db = Model::connect();

        $req = $db->prepare("DELETE FROM avis_validation WHERE id = ?");
        $req->execute([$id_avis]);

        return $req;
    }

    public static function count($id_article) {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM avis WHERE id_article = ?");
        $req->execute([$id_article]);
        $data = $req->rowCount();

        return $data;
    }

}