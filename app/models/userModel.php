<?php 

class userModel extends DModel {

    public function __construct() {
        parent::__construct();
    }

    public function insertUser($table_user, $data) {
        return $this->db->insert($table_user, $data);
    }

    public function checkUserExists($table, $email) {
        $sql = "SELECT * FROM $table WHERE email = :email";
        
        $data = [':email' => $email];
        return $this->db->select($sql, $data);
    }

    public function findUserByEmail($table, $email) {
        $sql = "SELECT * FROM $table WHERE email = :email";
        
        $data = [':email' => $email];
        return $this->db->select($sql, $data);
    }

    public function updatePassword($table_user, $data, $condition) {
        return $this->db->update($table_user, $data, $condition);
    }
    
    public function updateUserInfo($table_user, $data, $condition) {
        return $this->db->update($table_user, $data, $condition);
    }

    public function checkUserExistsByField($table, $column, $value) {
        $sql = "SELECT * FROM $table WHERE $column = :value";
        
        $data = [':value' => $value];
        return $this->db->select($sql, $data);
    }
    public function getUserByUserid($table_user, $user_id){
        $sql = "SELECT * FROM users WHERE user_id = :user_id";

        $data = [':user_id' => $user_id];
        return $this->db->select($sql, $data);
    }
    
}