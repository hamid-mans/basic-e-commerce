<?php
session_start();
function validate($paymentID, $paypalClientID, $paypalSecret){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.paypal.com/v1/oauth2/token');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $paypalClientID.":".$paypalSecret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $response = curl_exec($ch);
		//echo "response:<br>";
		//echo $response;
        curl_close($ch);
        
        if(empty($response)){
            echo "Erreur...";
        }else{
            $jsonData = json_decode($response);
            $curl = curl_init('https://api.sandbox.paypal.com/v1/payments/payment/'.$paymentID);
            curl_setopt($curl, CURLOPT_POST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $jsonData->access_token,
                'Accept: application/json',
                'Content-Type: application/xml'
            ));
            $response = curl_exec($curl);
			//echo "<br>response 2:<br>";
			//echo $response;
            curl_close($curl);
            
            // Transaction data
            $result = json_decode($response);
			
			foreach ($result->transactions as $transactions){
				foreach($transactions->related_resources as $related_resources){
		        	if($related_resources->sale->state == "completed"){
                        
                        require_once('./Models/Abonnement.php');
                        //header('location: panier');

                        if($_GET['abo'] == 1) {
                            echo 'Vous avez choisis le forfait standars';
                        } else if($_GET['abo'] == 2) {
                            echo '2';
                        } else if($_GET['abo'] == '3') {
                            echo "Le troisièle";
                        }

                        Abonnement::set($_SESSION['id'], $_GET['abo']);
			       	}else{
			          	echo "Erreur";
			       	}
				}
			}
        }
    
    }
echo validate($_GET['paymentID'], 'Aeva9RKuY0bj4b4MVA4yvgnNCuy_SFzjwtSIHmxsgeXxd6pIsSdKa4-3xvpGtDazgyKHpHcNogz8mKHh', 'EBaB3SYLXFEstJwqGgL-wYmk1gg0CTT50e_3kEZr9X03K2C37VHkb53Kbh0ZjPiLPBaOoWnHb_kh7_Zi');
?>