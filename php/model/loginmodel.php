<?php
class LoginModel{

    function __construct(Database $db){
        $this->db = $db;
    }

    function doLogin($email, $password){
        $encPass = md5($password);
        $sql = "SELECT * FROM tb_user WHERE email = '". $email ."' AND `password` = '" . $encPass."'";                
        return $this->db->exec($sql)->fetch_assoc();
    }
}
?>