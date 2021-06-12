<?php
    $database = mysqli_connect("localhost", "root", "", "utopiaclinic");

    if (!($database))
        die("<p>Could not connect to database </p>");

    if ($_POST['tableName'] == "Offers") {
        $id = (int)$_POST['id'];
        $newVal = $_POST['newVal'];
        if ($_POST['valToEdit'] == "Offer Name") {
            $query = "UPDATE offer SET OfferName='$newVal' WHERE OfferID=$id";
        }
    } else if ($_POST['tableName'] == "Doctors" || $_POST['tableName'] == "Patients") {
        $id = (int)$_POST['id'];
    }

    $result = mysqli_query($database, $query);

    if ($result) {
        echo json_encode("updateSuccess");
    }

    mysqli_close($database);
?>