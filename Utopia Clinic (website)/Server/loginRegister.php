<?php
    
     $database = mysqli_connect("localhost", "root", "", "utopiaclinic");
     session_start();
     
     if (!($database))
         die("<p>Could not connect to database </p>");
    
        $email = mysqli_real_escape_string($database, $_POST["sign-in-email"]);  
        $password = mysqli_real_escape_string($database, $_POST["sign-in-password"]);
        $pass = password_hash($_POST["sign-in-password"], PASSWORD_DEFAULT);
        $query = "SELECT * FROM account WHERE Email = '$email'";

        $result = mysqli_query($database, $query);
        if($result)  
        {  
            echo '<p> '.$pass.' </p>';
             while($row = mysqli_fetch_array($result))  
             { 
                  if(password_verify($password, $row["Password"])) {  
                       //return true;  
                       $_SESSION["email"] = $row['Email'];  
                       header("location: ../home.php");  
                  }  
                  else  
                  {  
                       //return false;  
                       echo '<script>alert("Wrong User Details")</script>';
                       //header("location: ../home.php");  
                  }  
             }  
        }  
        else  
        {  
             echo '<script>alert("Wrong User D")</script>';  
        }  
    
?>