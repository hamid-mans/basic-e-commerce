<?php

require_once('./Models/Promo.php');
require_once('./Models/Shop.php');

class AdminPromotionController extends Controller {

    public $error;

    protected $URL = '/commerce/admin';

    public function index() {

        if(isset($_SESSION['actif']) && $this->isAdmin()) {
            if(isset($_POST['add_promo'])) {

                $promo = (int) htmlspecialchars($_POST['reduction']);
                $id_article = (int) htmlspecialchars($_POST['articles']);
                
    
                if(!Promo::exist($id_article)) {
                    Promo::add($id_article, $promo);
                } else {
                    $this->error = "Cet article existe déjà";
                }
    
            }
    
            $this->view('Admin/promotion', [
                'liste_promotions' => Promo::list(),
                'shop' => new Shop,
                'liste_articles' => Shop::list()
            ]);
        } else {
            $this->redirect('../accueil');
        }
    }
}