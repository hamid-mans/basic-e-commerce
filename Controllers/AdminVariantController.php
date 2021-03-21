<?php

require_once('./Controllers/Controller.php');
require_once('./Models/Model.php');
require_once('./Models/Couleur.php');

class AdminVariantController extends Controller {

    protected $URL = '/commerce/admin';

    public function index() {


        $this->view('Admin/variants', [
            'liste_variants' => Variant::getArticles(),
            'gets' => new Variant
        ]);
    }

    public function add() {

        if(isset($_POST['sub_construction'])) {
            $id_copy = $_POST['articles_copy'];
            header('location: build/' . $id_copy);
        }

        $this->view('Admin/add_variants', [
            'liste_articles' => Shop::listWithoutVariants()
        ]);
    }


    public function build($id) {

        if(isset($_POST['sub_new_variant'])) {
            if(isset($_POST['title']) && isset($_POST['price']) && isset($_POST['couleurs'])) {

                $title = $this->secure($_POST['title']);
                $price = $this->secure($_POST['price']);
                $couleur = $this->secure($_POST['couleurs']);
                $ram = $this->secure($_POST['ram']);
                
                $variation = $id . ';' . $couleur . ';' . $ram;

                $ex = Shop::show($id);
                $ex_fiche = Shop::showFiche($id);

                Shop::add($title, $ex_fiche['id_categorie'], $ex['description'], $ex['image'], $ex['price'], $ex['poids'], $ex['frais'], $ex_fiche['qualite'], $ex_fiche['marque'], $variation);
               
                header('location: ../../../admin');
            }
        }

        

        $this->view('Admin/build_variants', [
            'my_article' => Shop::show($id),
            'liste_couleurs' => Couleur::gets(),
            'liste_ram' => Ram::gets()
        ]);
    }

}