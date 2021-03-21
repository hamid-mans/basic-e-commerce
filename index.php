<?php

$url = '';

if (isset($_GET['url'])) {
	
	$url = explode('/', $_GET['url']);



}

require_once('./Controllers/Controller.php');
require_once('./Controllers/HomeController.php');
require_once('./Controllers/PanierController.php');
require_once('./Controllers/FicheController.php');
require_once('./Controllers/AbonnementController.php');
require_once('./Controllers/UserController.php');
require_once('./Controllers/ProfilController.php');
require_once('./Controllers/AdminController.php');
require_once('./Controllers/AdminVariantController.php');
require_once('./Controllers/AdminCategorieController.php');
require_once('./Controllers/AdminSliderController.php');
require_once('./Controllers/WishController.php');
require_once('./Controllers/ErrorController.php');
require_once('./Controllers/AdminPromotionController.php');
require_once('./Controllers/AdminAvisController.php');
require_once('./Controllers/AdminUserController.php');
require_once('./Controllers/PaymentController.php');
require_once('./Controllers/AdminHistoriqueController.php');
require_once('./Models/Wish.php');
require_once('./Models/Shop.php');
require_once('./Models/Panier.php');
require_once('./Models/Avis.php');

class TestController extends Controller {
	public function test() {
		$this->view('test');
	}
}

if(empty($url) || $url[0] == 'accueil') {
	$controller = new HomeController();
	$controller->index();
} else if($url[0] == 'test') {
	$controller = new TestController();
	$controller->test();
}

else if($url[0] == 'panier' && !isset($url[1]) && !isset($url[2])) {
	$controller = new PanierController();
	$controller->index();
} else if($url[0] == 'panier' && isset($url[1]) && isset($url[2])) {
	$id = htmlspecialchars($url[2]);
	
	if($url[1] == 'add') {
		if(Panier::checkStock($id)) {
			Panier::add_qte($id);
			$controller = new Controller();
			$controller->redirect('../../panier');
		} else {
			
			$controller = new ErrorController();
			$controller->rupture();

		}
		
	} else if($url[1] == 'moins') {
		Panier::moins_qte($id);
		$controller = new Controller();
		$controller->redirect('../../panier');
	}
}

else if($url[0] == 'wish' && !isset($url[1]) && !isset($url[2])) {
	$controller = new WishController();
	$controller->index();
}

else if($url[0] == 'wish' && $url[1] == 'add' && isset($url[2])) {
	$id = $url[2];
	
	if(!Wish::exist($id) >= 1) {
		Wish::add($id);
	} else {
		Wish::remove($id);
	}

	$controller = new Controller();
	$controller->redirect('../../accueil');
}

else if($url[0] == 'logout') {
	$controller = new UserController();
	$controller->logout();
} else if($url[0] == 'login') {
	$controller = new UserController();
	$controller->login();
} else if($url[0] == 'register') {
	$controller = new UserController();
	$controller->register();
} else if($url[0] == 'fiche' && isset($url[1]) && !isset($url[2])) {
	$id = htmlspecialchars($url[1]);
	$controller = new FicheController();
	$controller->index($id);
} else if($url[0] == 'fiche' && isset($url[1]) && $url[2] == 'var' && isset($url[3])) {
	$id_article = htmlspecialchars($url[1]);
	$id_var = htmlspecialchars($url[3]);
	$controller = new FicheController();
	$controller->var($id_article, $id_var);
} else if($url[0] == 'abonnements' && !isset($url[1])) {
	$controller = new AbonnementController();
	$controller->index();
} else if($url[0] == 'abonnements' && isset($url[1])) {
	$id = htmlspecialchars($url[1]);

	$controller = new AbonnementController();
	$controller->souscrire($id);
} else if($url[0] == 'profil') {
	$controller = new ProfilController();
	$controller->index();
}

