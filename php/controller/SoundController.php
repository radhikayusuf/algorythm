<?php

    session_start();

    require_once '../connection.php';
    require_once '../model/soundmodel.php';

    $db = new Database();
    $soundModel = new SoundModel($db);

    $con = $db->mysqli;

    $soundName = mysqli_real_escape_string($con, $_POST['sound_name']);
    $author = mysqli_real_escape_string($con, $_POST['author']);


    /**
     * Uploading cover image
     */
    $target_image_dir = "../../images/";
    $target_image_file = $target_image_dir . basename($_FILES["imageCover"]["name"]);
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target_image_file,PATHINFO_EXTENSION));
    

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imageCover"]["tmp_name"]);
        if($check === false) {
            $_SESSION['message'] = "File is not an image.";
            header("location: http://192.168.64.2/algorythm/addsound.php");
            exit;   
        }
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header("location: http://192.168.64.2/algorythm/register.php");
        exit;        
    }
    
    $fileLocation = basename($_FILES["imageCover"]["name"]);

    $fileResultImage = time() . '-' .strtolower(str_replace(' ', '', $soundName)) .'.'. $imageFileType;
    $target_image_file = $target_image_dir . '' . $fileResultImage;

    if (move_uploaded_file($_FILES["imageCover"]["tmp_name"], $target_image_file)) {
        echo "The file ". $fileLocation . " has been uploaded.";
    } else {        
        $_SESSION['message'] = "Sorry, there was an error uploading your file.";
        header("location: http://192.168.64.2/algorythm/addsound.php");
        exit;  
    }
    /** End of Uploading cover image */




    /**
     * Uploading sound
     */
    $target_sound_dir = "../../sounds/";
    $target_sound_file = $target_sound_dir . basename($_FILES["sound"]["name"]);
    $uploadOk = 1;

    $soundUImageTyoe = strtolower(pathinfo($target_sound_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    
    if($soundUImageTyoe != "mp3" && isset($_POST["submit"])) {
        $_SESSION['message'] = "Sorry, only MP3 file is allowed.";
        header("location: http://192.168.64.2/algorythm/addsound.php");
        exit;        
    }
    
    $fileLocation = basename($_FILES["sound"]["name"]);
    $fileResultSound = time() . '-' .strtolower(str_replace(' ', '', str_replace('\\', '',$soundName))) .'.'. $soundUImageTyoe;
    $target_sound_file = $target_sound_dir . '' . $fileResultSound;

    if (move_uploaded_file($_FILES["sound"]["tmp_name"], $target_sound_file)) {
        echo "The file ". $fileLocation . " has been uploaded.";
    } else {        

        $_SESSION['message'] = "Sorry, there was an error uploading your sound. " . $target_sound_file;
        header("location: http://192.168.64.2/algorythm/addsound.php");
        exit;  
    }

    /** End of Uploading sound */


    $result = $soundModel->addSound($soundName, $author, 'images/'. $fileResultImage, 'sounds/'. $fileResultSound, $_SESSION['user_data']['id_user']);

    if($result){
        header("location: http://192.168.64.2/algorythm/index.php");
    } else {
        $_SESSION['message'] = "Error while posting sound";
        header("location: http://192.168.64.2/algorythm/addsound.php");
    } 

?>