<?php
require_once('./Controllers/Controller.php');
require_once('./Models/Shop.php');
require_once('./Models/Categorie.php');
require_once('./Models/Qualite.php');

class AdminController extends Controller {

    protected $URL = '/commerce/admin';

    public function index() {

        if(isset($_SESSION['actif']) && $this->isAdmin()) {

            $this->view('Admin/admin', [

            ]);

        } else {
            $this->redirect('accueil');
        }



        

    }

    public function articles() {

        if(isset($_SESSION['actif']) && $_SESSION['grade'] == 10) {
            if(isset($_POST['sub_new_article'])) {

                if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['categorie']) && isset($_POST['price']) AND isset($_POST['poids']) && isset($_POST['frais'])) {
                    $title = $this->secure($_POST['title']);
                    $description = $_POST['description'];
                    $categorie = $this->secure($_POST['categorie']);
                    $prix = $this->secure($_POST['price']);
                    $poids = $this->secure($_POST['poids']);
                    $frais = $this->secure($_POST['frais']);
    
                    // Suppléments
    
                    $qualite = $this->secure($_POST['qualite']);
                    $marque = $this->secure($_POST['marque']);
    
                    if(isset($_FILES['image1']) && !empty($_FILES['image1'])) {
                        $image1 = $this->secure($_FILES['image1']['name']);
                        $image1_e = explode('.', $image1);
                        $image1_ext = $image1_e[1];
                        $image1_tmp = $_FILES['image1']['tmp_name'];
    
                        $image1_link = random_int(0, 999999) .  sha1($image1_ext) . md5($image1) . '.' . $image1_ext;
    
                        move_uploaded_file($image1_tmp, './' . $this->viewPathName . '/images/' . $image1_link);
                    }
    
                    if(isset($qualite) || isset($marque)) {
                        $qualite = (isset($qualite)) ? $this->secure($_POST['qualite']) : null;
                        $marque = (isset($marque)) ? $this->secure($_POST['marque']) : null;
    
                        if(isset($_FILES['image1']) && !empty($_FILES['image1'])) {
                            Shop::add($title, $categorie, $description, $image1_link, $prix, $poids, $frais, $qualite, $marque);
                        } else {
                            Shop::add($title, $categorie, $description, $prix, $poids, $frais, $qualite, $marque);
                        }
    
                        
                    } else {
                        if(isset($_FILES['image1']) && !empty($_FILES['image1'])) {
                            Shop::add($title, $categorie, $description, $image1_link, $prix, '', '');
    
                            $this->error = "0;Article ajouté avec success";
                        } else {
                            Shop::add($title, $categorie, $description, $prix, '', '');
                            $this->error = "0;Article ajouté avec success";
                        }
                        
                    }
                } else {
                    $this->error = "1;Les champs obligatoires doivent être remplis, l'image est obligatoire";
                }
                
                //Shop::add(mixed $dollar);
    
            }

            $this->view('Admin/articles', [
                'liste_articles' => Shop::list(10),
                'categories' => Categorie::list(),
                'qualites' => Qualite::list()
            ]);
        } else {
            $this->redirect('accueil');
        }

        


        
    }

    public function editArticle($id) {

        if(isset($_SESSION['actif']) && $this->isAdmin()) {


            if(isset($_POST['sub_edit_article'])) {

                
                $title = $this->secure($_POST['new_title']);
                $description = $this->secure($_POST['new_description']);
                $categorie = $this->secure($_POST['new_categorie']);
                $price = $this->secure($_POST['new_price']);
                $poids = $this->secure($_POST['new_poids']);
                $frais = $this->secure($_POST['new_frais']);

                Shop::edit($id, $title, $categorie, $description, 0, $price, $poids, $frais);

    
            }

            if(isset($_POST['sub_edit_images'])) {

                if(isset($_FILES['image1'])) {
    
                    $filename1 = $_FILES['image1']['name'];
                    $filetmp1 = $_FILES['image1']['tmp_name'];
                    
                    if(!empty($filename1)) {
                        $ext1 = explode('.', $filename1);
                        $fileext1 = $ext1[1];

                        $c1 = md5($filename1) . sha1($filename1) . '.' . $fileext1;
                        $chemin1 = './' . $this->viewPathName . '/images/' . md5($filename1) . sha1($filename1) . '.' . $fileext1;
    
                        move_uploaded_file($filetmp1, $chemin1);
    
                        Image::edit($id, 'image1', $c1);
                    }
    
                }
    
    
                if(isset($_FILES['image2'])) {
    
                    $filename2 = $_FILES['image2']['name'];
                    $filetmp2 = $_FILES['image2']['tmp_name'];
                    
                    if(!empty($filename2)) {
                        $ext2 = explode('.', $filename2);
                        $fileext2 = $ext2[1];
    
                        $c2 = md5($filename2) . sha1($filename2) . '.' . $fileext2;
                        $chemin2 = './' . $this->viewPathName . '/images/' . md5($filename2) . sha1($filename2) . '.' . $fileext2;
    
                        move_uploaded_file($filetmp2, $chemin2);
    
                        Image::edit($id, 'image2', $c2);
                    }
    
                    
    
                }
    
    
                if(isset($_FILES['image3'])) {
    
                    $filename3 = $_FILES['image3']['name'];
                    $filetmp3 = $_FILES['image3']['tmp_name'];
                    
                    if(!empty($filename3)) {
                        $ext3 = explode('.', $filename3);
                        $fileext3 = $ext3[1];
    
                        $c3 = md5($filename3) . sha1($filename3) . '.' . $fileext3;
                        $chemin3 = './' . $this->viewPathName . '/images/' . md5($filename3) . sha1($filename3) . '.' . $fileext3;
    
                        move_uploaded_file($filetmp3, $chemin3);
    
                        Image::edit($id, 'image3', $c3);
                    }
    
                }
    
                
                if(isset($_FILES['image4'])) {
    
                    $filename4 = $_FILES['image4']['name'];
                    $filetmp4 = $_FILES['image4']['tmp_name'];
                    
                    if(!empty($filename4)) {
                        $ext4 = explode('.', $filename4);
                        $fileext4 = $ext4[1];
    
                        $c4 = md5($filename4) . sha1($filename4) . '.' . $fileext4;
                        $chemin4 = './' . $this->viewPathName . '/images/' . md5($filename4) . sha1($filename4) . '.' . $fileext4;
    
                        move_uploaded_file($filetmp4, $chemin4);
    
                        Image::edit($id, 'image4', $c4);
                    }
    
                }
    
            }


            $this->view('Admin/edit_article', [
                'my_article' => Shop::show($id),
                'my_categorie' => Categorie::get($id),
                'categories' => Categorie::list(),
                'my_first_image' => Image::get_by_num_image($id, 'image1')
            ]);

        }

    }
}