<?php
/* CLASS
* @Author: Hamid
* @GitHub: LapinDev/baisc-e-commerce
* @License: Apache License 2.0
*/
require_once('../class/Panier.php');
if(isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $panier = new Panier();
    $add = $panier->delete($id);
    header('location: ../my.php?my=delete');
} else {
    header('location: ../index.php');
}