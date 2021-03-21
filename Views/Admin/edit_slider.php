<html>
    <head>
        <title>Gestion des articles dans l'administration</title>
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
            
            <div class="card">
                <h2>Edition du slider "<?= $slider['nom']; ?>"</h2>

                <div>
                    <div class="d-flex justify-content-around flex-wrap" style="text-align: center;">
                        <?php if($slider['image1'] != null) { ?> <div class="img-thumbnail"><img style="height:100px" src="../../../<?= $slider['image1'] ?>" alt="L'image n'existe pas !"> <br>Image 1<br><form method="post" enctype="multipart/form-data"><input type="file" name="image1" class="form-control" id="image1"></div> <?php } ?>
                        <?php if($slider['image2'] != null) { ?> <div class="img-thumbnail"><img style="height:100px" src="../../../<?= $slider['image2'] ?>" alt="L'image n'existe pas !"> <br>Image 2<br><input type="file" name="image2" class="form-control" id="image2"></div> <?php } ?>
                        <?php if($slider['image3'] != null) { ?> <div class="img-thumbnail"><img style="height:100px" src="../../../<?= $slider['image3'] ?>" alt="L'image n'existe pas !"> <br>Image 3<br><input type="file" name="image3" class="form-control" id="image3"></div> <?php } ?>
                        <?php if($slider['image4'] != null) { ?> <div class="img-thumbnail"><img style="height:100px" src="../../../<?= $slider['image4'] ?>" alt="L'image n'existe pas !"> <br>Image 4<br><input type="file" name="image4" class="form-control" id="image4"></div> <?php } ?>
                        <?php if($slider['image5'] != null) { ?> <div class="img-thumbnail"><img style="height:100px" src="../../../<?= $slider['image5'] ?>" alt="L'image n'existe pas !"> <br>Image 5<br><input type="file" name="image5" class="form-control" id="image5"></div> <?php } ?>
                        <?php if($slider['image6'] != null) { ?> <div class="img-thumbnail"><img style="height:100px" src="../../../<?= $slider['image6'] ?>" alt="L'image n'existe pas !"> <br>Image 6<br><input type="file" name="image6" class="form-control" id="image6"></div> <?php } ?>
                        <?php if($slider['image7'] != null) { ?> <div class="img-thumbnail"><img style="height:100px" src="../../../<?= $slider['image7'] ?>" alt="L'image n'existe pas !"> <br>Image 7<br><input type="file" name="image7" class="form-control" id="image7"></div> <?php } ?>
                        <?php if($slider['image8'] != null) { ?> <div class="img-thumbnail"><img style="height:100px" src="../../../<?= $slider['image8'] ?>" alt="L'image n'existe pas !"> <br>Image 8<br><input type="file" name="image8" class="form-control" id="image8"></div> <?php } ?>
                        <?php if($slider['image9'] != null) { ?> <div class="img-thumbnail"><img style="height:100px" src="../../../<?= $slider['image9'] ?>" alt="L'image n'existe pas !"> <br>Image 9<br><input type="file" name="image9" class="form-control" id="image9"></div> <?php } ?>
                        <?php if($slider['image10'] != null) { ?> <div class="img-thumbnail"><img style="height:100px" src="../../../   <?= $slider['image10'] ?>" alt="L'image n'existe pas !"> <br>Image 10<br><input type="file" name="image10" class="form-control" id="image10"></div> <?php } ?>
                    </div>

                    <input type="submit" name="sub_edit_images" value="Modifier les images" class="btn btn-success">
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