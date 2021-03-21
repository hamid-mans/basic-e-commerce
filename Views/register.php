<html>
    <head>
        <title>Shopping</title>
        <meta charset="utf-8">
        <?php $this->css(0, 'css'); ?>
        <?php $this->css(0, 'burger'); ?>
        <?php $this->css(0, 'header'); ?>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
        <?php include "include/header.php"; ?>

        

        <div class="content">
            

            <form method="post" class="form-group">
                <label for="pseudo" class="col-form-label col-form-label-sm">Pseudo (Veuillez entrer votre pseudo d'authentification)</label><br>
                <input type="text" class="form-control" name="pseudo" id="pseudo" placegolder="Pseudo"><br>

                <label for="email" class="col-form-label col-form-label-sm">Email (Votre email doit être valide)</label><br>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email"><br>

                <label for="password" class="col-form-label col-form-label-sm">Mot de passe (Votre mot de passe doit faire minimum 6 caractères)</label><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe"><br>

                <button name="sub_register" type="submit" class="btn btn-outline-success">Inscrivez-vous</button> <?php
                    if(isset($this->error)) {
                        $err = explode(';', $this->error);
                        if($err[0] == 1) { ?>
                            <span class="err_error"> - <?= $err[1]; ?></span>
                        <?php } else if($err[0] == 0 ) { ?>
                            <span class="err_success"> - <?= $err[1]; ?></span>
                        <?php } } ?>
            </form>
            <br>
            Si vous avez un compte, <a href="login">connectez-vous</a> au site


        </div>

        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/notify.js"></script>
        <script src="<?= $this->viewPathName; ?>/js/burger.js"></script>
    </body>
</html>

<link rel="stylesheet" href="css/cookie.css">