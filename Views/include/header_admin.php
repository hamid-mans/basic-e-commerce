<div class="header">
    <div class="burger">
        <span></span>
    </div>

    <div class="header_center">
        <p>Administration du E-commerce</p>
    </div>

    <div class="user">

        <?php if(!$this->production) { 
            $base = '/commerce/';
        } else {
            $base = '';
        } ?>

        <i class="fa fa-user"></i>
        <a href="<?= $base ?>accueil"><i title="Retour au site" class="fa fa-sign-out-alt"></i></a>
    </div>
</div>

<div class="menu">
    
    <ul>
        <li><a href="<?= $this->URL ?>"><i class="fa fa-home"></i> Accueil</a></li>
        <li><a href="<?= $this->URL ?>/articles"><i class="fa fa-shopping-bag"></i> Articles</a></li>
        <li><a href="<?= $this->URL ?>/variants"><i class="fa fa-copy"></i> Variants</a></li>
        <li><a href="<?= $this->URL ?>/categories"><i class="fa fa-list-alt"></i> Catégories</a></li>
        <li><a href="<?= $this->URL ?>/sliders"><i class="fa fa-poll-h"></i> Sliders</a></li>
        <li><a href="<?= $this->URL ?>/promotions"><i class="fa fa-lightbulb"></i> Promotions</a></li>
        <li><a href="<?= $this->URL ?>/avis"><i class="fa fa-newspaper"></i> Avis</a></li>
        <li><a href="<?= $this->URL ?>/utilisateurs"><i class="fa fa-user-circle"></i> Utilisateurs</a></li>
    </ul>

</div>