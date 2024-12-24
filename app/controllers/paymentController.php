<?php

class paymentController extends DController {
    public function __construct() {
        parent::__construct();
    }
    public function successfulPayment() {
        $this->load->view('successfulPayment');
    }
}