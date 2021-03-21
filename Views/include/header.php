<div class="header">
    <div class="burger">
        <span></span>
    </div>

    <?php if(!$this->production) { 
            $base = '/commerce/';
        } else {
            $base = '';
        } ?>

    <div class="header_center">
        <a style="text-transform: uppercase; text-decoration: none;" href="<?= $base ?>accueil"><p>H-COMMERCE</p></a>
    </div>

    <div class="user">

        

        <?php
            if(!isset($_SESSION['actif'])) { ?>
                <a href="<?= $base ?>register"><i class="fa fa-user"></i></a>
            <?php } else { ?>
                <a href="<?= $base ?>logout"><i class="fa fa-sign-out-alt"></i></a>
                <a href="<?= $base ?>panier"><i class="fa fa-shopping-basket"></i></a>
                <a href="<?= $base ?>wish"><i class="fa fa-heart"></i></a>
                <?php if($_SESSION['grade'] >= 10) { ?>
                    <a href="<?= $base ?>admin"><i class="fa fa-gavel"></i></a>
                <?php } ?>
            <?php } ?>
        
    </div>
</div>

<div class="menu">
    
    <ul>
        <li><a href="<?= $base ?>accueil"><i class="fa fa-home"></i> Accueil</a></li>
        <li><a href="<?= $base ?>abonnements"><i class="fa fa-list-alt"></i> Abonnements</a></li>
        
        <li><a href="<?= $base ?>accueil"><i class="fa fa-user-circle"></i> Espace utilisateur</a></li>
    </ul>

</div>