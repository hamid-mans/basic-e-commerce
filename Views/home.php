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
            <!--<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <center><a href="#"><img class="d-block w-50" src="./<?= $this->viewPathName; ?>/images/web.png" alt="First slide"></a></center>
                    </div>
                    <div class="carousel-item">
                        <center><a href="#"><img class="d-block w-50" src="./<?= $this->viewPathName; ?>/images/recon.png" alt="Second slide"></a></center>
                    </div>
                    <div class="carousel-item">
                        <center><a href="#"><img class="d-block w-50" src="./<?= $this->viewPathName; ?>/images/alexa.png" alt="Third slide"></a></center>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>-->

            <div class="owl-carousel owl-theme" style="box-shadow: 4px 4px 10px gray;">
                <?php foreach($home_slider as $slider) { ?>
                    <?php if($slider['image1'] != null) { ?> <center><a href="#"><img class="d-block w-50" src="<?= $slider['image1']; ?>" alt="First slide"></a></center> <?php } ?>
                    <?php if($slider['image2'] != null) { ?> <center><a href="#"><img class="d-block w-50" src="<?= $slider['image2']; ?>" alt="First slide"></a></center> <?php } ?>
                    <?php if($slider['image3'] != null) { ?> <center><a href="#"><img class="d-block w-50" src="<?= $slider['image3']; ?>" alt="First slide"></a></center> <?php } ?>
                    <?php if($slider['image4'] != null) { ?> <center><a href="#"><img class="d-block w-50" src="<?= $slider['image4']; ?>" alt="First slide"></a></center> <?php } ?>
                    <?php if($slider['image5'] != null) { ?> <center><a href="#"><img class="d-block w-50" src="<?= $slider['image5']; ?>" alt="First slide"></a></center> <?php } ?>
                    <?php if($slider['image6'] != null) { ?> <center><a href="#"><img class="d-block w-50" src="<?= $slider['image6']; ?>" alt="First slide"></a></center> <?php } ?>
                    <?php if($slider['image7'] != null) { ?> <center><a href="#"><img class="d-block w-50" src="<?= $slider['image7']; ?>" alt="First slide"></a></center> <?php } ?>
                    <?php if($slider['image8'] != null) { ?> <center><a href="#"><img class="d-block w-50" src="<?= $slider['image8']; ?>" alt="First slide"></a></center> <?php } ?>
                    <?php if($slider['image9'] != null) { ?> <center><a href="#"><img class="d-block w-50" src="<?= $slider['image9']; ?>" alt="First slide"></a></center> <?php } ?>
                    <?php if($slider['image10'] != null) { ?> <center><a href="#"><img class="d-block w-50" src="<?= $slider['image10']; ?>" alt="First slide"></a></center> <?php } ?>
                <?php } ?>

            </div>

            <br><br>


            <h1>LES OFFRES DU MOMENT</h1>
            <hr>

            <div class="d-flex flex-fill flex-wrap justify-content-between">

                <?php foreach ($moment as $key => $value) {
                    $select = $wish->select($value['id']);
                    
                    ?>
                    <div class="card" style="width: 18rem;margin-bottom: 30px;">
                        <?php $img = $image->get_by_num_image($value['id'], 'image1'); ?>
                        <a href="fiche/<?= $value['id']; ?>"><img src="./<?= $this->viewPathName; ?>/images/<?= $img['lien']; ?>" class="card-img-top"></a>
                        <div class="card-body">
                            <?php if($promo->exist($value['id'])) {
                                $liste_promo = $promo->get($value['id']);
                                echo ' | <span class="badge bg-danger">' . '-' . $liste_promo['promo'] . '%</span>'; } ?></h5>
                            <p class="card-text"><?= $value['description']; ?></p>

                            <!-- Etoiles -->

                            <span><?php if($promo->exist($value['id'])) { echo '<s>' . $value['price'] . '€</s>'; echo ' '; echo $promo->calcule_promo($value['id'], $liste_promo['promo']) . '€'; } else { echo $value['price'] . '€'; } ?></span>
                            <a href="wish/add/<?= $value['id']; ?>">
                            <?php

                                if(empty($select)) { ?>
                                    <i class="fas fa-star"></i>
                                <?php } else { ?>
                                    <?php if(isset($select)) {
                                        if($select[0]['is_wish'] == 1) { ?>
                                            <i style="color:red;" class="fas fa-star"></i>
                                        <?php } else { ?>
                                            <i class="fas fa-star"></i>
                                        <?php }
                                    } else { ?>
                                        <i class="fas fa-star"></i>
                                    <?php }
                                }

                            ?>
                            </a>
                        </div>
                    </div>
                <?php } ?>
                
            </div>

            <br><br><br><br>

            <h1>COUP DE COEUR</h1>
            <hr>
            <p id="ok">ok</p>


        </div>

        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/notify.js"></script>
        <script src="<?= $this->viewPathName; ?>/js/burger.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script>
        $(document).ready(function(){
        $(".owl-carousel").owlCarousel();
        });</script>
    </body>
</html>

<link rel="stylesheet" href="css/cookie.css">