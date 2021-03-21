<?php

require_once('./Models/Promo.php');

class WishController extends Controller {

    public function index() {

        $wish = new Wish();
        $liste = $wish->all();

        

        $this->view('coeur', [
            'wish' => $wish,
            'liste' => $liste
        ]);
    }

}