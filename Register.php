<?php
    include_once('config.php');
    include_once('Upload.php');
    $upfile     = new Upload();
    $name       = $_POST['myName'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $country    = $_POST['country'];
    $state      = $_POST['state'];
    $city       = $_POST['city'];
    $pincode    = $_POST['pincode'];
    $password    = $_POST['password'];
    $hash = md5($password);
    $uploadResult = $upfile->upload($_FILES);

    if($uploadResult['code']==0 && isset($uploadResult['code'])){
        $photo  = $uploadResult['filename'];

       $insSql= "INSERT INTO users(name,email,phone,country,state,city,pin_code,photo,password) VALUES ('".$name."','".$email."','".$phone."','".$country."','".$state."','".$city."','".$pincode."','".$photo."','".$hash."')";
        if ($conn->query($insSql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }else{
        echo $uploadResult; 
    }




?>