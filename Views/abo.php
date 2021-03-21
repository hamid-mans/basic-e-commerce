<html>
    <head>
        <title>Abonnements</title>
        <meta charset="utf-8">
        <?php $this->css(1, 'css'); ?>
        <?php $this->css(1, 'burger'); ?>
        <?php $this->css(1, 'header'); ?>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
    
        <?php include "include/header.php"; ?>

        <div class="content">
        <h3><?= $abo['titre']; ?></h3>

        <?= $abo['description']; ?>

        <div id="paypalbuttoncontainer"></div>
      <script src="https://www.paypalobjects.com/api/checkout.js"></script>
      <script>
        paypal.Button.render({
             
            env: 'sandbox', //ou sandbox si vous êtes dans l'onglet "Sandbox"
            
            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox: 'Aeva9RKuY0bj4b4MVA4yvgnNCuy_SFzjwtSIHmxsgeXxd6pIsSdKa4-3xvpGtDazgyKHpHcNogz8mKHh'
            },
            style: {
                size: 'large',
                color: 'blue',
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
                                amount: { total: <?= $abo['price']; ?>, currency: 'EUR' }
                               
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
        
                    window.location = "http://localhost/commerce/paypal_abo.php?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=<?= 2; ?>&price=<?= 2; ?>&abo=<?= $abo['id'];?>";

                });
            }


        }, '#paypalbuttoncontainer');

    </script>
        <br>
            
            

        </div>

        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/notify.js"></script>
        <?= $this->js(1, 'burger'); ?>
    </body>
</html>

<link rel="stylesheet" href="css/cookie.css">