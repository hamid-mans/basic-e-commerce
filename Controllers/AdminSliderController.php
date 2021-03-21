<?php

require_once('./Models/Slider.php');

class AdminSliderController extends Controller {

    protected $URL = '/commerce/admin';
    
    public function index() {

        
        if(isset($_SESSION['actif']) && $this->isAdmin()) {
            $this->view('Admin/sliders', [
                'liste_sliders' => Slider::gets()
            ]);
        } else {
            $this->redirect('../accueil');
        }

    }

    public function edit($id) {

        if(isset($_SESSION['acitf']) && $this->isAdmin()) {
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
    
                        Slider::edit($id, 'image1', $chemin1);
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
    
                        Slider::edit($id, 'image2', $chemin2);
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
    
                        Slider::edit($id, 'image3', $chemin3);
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
    
                        Slider::edit($id, 'image4', $chemin4);
                    }
    
                }
    
    
    
                if(isset($_FILES['image5'])) {
        
                    $filename5 = $_FILES['image5']['name'];
                    $filetmp5 = $_FILES['image5']['tmp_name'];
                    
                    if(!empty($filename5)) {
                        $ext5 = explode('.', $filename5);
                        $fileext5 = $ext5[1];
    
                        $c5 = md5($filename5) . sha1($filename5) . '.' . $fileext5;
                        $chemin5 = './' . $this->viewPathName . '/images/' . md5($filename5) . sha1($filename5) . '.' . $fileext5;
    
                        move_uploaded_file($filetmp5, $chemin5);
    
                        Slider::edit($id, 'image5', $chemin5);
                    }
    
                }
    
    
    
                if(isset($_FILES['image6'])) {
        
                    $filename6 = $_FILES['image6']['name'];
                    $filetmp6 = $_FILES['image6']['tmp_name'];
                    
                    if(!empty($filename6)) {
                        $ext6 = explode('.', $filename6);
                        $fileext6 = $ext6[1];
    
                        $c6 = md5($filename6) . sha1($filename6) . '.' . $fileext6;
                        $chemin6 = './' . $this->viewPathName . '/images/' . md5($filename6) . sha1($filename6) . '.' . $fileext6;
    
                        move_uploaded_file($filetmp6, $chemin6);
    
                        Slider::edit($id, 'image6', $chemin6);
                    }
    
                }
    
    
    
    
                if(isset($_FILES['image7'])) {
        
                    $filename7 = $_FILES['image7']['name'];
                    $filetmp7 = $_FILES['image7']['tmp_name'];
                    
                    if(!empty($filename7)) {
                        $ext7 = explode('.', $filename7);
                        $fileext7 = $ext7[1];
    
                        $c7 = md5($filename7) . sha1($filename7) . '.' . $fileext7;
                        $chemin7 = './' . $this->viewPathName . '/images/' . md5($filename7) . sha1($filename7) . '.' . $fileext7;
    
                        move_uploaded_file($filetmp7, $chemin7);
    
                        Slider::edit($id, 'image7', $chemin7);
                    }
    
                }
    
    
    
                if(isset($_FILES['image8'])) {
        
                    $filename8 = $_FILES['image8']['name'];
                    $filetmp8 = $_FILES['image8']['tmp_name'];
                    
                    if(!empty($filename8)) {
                        $ext8 = explode('.', $filename8);
                        $fileext8 = $ext8[1];
    
                        $c8 = md5($filename8) . sha1($filename8) . '.' . $fileext8;
                        $chemin8 = './' . $this->viewPathName . '/images/' . md5($filename8) . sha1($filename8) . '.' . $fileext8;
    
                        move_uploaded_file($filetmp8, $chemin8);
    
                        Slider::edit($id, 'image8', $chemin8);
                    }
    
                }
    
    
    
                if(isset($_FILES['image9'])) {
        
                    $filename9 = $_FILES['image9']['name'];
                    $filetmp9 = $_FILES['image9']['tmp_name'];
                    
                    if(!empty($filename9)) {
                        $ext9 = explode('.', $filename9);
                        $fileext9 = $ext9[1];
    
                        $c9 = md5($filename9) . sha1($filename9) . '.' . $fileext9;
                        $chemin9 = './' . $this->viewPathName . '/images/' . md5($filename9) . sha1($filename9) . '.' . $fileext9;
    
                        move_uploaded_file($filetmp9, $chemin9);
    
                        Slider::edit($id, 'image9', $chemin9);
                    }
    
                }
    
    
    
    
                if(isset($_FILES['image10'])) {
        
                    $filename10 = $_FILES['image10']['name'];
                    $filetmp10 = $_FILES['image10']['tmp_name'];
                    
                    if(!empty($filename10)) {
                        $ext10 = explode('.', $filename10);
                        $fileext10 = $ext10[1];
    
                        $c10 = md5($filename10) . sha1($filename10) . '.' . $fileext10;
                        $chemin10 = './' . $this->viewPathName . '/images/' . md5($filename10) . sha1($filename10) . '.' . $fileext10;
    
                        move_uploaded_file($filetmp10, $chemin10);
    
                        Slider::edit($id, 'image10', $chemin10);
                    }
    
                }
    
            }
    
    
            $this->view('Admin/edit_slider', [
                'slider' => Slider::get('id', $id)[0]
            ]);
        } else {
            $this->redirect('../../accueil');
        }
    }
        
}