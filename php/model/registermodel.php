<?php
class RegisterModel{

    function __construct(Database $db){
        $this->db = $db;
    }

    function addUser($name, $email, $password, $quote, $jobs, $file_location){                    
        $encPass = md5($password);
        $sql = "INSERT INTO tb_user(`name_user`,`email`,`password`,`avatar`,`quotes`,`job`) VALUES('". $name ."','". $email ."','". $encPass ."','". $file_location ."','". $quote ."','". $jobs ."')";
        return $this->db->exec($sql);
    }

    function checkUser($email){        
        $sql = "SELECT count(id_user) as jml FROM tb_user WHERE email = '". $email ."'";     
        return (int) $this->db->exec($sql)->fetch_assoc()['jml'];        
    }
}
?>