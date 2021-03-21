<?php

require_once('./Models/Abonnement.php');

class AbonnementController extends Controller {

    public function index() {

        
        $this->view('abonnements', [
            'liste_abonnements' => Abonnement::list()
        ]);
    }

    public function souscrire($id) {


        $this->view('abo', [
            'abo' => Abonnement::get($id)
        ]);
    }
}