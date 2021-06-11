<?php
    $email = mysqli_real_escape_string($connect, $_POST["sign-in-email"]);  
    $password = mysqli_real_escape_string($connect, $_POST["sign-in-password"]);  
?>