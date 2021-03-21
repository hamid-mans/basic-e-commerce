<?php

class AdminAvisController extends Controller {

    protected $URL = '/commerce/admin';

    public function index() {

        if(isset($_SESSION['actif']) && $this->isAdmin()) {
            $this->view('Admin/avis', [
                'liste_avis_validations' => Avis::list_validations()
            ]);
        } else {
            $this->redirect('../accueil');
        }
        
        
    }
}