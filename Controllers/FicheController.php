<?php

require_once('./Controllers/Controller.php');

require_once('./Models/Categorie.php');
require_once('./Models/Shop.php');
require_once('./Models/Image.php');
require_once('./Models/Promo.php');
require_once('./Models/Variant.php');
require_once('./Models/Avis.php');

class FicheController extends Controller {

    public function index($id) {

        if(Shop::exist($id) == 1) {
            $my_categorie = Categorie::get($id);
            $my_article = Shop::show($id);
            $images = Image::list($id);

            if(isset($_POST['sub_add'])) {
                $variations = $this->secure($_POST['variations']);
                //header('location: ' . $id . '/var/' . $variations);

                Panier::add($id, $variations);
            }


            if(isset($_POST['sub_avis'])) {
                $avis = $this->secure($_POST['avis']);

                Avis::add_validation((int) $_SESSION['id'], (int) $id, $avis);
            }


            $this->view('fiche', [
                'my_categorie' => $my_categorie,
                'my_article' => $my_article,
                'images' => $images,
                'promo' => new Promo,
                'variant' => new Variant,
                'autres_variations' => Variant::getVariationsJustIdArticle($id),
                'colors' => new Couleur,
                'liste_avis' => Avis::list($id)
            ]);
        } else {
            $this->redirect('../404');
        }

    }


    public function var($id_article, $id_var) {

        if(Shop::exist($id) == 1) {
            $my_categorie = Categorie::get($id_article);
            $my_article = Shop::show($id_article);
            $images = Image::list($id_article);
            
    
            $this->view('color', [
                'my_categorie' => $my_categorie,
                'my_article' => $my_article,
                'images' => $images,
                'promo' => new Promo,
                'variant' => new Variant,
                'variations' => Variant::getVariations($id_article, $id_var),
                'autres_variations' => Variant::getVariationsJustIdArticle($id_article),
                'colors' => new Couleur,
            ]);
        } else {
            $this->redirect('../404');
        }

        
    }


    
}