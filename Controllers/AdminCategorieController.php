<?php

require_once('./Controllers/Controller.php');
require_once('./Models/Categorie.php');

class AdminCategorieController extends Controller {

    protected $URL = '/commerce/admin';

    public function index() {

        if(isset($_SESSION['actif']) && $this->isAdmin()) {
            $liste_categories = Categorie::list();

            if(isset($_POST['sub_new_categorie'])) {
                $nom = $this->secure($_POST['nom']);
                $description = $this->secure($_POST['description']);

                Categorie::add($nom, $description);
                header('location: categories');
            }

            $this->view('admin/categories', [
                'liste_categories' => $liste_categories
            ]);
        } else {
            $this->redirect('../accueil');
        }

    }

}