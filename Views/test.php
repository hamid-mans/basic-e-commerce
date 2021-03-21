<div id="paypalbuttoncontainer"></div>
      <script src="https://www.paypalobjects.com/api/checkout.js"></script>
      <script>
        paypal.Button.render({
             
            env: 'production', //ou sandbox si vous êtes dans l'onglet "Sandbox"
            
            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox: 'VOTRE CLIENT-ID'
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
                                amount: { total: '<?= $total; ?>', currency: 'EUR' }
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
        
                    window.location = "monsite.fr/payement/?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=<?= $product['id']; ?>&price=<?= $product['price']; ?>";

                });
            }


        }, '#paypalbuttoncontainer');

    </script>