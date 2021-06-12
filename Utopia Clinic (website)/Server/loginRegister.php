<?php
    
     $database = mysqli_connect("localhost", "root", "", "utopiaclinic");
     session_start();
     
     if (!($database))
         die("<p>Could not connect to database </p>");
    
        $email = mysqli_real_escape_string($database, $_POST["sign-in-email"]);  
        $password = mysqli_real_escape_string($database, $_POST["sign-in-password"]);
        $pass = password_hash($_POST["sign-in-password"], PASSWORD_DEFAULT);
        $query = "SELECT * FROM account, user WHERE account.NationalID = user.National_ID AND Email = '$email'";

        $result = mysqli_query($database, $query);
        if($result)  
        {  
             while($row = mysqli_fetch_array($result))  
             { 
                  if(password_verify($password, $row["Password"])) {  
                       //return true;  
                       $_SESSION["email"] = $row['Email']; 
                       $_SESSION['Fname'] = $row['Fname'];
                       $_SESSION['Lname'] = $row['Lname']; 
                       $_SESSION['accType'] = $row['AccountType'];
                       $_SESSION['ssn'] = (int) $row['NationalID'];
                       $_SESSION['profilePic'] = $row['ProfilePicture'];
                       header("location: ../home.php");  
                  }  
                  else  
                  {  
                       //return false;  
                       echo '<script>alert("Wrong User Details")</script>';
                       header("location: ../home.php");  
                  }  
             }  
        }  
        else  
        {  
             echo '<script>alert("Wrong User D")</script>';  
        }  
    
?>