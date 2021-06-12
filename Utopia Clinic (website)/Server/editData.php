<?php
    $database = mysqli_connect("localhost", "root", "", "utopiaclinic");

    if (!($database))
        die("<p>Could not connect to database </p>");

    if ($_POST['tableName'] == "Offers") {
        $id = (int)$_POST['id'];
        $newVal = $_POST['newVal'];
        if ($_POST['valToEdit'] == "Offer Name") {
            $query = "UPDATE offer SET OfferName='$newVal' WHERE OfferID=$id";
        } else if ($_POST['valToEdit'] == "Offer Descreption") {
            $query = "UPDATE offer SET 	OfferDescription='$newVal' WHERE OfferID=$id";
        } else if ($_POST['valToEdit'] == "Offer Price") {
            $query = "UPDATE offer SET 	OfferPrice='$newVal' WHERE OfferID=$id";
        } else if ($_POST['valToEdit'] == "Offer Date") {
            $query = "UPDATE offer SET 	expireDate='$newVal' WHERE OfferID=$id";
        }
    } else if ($_POST['tableName'] == "Doctors" || $_POST['tableName'] == "Patients") {
        $id = (int)$_POST['id'];
        if ($_POST['valToEdit'] == "First Name") {
            $query = "UPDATE user SET Fname='$newVal' WHERE National_ID =$id";
        } else if ($_POST['valToEdit'] == "Last Name") {
            $query = "UPDATE user SET Lname='$newVal' WHERE National_ID =$id";
        } else if ($_POST['valToEdit'] == "DOB") {
            $query = "UPDATE user SET DOB='$newVal' WHERE National_ID =$id";
        } else if ($_POST['valToEdit'] == "Phone Number") {
            $query = "UPDATE user SET PhoneNo='$newVal' WHERE National_ID =$id";
        } else if ($_POST['valToEdit'] == "Gender") {
            $query = "UPDATE user SET gender='$newVal' WHERE National_ID =$id";
        } else if ($_POST['valToEdit'] == "MedicalSpecialist") {
            $query = "UPDATE doctor SET MedicalSpecialist='$newVal' WHERE National_ID =$id";
        } else if ($_POST['valToEdit'] == "Address") {
            $query = "UPDATE doctor SET Address='$newVal' WHERE National_ID =$id";
        }
    }

    $result = mysqli_query($database, $query);

    if ($result) {
        echo json_encode("updateSuccess");
    }

    mysqli_close($database);
?>