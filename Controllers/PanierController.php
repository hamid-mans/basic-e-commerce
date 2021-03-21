<?php 

require_once('./Controllers/Controller.php');
require_once('./Models/Panier.php');

class PanierController extends Controller
{
	
	function index() {
	    
	    $produits_panier = Panier::all($_SESSION['id']);
		
		$this->view('my', [
			'produits_panier' => $produits_panier
		]);
	}

}