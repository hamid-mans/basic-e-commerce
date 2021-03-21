<html>
    <head>
        <title>Gestion des articles dans l'administration</title>
        <meta charset="utf-8">
        <?php $this->css(1, 'css'); ?>
        <?php $this->css(1, 'burger'); ?>
        <?php $this->css(1, 'header'); ?>
        <?php $this->css(1, 'admin'); ?>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
        <?php include "./" . $this->viewPathName . "/include/header_admin.php"; ?>




        <div class="content">
            
            <div class="card">
                <h2>Gestion des avis</h2>

                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Utilisateur</th>
                        <th>Article</th>
                        <th>Avis</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $auto = 0;
                    foreach ($liste_avis_validations as $value) {
                        $auto++;
                        //$article = $gets->gets(explode(';', $value['variation'])[0])[0];
                        ?>
                    <tr>
                        
                                
                        <td><?= $auto; ?></td>
                        <td><?= User::get($value['id_user'])['pseudo']; ?></td>
                        <td><?= Shop::show($value['id_article'])['title']; ?></td>
                        <td><?= $value['avis']; ?></td>
                        <td><a href="avis/delete/<?= $value['id']; ?>"><i class="fa fa-trash"></i></a> | <a href="avis/accept/<?= $value['id']; ?>"><i class="fa fa-check"></i></a></td>

                            
                    </tr>
                    <?php } ?>
                </table>
                
            </div>

        </div>


        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/notify.js"></script>
        <?php $this->js(1, 'burger'); ?>    
    </body>
</html>

<link rel="stylesheet" href="css/cookie.css">