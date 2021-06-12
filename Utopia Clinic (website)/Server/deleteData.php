<?php
    $database = mysqli_connect("localhost", "root", "", "utopiaclinic");

    if (!($database))
        die("<p>Could not connect to database </p>");

    if ($_POST['tableName'] == "Offers") {
        $id = (int)$_POST['id'];
        $query = "DELETE FROM offer WHERE OfferID = $id";
    } else if ($_POST['tableName'] == "Doctors" || $_POST['tableName'] == "Patients") {
        $id = (int)$_POST['id'];
        $query = "DELETE FROM user WHERE National_ID = $id";
    }

    $result = mysqli_query($database, $query);
    $tableN = $_POST['tableName'];

    if ($result) {
        echo json_encode("#$tableN");
    }

    mysqli_close($database);
?>