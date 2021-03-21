<?php
session_start();
/* CLASS
* @Author: Hamid
* @GitHub: LapinDev/baisc-e-commerce
* @License: Apache License 2.0
*/

if(isset($_SESSION['actif']) && $_SESSION['grade'] == 10) {

    require_once('../class/Promo.php');

    $promo = new Promo();

    if(isset($_GET['id'])) {

        $id = htmlspecialchars($_GET['id']);
        
        if($promo->exist($id))
            $promo->delete($id);

        header('location: ../admin.php?promo=delete');

    }

}