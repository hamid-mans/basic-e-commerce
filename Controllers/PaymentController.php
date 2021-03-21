<?php
require_once('./Controllers/Controller.php');
class PaymentController extends Controller {

    public function next() {
 
        var_dump($result);

        $this->view('Payment/next', [

        ]);
    }
}