<?php 

class cartModel extends DModel {

    public function __construct() {
        parent::__construct();
    }

    public function getCartByUserIdAndStatus($user_id, $status) {
        $sql = "SELECT * FROM `orders` WHERE `user_id` = :user_id AND `status` = :status LIMIT 1";
        
        $data = [':user_id' => $user_id, 'status' => $status];
        return $this->db->select($sql, $data);
    }
    
    public function createNewCart($table_orders, $data) {
        return $this->db->insertCart($table_orders, $data);
    }

}