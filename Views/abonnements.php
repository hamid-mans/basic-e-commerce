<html>
    <head>
        <title>Abonnements</title>
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
        <h3>Abonnements</h3>
        <br>
            
            <div class="d-flex justify-content-around">


                <?php foreach($liste_abonnements as $abo) { ?>
                    <div class="card" style="width: 18rem;">
                        <img src="<?= $abo['image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $abo['titre']; ?></h5>
                            <p class="card-text"><?= $abo['description']; ?></p>
                            <p><?= $abo['price'] . '€'; ?></p>
                            <a href="abonnements/<?= $abo['id']; ?>" class="btn btn-primary">Souscrire</a>
                        </div>
                    </div>
                <?php } ?>


            </div>

        </div>

        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/notify.js"></script>
        <script src="<?= $this->viewPathName; ?>/js/burger.js"></script>
    </body>
</html>

<link rel="stylesheet" href="css/cookie.css">