<?php

require_once('./Models/Model.php');

class User extends Model {

    public static function all() {
        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM users");
        $req->execute();
        $data = $req->fetchAll();

        return $data;
    }

    public static function get($id) {

        $db = Model::connect();

        $req = $db->prepare("SELECT * FROM users WHERE id = ?");
        $req->execute([$id]);
        $data = $req->fetch();

        return $data;

    }

    public static function logout($session_id) {
        $db = Model::connect();
        $disc = $db->prepare("UPDATE users SET actif = '' WHERE id = ?");
        $disc->execute([$session_id]);

        return $disc;
    }

    public static function exist($pseudo, $password) {
        $db = Model::connect();
        $get_user = $db->prepare("SELECT * FROM users WHERE pseudo = ? AND password = ?");
        $get_user->execute([$pseudo, $password]);
        $verify = $get_user->rowCount();

        return $verify;
    }

    public static function setCo($session_actif, $session_id) {
        $db = Model::connect();
        $edit_co = $db->prepare("UPDATE users SET actif = ? WHERE id = ?");
        $edit_co->execute([$session_actif, $session_id]);

        return $edit_co;
    }

    public static function recup($pseudo, $password) {
        $db = Model::connect();
        $get_user = $db->prepare("SELECT * FROM users WHERE pseudo = ? AND password = ?");
        $get_user->execute([$pseudo, $password]);
        $recup = $get_user->fetch();

        return $recup;
    }

    public static function parse($id_grade) {
        switch ($id_grade) {
            case 1:
                $grade = 'Membre';
                break;

            case 10:
                $grade = 'Administrateur';
                break;
                
        }

        return $grade;
    }

    public static function delete($id_user) {
        $db = Model::connect();

        $req = $db->prepare("DELETE FROM users WHERE id = ?");
        $req->execute([$id_user]);

        return $req;
    }

}