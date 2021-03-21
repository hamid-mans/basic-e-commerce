<html>
    <head>
        <title>Shopping</title>
        <meta charset="utf-8">
        <?php $this->css(2, 'css'); ?>
        <?php $this->css(2, 'burger'); ?>
        <?php $this->css(2, 'header'); ?>
        <?php $this->css(2, 'admin'); ?>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>

        <?php include "./" . $this->viewPathName . "/include/header_admin.php"; ?>


        <div class="content">

            <form method="POST">
                <select name="articles_copy" id="articles_copy"  class="form-control" style="width: 100%;height: 50px;">
                    <option value="null">Choisir un article à construire</option>
                    <?php foreach ($liste_articles as $value) { ?>
                        <option value="<?= $value['id']; ?>"><?= $value['title']; ?></option>
                    <?php } ?>
                </select>
                <br>
                <button name="sub_construction" style="width: 100%;" class="btn btn-success" type="submit"><i class="fa fa-hammer"></i> Construire cet article</button>
            </form>

        </div>



        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/notify.js"></script>
        <?php $this->js(2, 'burger'); ?>  
    </body>
</html>

<link rel="stylesheet" href="css/cookie.css">