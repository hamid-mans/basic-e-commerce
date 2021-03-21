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
            <?php if(isset($this->error)) {
                if(explode(';', $this->error)[0] == 1) { ?>
                <div class="alert alert-danger">
                    <?= explode(';', $this->error)[1] ?>
                </div>
            <?php } else { ?>
                <div class="alert alert-success">
                    <?= explode(';', $this->error)[1] ?>
                </div>
           <?php  } } ?>
            
            <div class="card">

                <h2>Articles</h2>

                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Poids</th>
                        <th>Admin</th>
                    </tr>
                    <?php
                            foreach ($liste_articles as $value) { ?>
                    <tr>
                        
                                
                                <td><?= $value['id']; ?></td>
                                <td><?= $value['title']; ?></td>
                                <td><?= $value['description']; ?></td>
                                <td><?= $value['price']; ?></td>
                                <td><?= $value['poids']; ?></td>
                                <td>
                                    <a href="articles/delete/<?= $value['id']; ?>"><i class="fa fa-trash"></i></a>
                                    <a style="margin-left: 10px;" href="articles/edit/<?= $value['id']; ?>"><i class="fa fa-edit"></i></a>
                                </td>

                            
                    </tr>
                    <?php } ?>
                </table>

            </div>

            <br><br>

            <div class="card">
                <h2>Ajouter un article</h2>
                
                <div>
                        <br><br>

                        <div class="droit">
                            <h4>Renseignements</h4>
                            <form method="post" class="form-group" enctype="multipart/form-data">

                            <label for="title">Titre</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Titre de l'annonce"><br>

                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Description de l'annonce"></textarea><br>
                            
                            <label for="categorie">Catégories</label>
                            <select name="categorie" id="categorie" class="form-control">
                                <option value="null">-- Choisir la catégorie du produit --</option>
                                <?php foreach($categories as $value_categorie) { ?>
                                    <option value="<?= $value_categorie['id']; ?>" title="<?= $value_categorie['description_categorie']; ?>"><?= $value_categorie['nom_categorie']; ?></option>
                                <?php } ?>
                            </select><br>
                            
                            <label for="price">Prix</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="Prix"><br>

                            <label for="poids">Poids</label>
                            <input type="number" name="poids" id="poids" class="form-control" placeholder="Poids"><br>

                            <label for="frais">Frais de livraison</label>
                            <input type="number" name="frais" id="frais" class="form-control" placeholder="Frais de livraison"><br>
                            <br><br>
                            
                        </div>
                        
                        
                       

                        <div class="gauche">
                            
                                <h4>Images</h4>
                                <input type="file" name="image1" id="image1" class="form-control">
                                <br><br>
                                
                        </div>


                        <div class="supp">
                            <h4>Suppléments</h4>

                            <label for="qualite">Qualité</label>
                            <select name="qualite" id="qualite" class="form-control">
                                <option value="null">-- Choisir la qualité du produit --</option>
                                <?php foreach($qualites as $value_qualites) { ?>
                                    <option value="<?= $value_qualites['value']; ?>"><?= $value_qualites['qualite']; ?></option>
                                <?php } ?>
                            </select>

                            <label for="marque">Marque</label>
                            <input type="text" name="marque" id="marque" class="form-control" placeholder="Marque">
                            <br><br>
                            <input type="submit" name="sub_new_article" value="Ajouter" class="btn btn-warning">
                                    <br><br>
                                </form>
                        </div>
                </div>
                
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