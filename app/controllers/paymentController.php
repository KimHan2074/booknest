<?php

class paymentController extends DController {
    public function __construct() {
        parent::__construct();
    }
    public function Payment() {
        $this->load->view('Payment');
    }
}