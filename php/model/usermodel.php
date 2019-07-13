<?php
class UserModel{

    function __construct(Database $db){
        $this->db = $db;
    }

    function retrieveUserData(){
        return $this->db->mysqli->query("SELECT * FROM tb_user LIMIT 6");
    }
}

?>

