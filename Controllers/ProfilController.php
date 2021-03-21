<?php

require_once('./Models/Profil.php');

class ProfilController extends Controller {

    public function index() {


        $this->view('profil', [
            'i' => Profil::me()
        ]);

    }
}