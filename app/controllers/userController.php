<?php

class userController extends DController {
    public function __construct() {
        parent::__construct();
    }
    
    public function register() {
        $this->load->view('register_form');
    }

}