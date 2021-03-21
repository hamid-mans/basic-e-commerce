<html>
    <head>
        <title>Shopping</title>
        <meta charset="utf-8">
        <?php $this->css(3, 'css'); ?>
        <?php $this->css(3, 'burger'); ?>
        <?php $this->css(3, 'header'); ?>
        <?php $this->css(3, 'admin'); ?>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
    
        <?php include "./" . $this->viewPathName . "/include/header_admin.php"; ?>

        
        <div class="content">
            
            <div class="card grid-a">
                <div class="gauche">
                    <img src="../../../<?= $this->viewPathName ?>/images/<?= $my_first_image['lien'] ?>" alt="a" class="img-thumbnail">
                    <form method="post" enctype="multipart/form-data">
                        <br>

                        <label for="image1">Image 1 (Active)</label>
                        <input type="file" name="image1" id="image1" class="form-control">

                        <label for="image2">Image 2</label>
                        <input type="file" name="image2" id="image2" class="form-control">

                        <label for="image3">Image 3</label>
                        <input type="file" name="image3" id="image3" class="form-control">

                        <label for="image4">Image 4</label>
                        <input type="file" name="image4" id="image3" class="form-control">

                        <input type="submit" name="sub_edit_images" value="Modifier les images" class="btn btn-warning">
                    </form>
                </div>

                <div class="droit">
                    <h4>Renseignements</h4>
                            <form method="post" class="form-group" enctype="multipart/form-data">

                            <label for="title">Titre</label>
                            <input type="text" name="new_title" id="title" class="form-control" placeholder="Titre de l'annonce" value="<?= $my_article['title']; ?>"><br>

                            <label for="description">Description</label>
                            <textarea name="new_description" id="description" class="form-control" placeholder="Description de l'annonce"><?= $my_article['description']; ?></textarea><br>
                            
                            <label for="categorie">Catégories</label>
                            <select name="new_categorie" id="categorie" class="form-control">
                                <option value="<?= $my_categorie['id']; ?>"><?= $my_categorie['nom_categorie']; ?></option>
                                <?php foreach($categories as $value_categorie) { ?>
                                    <option value="<?= $value_categorie['id']; ?>" title="<?= $value_categorie['description_categorie']; ?>"><?= $value_categorie['nom_categorie']; ?></option>
                                <?php } ?>
                            </select><br>
                            
                            <label for="price">Prix</label>
                            <input type="number" name="new_price" id="price" class="form-control" placeholder="Prix" value="<?= $my_article['price']; ?>"><br>

                            <label for="poids">Poids</label>
                            <input type="number" name="new_poids" id="poids" class="form-control" placeholder="Poids" value="<?= $my_article['poids']; ?>"><br>

                            <label for="frais">Frais de livraison</label>
                            <input type="number" name="new_frais" id="frais" class="form-control" placeholder="Frais de livraison" value="<?= $my_article['frais']; ?>"><br>
                            
                            <input type="submit" name="sub_edit_article" value="Modifier l'article" class="btn btn-warning">
                                    <br><br>
                                </form>
                </div>
            </div>

        </div>



        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/notify.js"></script>
        <?php $this->js(3, 'burger'); ?>  
    </body>
</html>

<link rel="stylesheet" href="css/cookie.css">