<?php
    session_start();
     $database = mysqli_connect("localhost", "root", "", "utopiaclinic");
     if (!($database))
         die("<p>Could not connect to database </p>");
    
    if ($_POST['func'] === "login") {
        $email = mysqli_real_escape_string($connect, $_POST["sign-in-email"]);  
        $password = mysqli_real_escape_string($connect, $_POST["sign-in-password"]);
    } 

    
?>