else if($url[0] == 'admin' && empty($url[1])) {
	$controller = new AdminController();
	$controller->index();
} else if($url[0] == 'admin' && $url[1] == 'articles' && !isset($url[2]) && !isset($url[3])) {
	$controller = new AdminController();
	$controller->articles();
} else if($url[0] == 'admin' && $url[1] == 'articles' && $url[2] == 'delete' && isset($url[3])) {

	$id = htmlspecialchars($url[3]);
	Shop::delete($id);

	header('location: ../../articles');
} else if($url[0] == 'admin' && $url[1] == 'articles' && $url[2] == 'edit' && isset($url[3])) {
	$id = htmlspecialchars($url[3]);
	$controller = new AdminController();
	$controller->editArticle($id);
} else if($url[0] == 'admin' && $url[1] == 'variants' && !isset($url[2]) && !isset($url[3])) {
	$controller = new AdminVariantController();
	$controller->index();
} else if($url[0] == 'admin' && $url[1] == 'variants' && $url[2] == 'add' && !isset($url[3])) {
	$controller = new AdminVariantController();
	$controller->add();
} else if($url[0] == 'admin' && $url[1] == 'variants' && $url[2] == 'build' && isset($url[3])) {
	$id = htmlspecialchars($url[3]);
	$controller = new AdminVariantController();
	$controller->build($id);
} else if($url[0] == 'admin' && $url[1] == 'categories' && !isset($url[2]) && !isset($url[3])) {
	$controller = new AdminCategorieController();
	$controller->index();
} else if($url[0] == 'admin' && $url[1] == 'categories' && $url[2] == 'delete' && isset($url[3])) {
	$id = htmlspecialchars($url[3]);
	Categorie::delete($id);

	$controller = new Controller();
	$controller->redirect('../../../admin/categories');
} else if($url[0] == 'admin' && $url[1] == 'sliders' && !isset($url[2]) && !isset($url[3])) {
	$controller = new AdminSliderController();
	$controller->index();
} else if($url[0] == 'admin' && $url[1] == 'sliders' && $url[2] == 'edit' && isset($url[3])) {
	$id = htmlspecialchars($url[3]);

	$controller = new AdminSliderController();
	$controller->edit($id);
} else if($url[0] == 'admin' && $url[1] == 'promotions' && !isset($url[2]) && !isset($url[3])) {
	$controller = new AdminPromotionController();
	$controller->index();
} else if($url[0] == 'admin' && $url[1] == 'promotions' && $url[2] == 'remove' && isset($url[3]) && !isset($url[4])) {

	$id = htmlspecialchars((int) $url[3]);

	Promo::delete($id);
	header('location: ../../promotions');
} else if($url[0] == 'admin' && $url[1] == 'avis' && !isset($url[2])) {
	$controller = new AdminAvisController();
	$controller->index();
} else if($url[0] == 'admin' && $url[1] == 'avis' && $url[2] == 'delete' && isset($url[3])) {
	$id = (int) htmlspecialchars($url[3]);

	Avis::remove($id);

	header('location: ../../avis');
}
	
else if($url[0] == 'admin' && $url[1] == 'avis' && $url[2] == 'accept' && isset($url[3])) {
	$id = (int) htmlspecialchars($url[3]);
	$id_article = Avis::get_validation($id)['id_article'];

	Avis::add((int) $_SESSION['id'], (int) $id_article, Avis::get_validation($id)['avis']);
	Avis::remove($id);

	header('location: ../../avis');
} else if($url[0] == 'admin' && $url[1] == 'utilisateurs' && !isset($url[2]) && !isset($url[3])) {
	$controller = new AdminUserController();
	$controller->index();
} else if($url[0] == 'admin' && $url[1] == 'utilisateurs' && $url[2] == 'delete' && isset($url[3])) {
	$id = (int) htmlspecialchars($url[3]);
	$controller = new Controller();

	if(isset($_SESSION['actif']) && $controller->isAdmin()) {
		User::delete($id);
		$controller->redirect('../../utilisateurs');
	}
} else if($url[0] == 'admin' && $url[1] == 'historique') {
	$controller = new AdminHistoriqueController();
	$controller->index();
}




else if($url[0] == 'paypal' && $url[1] == 'next') {
	$controller = new PaymentController();
	$controller->next();
}

else if($url[0] == 'error' && $url[1] == 'rupture') {
	$controller = new ErrorController();
	$controller->rupture();
}


else {
	$controller = new Controller();
	$controller->view('404');
}