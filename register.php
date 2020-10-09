<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "catalog_management_system";

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO `Users` (`user_id`, `major_id`, `name`, `email`, `password`, `user_type`) VALUES (NULL, '" . $_GET["major_id"] . "', '" . $_GET["name"] . "', '" . $_GET["email"] . "', '" . $_GET["password"] . "', '" . $_GET["user_type"] . "')";
    $conn->query($sql);
    $conn->close();

    $to = $_GET["email"];
    $subject = "Catalog Management System Registration Confirmation";
    
    $message = "<h1>Welcome to the CMS" . $_GET["name"] . "</h1>";
    $message .= "<p>Please login and explore what the CMS has to offer.<p>";
    
    
    $header = "From:vijit.singh@mavs.uta.edu \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
    
    $retval = mail ($to,$subject,$message,$header);
    
    if( $retval == true ) {
        echo "Message sent successfully...";
    }else {
        echo "Message could not be sent...";
    }


    // header("Location: login.html");
?>