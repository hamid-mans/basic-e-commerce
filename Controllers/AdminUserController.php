<?php

require_once('./Models/User.php');

class AdminUserController extends Controller {


    public function index() {


        if(isset($_SESSION['actif']) && $this->isAdmin()) {
            
            $this->view('Admin/user', [
                'liste_utilisateurs' => User::all()
            ]);
        } else {
            $this->redirect('../accueil');
        }
    }
}