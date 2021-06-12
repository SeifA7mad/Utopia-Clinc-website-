<?php
    $database = mysqli_connect("localhost", "root", "", "utopiaclinic");
    if (!($database))
        die("<p>Could not connect to database </p>");

        $NationalID = $_POST['NationalID'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $DOB = $_POST['DOB'];   
        $PhoneNo = $_POST['phoneNum'];
        $gender = $_POST['gender'];
        $signUpEmail = $_POST['sign-up-email'];
        $signUpPass = $_POST['sign-up-password'];
        $pass = password_hash($signUpPass, PASSWORD_DEFAULT);

        $target_dir = "./images";
        $target_file = basename($_FILES["profielPic"]["name"]);

        $target = "./images/" . basename($_FILES["profielPic"]["name"]); 

        move_uploaded_file($_FILES["profielPic"]["tmp_name"], ".$target_dir/$target_file");

        $query1 = "  INSERT INTO user (National_ID, Fname, Lname, DOB, PhoneNo, gender)
        VALUES ('$NationalID', '$fname', '$lname', '$DOB', '$phoneNo', '$gender')";

        $query2 = "  INSERT INTO patient (National_ID)
        VALUES ('$NationalID')";
        
        $query3 = "  INSERT INTO account (NationalID, Email, Password, ProfilePicture, AccountType)
        VALUES ('$NationalID', '$signUpEmail', '$pass', '$target', 'Patient')";

        $result1 = mysqli_query($database, $query1);
        $result2 = mysqli_query($database, $query2);
        $result3 = mysqli_query($database, $query3);


        mysqli_close($database);
        header("location: ../home.php");    
?>

