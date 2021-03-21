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
			        	echo "Succès ! Paiement validé";
                        require_once('./Models/Payment.php');
                        require_once('./Models/Panier.php');
 			        	
                        $all = (array) $transactions;
                        $amout = $all['amount'];
                        $total = (array) $amout;

                        $pour_item_list = (array) $all['item_list'];
                        $item_list = (array) $pour_item_list;
                        $shipping_address = (array) $item_list['shipping_address'];

                        $pour_payee = (array) $all['payee'];
                        $payee = (array) $pour_payee;
                        $merchant_id = (array) $payee['merchant_id'];

                        Payment::add_history($shipping_address['recipient_name'], $payee['email'], $shipping_address['line1'], $total['total'], $shipping_address['city']);
                        Panier::reset($_SESSION['id']);
                        header('location: ./Views/Payment/next.php');
			       	}else{
			          	echo "Erreur";
			       	}
				}
			}
        }
    
    }
echo validate($_GET['paymentID'], 'AathHuj2t0KbQMlrj69DieoQDc7TzgH1BgMBb5OgKW1tyN1a85eR0NC1Ipd0OOCb3Kc2qnFMUaG4IPSO', 'EErwobdbqeFDlih-YUIwVoj-tl2_uBRv4J9hNDdbbGXlMS35yVJIp4zObdFIh4C3J4eiki23tydh590J');
?>