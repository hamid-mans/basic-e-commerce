<?php

require_once('./Models/Historique.php');

class AdminHistoriqueController extends Controller {

    public function index() {

        
        $this->view('Admin/historique', [
            'liste_historique' => Historique::list()
        ]);
    }
}