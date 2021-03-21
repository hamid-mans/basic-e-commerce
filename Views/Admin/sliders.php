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
                <h2>Gestion des sliders</h2>

                
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Image 1</th>
                        <th>Image 2</th>
                        <th>Image 3</th>
                        <th>Image 4</th>
                        <th>Image 5</th>
                        <th>Image 6</th>
                        <th>Image 7</th>
                        <th>Image 8</th>
                        <th>Image 9</th>
                        <th>Image 10</th>
                    </tr>
                    <?php
                    $auto = 0;
                    foreach ($liste_sliders as $value) {
                        $auto++;
                        ?>
                        
                        <td><?= $auto; ?></td>
                        <td><?= $value['nom']; ?></td>
                        <td><?php if($value['image1'] != null) { ?> <img src="<?= $value['image1'] ?>" alt="L'image n'existe pas !" class="img-thumbnail"> <?php } ?></td>
                        <td><?php if($value['image2'] != null) { ?> <img src="<?= $value['image1'] ?>" alt="L'image n'existe pas !" class="img-thumbnail"> <?php } ?></td>
                        <td><?php if($value['image3'] != null) { ?> <img src="<?= $value['image1'] ?>" alt="L'image n'existe pas !" class="img-thumbnail"> <?php } ?></td>
                        <td><?php if($value['image4'] != null) { ?> <img src="<?= $value['image1'] ?>" alt="L'image n'existe pas !" class="img-thumbnail"> <?php } ?></td>
                        <td><?php if($value['image5'] != null) { ?> <img src="<?= $value['image1'] ?>" alt="L'image n'existe pas !" class="img-thumbnail"> <?php } ?></td>
                        <td><?php if($value['image6'] != null) { ?> <img src="<?= $value['image1'] ?>" alt="L'image n'existe pas !" class="img-thumbnail"> <?php } ?></td>
                        <td><?php if($value['image7'] != null) { ?> <img src="<?= $value['image1'] ?>" alt="L'image n'existe pas !" class="img-thumbnail"> <?php } ?></td>
                        <td><?php if($value['image8'] != null) { ?> <img src="<?= $value['image1'] ?>" alt="L'image n'existe pas !" class="img-thumbnail"> <?php } ?></td>
                        <td><?php if($value['image9'] != null) { ?> <img src="<?= $value['image1'] ?>" alt="L'image n'existe pas !" class="img-thumbnail"> <?php } ?></td>
                        <td><?php if($value['image10'] != null) { ?> <img src="<?= $value['image10'] ?>" alt="L'image n'existe pas !" class="img-thumbnail"> <?php } ?></td>
                    <tr>
                        
                                
                                

                            
                    </tr>
                    <?php } ?>
                </table>
                
            </div>


            <br><br>


            <div class="card add-c">
                <form method="post">
                    

                    <label for="nom">Nom de la catégorie</label>
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom de la catégorie"><br>

                    <label for="description">Description de la catégorie</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Description de la catégorie"><br>

                    <br>
                    <button type="submit" name="sub_new_categorie" style="width: 100%;" class="btn btn-success" type="submit"><i class="fa fa-hammer"></i> Ajouter une catégorie</button>
                </form>
            </div>

        </div>


        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/notify.js"></script>
        <?php $this->js(1, 'burger'); ?>
        <?php $this->js(1, 'add-c'); ?> 
    </body>
</html>

<link rel="stylesheet" href="css/cookie.css">