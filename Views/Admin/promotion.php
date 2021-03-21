<html>
    <head>
        <title>Gestion des réductions dans l'administration</title>
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

            <?php if(isset($this->error)) { ?>
                <div class="alert alert-danger">
                    <?= $this->error; ?>
                </div>
            <?php } ?>
            
            <div class="card">
                <h2>Gestion des réductions</h2>

                

                
                <div class="grid2">
                
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Article</th>
                            <th>Réduction</th>
                        </tr>
                        <?php
                        $auto = 0;
                        foreach ($liste_promotions as $value) {
                            $auto++;
                            ?>
                            <td><?= $auto; ?></td>
                            <td><?= $shop->show($value['id_article'])['title']; ?></td>
                            <td><?= $value['promo'] . '%'; ?></td>
                            <td><a href="promotions/remove/<?= $value['id']; ?>"><i class="fa fa-trash"></i></a></td>
                            
                        <tr>   
                        </tr>
                        <?php } ?>
                    </table>

                    <div class="form">
                        <form method="POST" class="form-group">
                            <select class="form-control" name="articles" id="articles">
                                <option value="null">Choisir un article</option>
                                <?php foreach($liste_articles as $value_article) { ?>
                                    <option value="<?= $value_article['id']; ?>"><?= $value_article['title']; ?></option>
                                <?php } ?>
                            </select><br>
                            <label for="reduction">Réduction</label>
                            <input class="form-control" type="number" name="reduction" id="reduction" placeholder="Réduction">
                            <br>
                            <button type="submit" name="add_promo" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter</button>
                        </form>
                    </div>
                </div>
                
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