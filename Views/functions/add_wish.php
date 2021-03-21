<?php
session_start();
/* CLASS
* @Author: Hamid
* @GitHub: LapinDev/baisc-e-commerce
* @License: Apache License 2.0
*/
require_once('../class/Wish.php');

if(isset($_SESSION['actif'])) {
    if(isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);
        $wish = new Wish();
        
        if($wish->exist($id)) {
            $add = $wish->remove($id);
            header('location: ../index.php?n=remove_wish');
        } else {
            $add = $wish->add($id);
            header('location: ../index.php?n=add_wish');
        }
    
    } else {
        header('location: ../index.php');
    }
} else {
    header('location: ../index.php?n=dont_co');
}