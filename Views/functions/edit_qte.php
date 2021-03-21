<?php

session_start();

/*
* @CLASS
* @Author: Hamid
* @GitHub: LapinDev/baisc-e-commerce
* @License: Apache License 2.0
*/

require_once('../class/Panier.php');

if(isset($_GET['id'])) {
    $_SESSION['aok'] = 'aok';
    $id = htmlspecialchars($_GET['id']);
    $type = htmlspecialchars($_GET['type']);
    
    $panier = new Panier();
    
    if($type == 'plus') {
        $edit = $panier->add_qte($id);
    } else if($type == 'moins') {
        $edit = $panier->moins_qte($id);
    }

    header('location: ../my.php?my=edit');
} else {
    header('location: ../index.php');
}