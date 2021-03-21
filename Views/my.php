<html>
    <head>
        <title>Mon panier</title>
        <meta charset="utf-8">
        <?php $this->css(0, 'css'); ?>
        <?php $this->css(0, 'burger'); ?>
        <?php $this->css(0, 'header'); ?>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/englishextra/img-lightbox@0.2.4/css/img-lightbox.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
        <?php include "include/header.php"; ?>

        <div class="content">
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Produit</th>
                    <th>Description</th>
                    <th>Quantité</th>
                    <th>Poids</th>
                    <th>Prix</th>
                    <th></th>
                </tr>

                <?php
                $auto = 0;
                foreach ($produits_panier as $value) { $auto++; $article = Shop::show($value['id_article']);
                $fiche = Panier::get($value['id_article']);
                ?>
                    <tr>
                        <td><?= $auto; ?></td>
                        <td><img style="height: 100px;width:100px;" src="./<?= $this->viewPathName; ?>/images/<?= $article['image']; ?>" alt="" class="img-thumbnail"></td>
                        <td><?= $article['title']; ?></td>
                        <td><?= $article['description']; ?></td>
                        <td>
                            <a href="panier/moins/<?= $value['id_article']; ?>"><i class="fa fa-minus"></i></a>
                            <?= $fiche['qte']; ?>
                            <a href="panier/add/<?= $value['id_article']; ?>"><i class="fa fa-plus"></i></a>
                        </td>
                        <td><?= $fiche['poids'] . 'kg'; ?></td>
                        <td><?php
                            if(Promo::exist($fiche['id_article'])) { ?>
                                <span><?= $fiche['prix']; ?>€</span>
                            <?php } else { ?>
                                <span><?= $fiche['prix'] . '€'; ?></span>
                            <?php } ?></td>
                    </tr>
                <?php } ?>
            </table>

            <?php if(Panier::many() >= 1) { ?>
                <div class="infos">
                    Produits : <?= Panier::many(); ?><br>
                    Poids total : <?= Panier::total('poids')[0] . 'kg'; ?> <br>
                    Prix total HT : <?= Panier::total('prix')[0] . '€'; ?>
                </div>
            <?php } ?>



<div id="paypalbuttoncontainer"></div>
      <script src="https://www.paypalobjects.com/api/checkout.js"></script>
      <script>
        paypal.Button.render({
             
            env: 'sandbox', //ou sandbox si vous êtes dans l'onglet "Sandbox"
            
            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox: 'AathHuj2t0KbQMlrj69DieoQDc7TzgH1BgMBb5OgKW1tyN1a85eR0NC1Ipd0OOCb3Kc2qnFMUaG4IPSO'
            },
            style: {
                size: 'large',
                color: 'black',
                shape: 'rect',
                label: 'paypal',
                tagline: 'false'
                },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {
                
                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: <?= Panier::total('prix')[0] ?>, currency: 'EUR' }
                               
                            }
                            
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
                    console.log('Paiement effectué !');
        
                    window.location = "http://localhost/commerce/paypal_panier.php?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=<?= 2; ?>&price=<?= 2; ?>";

                });
            }


        }, '#paypalbuttoncontainer');

    </script>
        </div>

        


        <script src="https://cdn.jsdelivr.net/gh/englishextra/img-lightbox@0.2.4/js/img-lightbox.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/notify.js"></script>
        <?php $this->js(0   , 'burger'); ?>
    </body>
</html>