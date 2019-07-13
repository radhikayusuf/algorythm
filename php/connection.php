<?php


class Database{
    private $host;
    private $user;
    private $pass;
    private $db;
    public $mysqli;
  
    public function __construct() {
      $this->db_connect();
    }
  
    private function db_connect(){
      $this->host = 'localhost:3306';
      $this->user = 'root';
      $this->pass = '';
      $this->db = 'db_algoritme';
  
      $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);

      if ($this->mysqli->connect_error) {
        die("Connection failed: " . $this->mysqli->connect_error);
      }
      return $this->mysqli;
    }
  
    public function exec($sql){
          $result = $this->mysqli->query($sql);
          return $result;
    }
  }
  
?>

<?php

// require_once '../Environment.php';

// class Database{

//     private $host;
//     private $user;
//     private $pass;
//     private $db;
//     public $mysqli;
  
//     public function __construct() {
//       $this->db_connect();
//     }
  
//     private function db_connect(){
//       $this->host = $HOST_MYSQL;
//       $this->user = $USER_MYSQL;
//       $this->pass = $PASSWORD_MYSQL;
//       $this->db = $DB_NAME;
  
//       $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);

//       if ($this->mysqli->connect_error) {
//         die("Connection failed: " . $this->mysqli->connect_error);
//       }
//       return $this->mysqli;
//     }
  
//     public function exec($sql){
//           $result = $this->mysqli->query($sql);
//           return $result;
//     }
//   }
  
// ?>