<?php
    $database = mysqli_connect("localhost", "root", "", "utopiaclinic");
    if (!($database))
        die("<p>Could not connect to database </p>");

        $NationalID = $_POST['NationalID'];
        $fname = $_POST['Fname'];
        $lname = $_POST['Lname'];
        $DOB = $_POST['DOB'];
        $phoneNo = $_POST['phoneNum'];
        $gender = $_POST['gender'];
        $medicalSpeciality = $_POST['speciality'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pass = password_hash($password, PASSWORD_DEFAULT);

        $target_dir = "./images";
        $target_file = basename($_FILES["profielPic"]["name"]);

        $target = "./images/" . basename($_FILES["profielPic"]["name"]); 

        move_uploaded_file($_FILES["profielPic"]["tmp_name"], ".$target_dir/$target_file");

        $query1 = "  INSERT INTO user (National_ID, Fname, Lname, DOB, PhoneNo, gender)
        VALUES ('$NationalID', '$fname', '$lname', '$DOB', '$phoneNo', '$gender')";
        
        $query2 = "  INSERT INTO doctor (National_ID, MedicalSpecialist, Address)
        VALUES ('$NationalID', '$medicalSpeciality', '$address')";

        $query3 = "  INSERT INTO account (NationalID, Email, Password, AccountType, ProfilePicture)
        VALUES ('$NationalID', '$email', '$pass', 'Doctor', '$target')";
        
        
        $result1 = mysqli_query($database, $query1);
        $result2 = mysqli_query($database, $query2);
        $result3 = mysqli_query($database, $query3);


        mysqli_close($database);
        header("Location: ../admin/dashboard.php");
?>