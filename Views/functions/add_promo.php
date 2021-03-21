<?php
session_start();
/* CLASS
* @Author: Hamid
* @GitHub: LapinDev/baisc-e-commerce
* @License: Apache License 2.0
*/
require_once('../class/Promo.php');

if(isset($_SESSION['actif']) && $_SESSION['grade'] == 10) {
    
    $promo = new Promo();

    if(!$promo->exist($_POST['new_categorie']))
        $promo->add($_POST['new_categorie'], $_POST['promo']); 
    else
        $promo->edit($_POST['new_categorie'], $_POST['promo']);
    
    header('location: ../admin.php');

}



