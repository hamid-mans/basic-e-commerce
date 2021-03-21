<html>
    <head>
        <title>Shopping</title>
        <meta charset="utf-8">
        <?php $this->css(3, 'css'); ?>
        <?php $this->css(3, 'burger'); ?>
        <?php $this->css(3, 'header'); ?>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/englishextra/img-lightbox@0.2.4/css/img-lightbox.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
        <?php include "include/header.php"; ?>

        

        <div class="content">

            <div class="present">
                <p><a href="../accueil">Accueil</a> > Fiche produit > <?= $my_categorie['nom_categorie'] ?> > <?= $variations['new_title'] ?></p>
            </div>
            
            <div class="grideuh">

                <div class="mini-imgs">
                    <div class="d-flex flex-column">
                        <?php foreach($images as $value_image) { ?>
                            
                            <a rel="lightbox" aria-hidden="true" data-src="../../../<?= $this->viewPathName . '/images/' . $value_image['lien']; ?>" href="../<?= $this->viewPathName . '/images/' . $value_image['lien']; ?>" class="img-lightbox-link">
                                <img class="img-thumbnail img-fluid" src="../../../<?= $this->viewPathName . '/images/' . $value_image['lien']; ?>"/>
                            </a>
                        <?php } ?>
                    </div>
                </div>

                <div class="imgs">
                    <img id="img-centre" src="../../../<?= $this->viewPathName . '/images/' . $my_article['image']; ?>" alt="ok">
                </div>

                <div class="info">
                    <h2><?= $variations['new_title']; ?></h2>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>

                    <span class="avis">117 avis</span>

                    

                    <span class="voir_avis">- <a href="#">VOIR LES AVIS</a></span>
                    <br><br>
                    <p class="price">
                        <?php
                            if($promo->exist($my_article['id'])) { ?>
                                <s><?= $my_article['price'] . '€'; ?></s>
                                <span style="margin-left: 10px;"><?= $promo->calcule_promo($my_article['id'], $promo->get($my_article['id'])['promo']); ?>€</span>
                            <?php } else { ?>
                                <span style="margin-left: 10px"><?= $variations['price'] . '€'; ?></span>
                            <?php } ?>
                        
                    </p>

                    <div class="d-flex justify-content-beetween align-items-center">

                        <div class="jaime" style="margin-left: 30px;">
                            <a href="#"><i style="font-size: 30px;color: initial;" class="fa fa-heart"></i></a>
                        </div>
                    </div>

                    <p>lorem</p>
                </div>

                <div class="stock card">
                    <div class="dispo-q">
                        <span class="dispo">DISPONIBLE</span>
                        <div style="text-align: center;" class="card">5</div>
                    </div>
                    <br><br>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam, enim voluptas assumenda ad, earum incidunt, dolore ex sed ea beatae inventore qui ut ipsum hic! In aliquam itaque harum ipsam?</p>
                
                    <button class="btn btn-warning"><i class="fa fa-shopping-basket"></i> Ajouter au panier</button>
                    <br>
                    <button class="btn btn-warning"><i class="fa fa-shopping-cart"></i> Acheter le produit</button>

                </div>

            </div>

        </div>

        
        <script src="https://cdn.jsdelivr.net/gh/englishextra/img-lightbox@0.2.4/js/img-lightbox.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/notify.js"></script>
        <script>
            imgLightbox("img-lightbox-link");
        </script>
        <?php $this->js(3, 'burger'); ?>
    </body>
</html>