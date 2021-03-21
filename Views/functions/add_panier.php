<?php
session_start();
/* CLASS
* @Author: Hamid
* @GitHub: LapinDev/baisc-e-commerce
* @License: Apache License 2.0
*/
require_once('../class/Panier.php');
if(isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $panier = new Panier();
    if(!$panier->exist_on_panier($id)) {
        $add = $panier->add($id);
    } else {
        $panier->add_qte($id);
        header('location: ../my.php?my=edit');
    }
    header('location: ../my.php?my=added');
} else {
    header('location: ../index.php');
}