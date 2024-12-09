<?php

class Load {
    public function __construct() {

    }
    /**
     * @param array|false $data
     */
    public function view($file_name, $data = false) {
        if ($data == true) {
            extract($data);
        }
        include './app/views/' . $file_name . '.php';
    }
    public function model($file_name) {
        include './app/models/' . $file_name . '.php';
        return new $file_name();
    }
}