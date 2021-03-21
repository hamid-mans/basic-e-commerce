<?php 

/**
 * HomeController
 */
require_once('./Controllers/Controller.php');
require_once('./Models/Shop.php');
require_once('./Models/Wish.php');
require_once('./Models/Image.php');
require_once('./Models/Promo.php');
require_once('./Models/Slider.php');

class HomeController extends Controller
{
	
	function index() {
		
		$this->view('home', [
			'liste' => Shop::list(),
			'wish' => new Wish,
			'image' => new Image,
			'promo' => new Promo,
			'moment' => Shop::moment(),
			'home_slider' => Slider::get('nom', 'home')
		]);
	}

}