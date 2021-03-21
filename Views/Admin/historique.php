<html>
    <head>
        <title>Gestion des utilisateurs dans l'administration</title>
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
                <h2>Historique de paiements</h2>

                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Prix</th>
                        <th>Ville</th>
                        <th>Date</th>
                    </tr>
                    <?php
                    $auto = 0;
                    foreach ($liste_historique as $value) {
                        $auto++;
                        ?>
                    <tr>
                        
                                
                        <td><?= $auto; ?></td>
                        <td><?= $value['nom']; ?></td>
                        <td><?= $value['email']; ?></td>
                        <td><?= $value['addr']; ?></td>
                        <td><?= $value['total']; ?></td>
                        <td><?= $value['ville']; ?></td>
                        <td><?= $value['buyat']; ?></td>

                            
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