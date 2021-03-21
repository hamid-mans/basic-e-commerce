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
                    

                <div class="droit">
                    <h4>Editeur de variant</h4><br>

                    <form method="post">
                    

                        <label for="title">Titre</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Titre de l'annonce" value="<?= $my_article['title']; ?>"><br>

                        <label for="price">Prix</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Prix" value="<?= $my_article['price']; ?>"><br>
                        
                        <label for="couleurs">Couleur</label>
                        <select name="couleurs" id="couleurs" class="form-control">
                        <br>
                            <option value="null">Choisir votre couleur</option>
                            <?php foreach ($liste_couleurs as $value) { ?>
                                <option value="<?= $value['id']; ?>"><?= $value['text']; ?></option>
                            <?php } ?>
                        </select><br>

                        <label for="ram">Ram</label>
                        <select name="ram" id="ram" class="form-control">
                            <option value="null">Choisir votre ram</option>
                            <?php foreach ($liste_ram as $value) { ?>
                                <option value="<?= $value['id']; ?>"><?= $value['ram']; ?>Go</option>
                            <?php } ?>
                        </select>

                        <br>
                        <button type="submit" name="sub_new_variant" style="width: 100%;" class="btn btn-success" type="submit"><i class="fa fa-hammer"></i> Construire cette variante</button>
                    </form>
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