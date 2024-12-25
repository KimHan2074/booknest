<?php
class orderController extends DController {
    public function __construct() {
        parent::__construct();
    }


    public function orderSuccess() {
        $this->load->view('payment_success');
    }
    
}