<?php

class bookController extends DController {
    public function __construct() {
        parent::__construct();
    }
    public function showBookDetail() {
        $bookModel = $this->load->model('bookModel');

        $table_book = 'books';
        $book_id = $_GET['book_id'];

        $data['bookById'] = $bookModel->getBookById($table_book, $book_id);

        $this->load->view('book_detail', $data);
    }
}