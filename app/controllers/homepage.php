<?php
class homepage extends DController {
    public function __construct() {
        parent::__construct();
    }
    
    //Phương thức index để hiển thị trang chủ
    public function index() {
        $bookModel = $this->load->model('bookModel');
        $table_book = 'books';
        $data['books'] = $bookModel->getAllBook($table_book);
        $data['bookBestSelling'] = $bookModel->getBestSellingBookHomepage($table_book);
        $this->load->view('homepage', $data);
    }

    public function notfound() {
        $this->load->view('404');
    }
}