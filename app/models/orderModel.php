<?php 

class OrderModel extends DModel {

    public function __construct() {
        parent::__construct();
    }

    public function insertBookIntoOrderItems($table_order_items, $data) {
        return $this->db->insert($table_order_items, $data);
    }

    public function updateOrderSummary($table_orders, $data, $condition) {
        return $this->db->update($table_orders, $data, $condition);
    }

    public function calculateTotalPrice($table_order_items, $order_id) {
        $sql = "
            SELECT 
                SUM(oi.quantity * b.price) AS total_price
            FROM 
                $table_order_items oi
            JOIN 
                books b ON oi.book_id = b.book_id
            WHERE 
                oi.order_id = :order_id
        ";

        $data = [':order_id' => $order_id];
        return $this->db->select($sql, $data);  
    }


    public function getOrderItemByOrderIdAndBookId($order_id, $book_id) {
        $sql = "SELECT * FROM order_items WHERE order_id = :order_id AND book_id = :book_id";

        $data = ['order_id' => $order_id,
                'book_id' => $book_id];
        return $this->db->select($sql, $data);

    }

    public function updateOrderItemQuantity($table_order_items, $data, $condition) {
        return $this->db->update($table_order_items, $data, $condition);
    }
}