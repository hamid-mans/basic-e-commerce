<?php

require_once('./Controllers/Controller.php');

require_once('./Models/User.php');

class UserController extends Controller {

    public $error = '';

    public function register() {
        
        $db = Model::connect();

        if(isset($_POST['sub_register'])) {
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            if(isset($pseudo) AND isset($password) AND isset($email)) {

                if(!empty($pseudo) AND !empty($password) AND !empty($email)) {
                    if(strlen($pseudo) <= 15) {
                        if(strlen($password) >= 6) {
                            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $new_pseudo = htmlspecialchars($pseudo);
                                $new_password = sha1($password);
                                $new_email = htmlspecialchars($email);
        
                                $get_user = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
                                $get_user->execute([$pseudo]);
                                $verify = $get_user->rowCount();
        
                                if($verify == 1) {
                                    $this->error = "1;Compte déjà existant";
                                } else {
                                    $req = $db->prepare("INSERT INTO users(pseudo, email, password) VALUES(?, ?, ?)");
                                    $req->execute([$new_pseudo, $new_email, $new_password]);

                                    header('location: login');
                                }
                            } else {
                                $this->error = "1;Modification du code tentée, bloquée.";
                            }
                        } else {
                            $this->error = "1;Le mot de passe doit être supérieur à 6";
                        }
                    } else {
                        $this->error = "1;Le pseudo doit contenir au maximum 15 caractères";
                    }
                } else {
                    $this->error = "1;Tous les champs doivent être entrés";
                }

            }
        }
        $this->view('register');
    }

    public function login() {

        if(isset($_POST['sub_login'])) {
            $pseudo = $this->secure($_POST['pseudo']);
            $password = sha1($_POST['password']);
            
            if(isset($_SESSION['essai']) AND $_SESSION['essai'] >= 1) {
        
            } else {
                $_SESSION['essai'] = 0;
            }

            if(isset($pseudo) AND isset($password)) {
                
                if(!empty($pseudo) AND !empty($password)) {
                    
                    
                    if(User::exist($pseudo, $password)) {
                        if(!isset($_COOKIE['boom'])) {

                            $recup_user = User::recup($pseudo, $password);

                            $_SESSION['actif'] = sha1($password);
                            $_SESSION['id'] = $recup_user['id'];
                            $_SESSION['grade'] = $recup_user['grade'];
                            $_SESSION['pseudo'] = $recup_user['pseudo'];
                            
                            User::setCo($_SESSION['actif'], $_SESSION['id']);
                            
                            $this->error = "0;Vous êtes bien connectés";
                            $this->redirect('accueil');
                        } else {
                            $this->error = "1;Vous ne pouvez pas vous connecter pour le moment, attendez 1 minute";
                        }
                    } else {
                        $_SESSION['essai']++;
                        $this->error = "1;Votre compte n'existe pas";
                        echo "<script>$.notify('Votre compte n'existe pas', 'error')</script>";
                        if($_SESSION['essai'] == 5) {
                            $this->error = "1;Vous ne pouvez pas vous connecter pour le moment, attendez 1 minute";
                            setcookie('boom', 'boom', time()+60);
                            unset($_SESSION['essai']);
                        }
                    }

                } else {
                    $_SESSION['essai']++;
                }

            }
        }
        
        $this->view('login');

    }

    public function logout() {
        session_start();
        User::logout($_SESSION['id']);
        session_destroy();
        
        $this->redirect('accueil');

    }

}