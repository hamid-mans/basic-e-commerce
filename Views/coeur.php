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
            
        <form method="POST">
        <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Annonce</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>
                <?php $auto = 0;
                foreach ($liste as $value) {
                $data = $wish->show($value['id_article']);
                $auto++;
                ?>
                    <tr>
                        <td style="font-weight: bold;"><?= $auto; ?></td>
                        <td><img class="img-thumbnail" style="height: 100px;width:100px;" src="./<?= $this->viewPathName; ?>/images/<?= $data['image']; ?>" alt="Image"></td>
                        <td><?= $data['title']; ?></td>
                        <td><?= $data['description']; ?></td>
                        <td><?php
                            if(Promo::exist($data['id'])) { ?>
                                <span><?= Promo::calcule_promo($data['id'], Promo::get($data['id'])['promo']); ?>€</span>
                            <?php } else { ?>
                                <span><?= $data['price'] . '€'; ?></span>
                            <?php } ?></td>
                        <td><button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter au panier</button></td>
                        <?php
                        $var = ($data['variation'] == null) ? '0' : $data['variation'];
                        if(isset($_POST['submit'])) { if(Panier::checkStock($id)) {
                            Panier::add($data['id'], $var);
                            $this->redirect('panier');
                        }  else {
                            $this->redirect('error/rupture');
                        }; } ?>
                    </tr>
                    <?php } 
                ?>
            </table>
            </post>

        </div>

        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/notify.js"></script>
        <script src="<?= $this->viewPathName; ?>/js/burger.js"></script>
    </body>
</html>

<link rel="stylesheet" href="css/cookie.css">