<?php

    session_start();

    require_once '../connection.php';
    require_once '../model/registermodel.php';

    $db = new Database();
    $registerModel = new RegisterModel($db);

    $con = $db->mysqli;

    $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $emailaddress = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $job = mysqli_real_escape_string($con, $_POST['job']);
    $quotes = mysqli_real_escape_string($con, $_POST['quotes']);    



    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["imageprofile"]["name"]);
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imageprofile"]["tmp_name"]);
        if($check === false) {
            $_SESSION['message'] = "File is not an image.";
            header("location: http://192.168.64.2/algorythm/register.php");
            exit;   
        }
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {        
        $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header("location: http://192.168.64.2/algorythm/register.php");
        exit;        
    }
    
    $fileLocation = basename($_FILES["imageprofile"]["name"]);

    $fileResultName = time() . '-' .strtolower(str_replace(' ', '', $fullname)) .'.'. $imageFileType;
    $target_file = $target_dir . '' . $fileResultName;

    if (move_uploaded_file($_FILES["imageprofile"]["tmp_name"], $target_file)) {
        echo "The file ". $fileLocation . " has been uploaded.";
    } else {        
        $_SESSION['message'] = "Sorry, there was an error uploading your file.";
        header("location: http://192.168.64.2/algorythm/register.php");
        exit;  
    }

    if (preg_match($pattern, $emailaddress) !== 1) {
        $_SESSION['message'] = "Invalid Email format";
        header("location: http://192.168.64.2/algorythm/register.php");
        exit;
    }

    if($registerModel->checkUser($emailaddress) >0){
        $_SESSION['message'] = "Email already used";
        header("location: http://192.168.64.2/algorythm/register.php");
        exit;
    }

    if (strlen($password) < 8 || strlen($password) > 12) {
        $_SESSION['message'] = "Password must be 8 - 12 characters";
        header("location: http://192.168.64.2/algorythm/register.php");
        exit;
    }


    $result = $registerModel->addUser($fullname, $emailaddress, $password, $quotes, $job, 'images/'. $fileResultName);

    if($result){
        header("location: http://192.168.64.2/algorythm/login.php");
    } else {
        $_SESSION['message'] = "Error while register user";
        header("location: http://192.168.64.2/algorythm/register.php");
    }
    



?>