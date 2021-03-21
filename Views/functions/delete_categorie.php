<?php
/* CLASS
* @Author: Hamid
* @GitHub: LapinDev/baisc-e-commerce
* @License: Apache License 2.0
*/
require_once('../class/Categorie.php');
if(isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $categorie = new Categorie();
    $_SESSION['cate'] = 'categorie';
    $add = $categorie->delete($id);
    header('location: ../admin.php?categorie=delete');
} else {
    header('location: ../index.php');
}