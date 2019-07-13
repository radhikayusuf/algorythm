<?php
class SoundModel{

    function __construct(Database $db){
        $this->db = $db;
    }

    function retrieveSoundData(){
        return $this->db->mysqli->query("SELECT * FROM tb_sound");
    }


    function addSound($soundName, $author, $coverLocation, $soundLocation, $id_user){    
        $sql = "INSERT INTO tb_sound(`name`,`author`,`file`,`images`, `id_user`) VALUES('". $soundName ."','". $author ."','". $soundLocation ."','". $coverLocation ."','". $id_user ."')";        
        return $this->db->exec($sql);
    }
}

?>




