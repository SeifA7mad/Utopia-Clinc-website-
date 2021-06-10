<?php
    //Make the connection with the sql database and store it in $database
    $database = mysqli_connect("localhost", "root", "", "utopiaclinic");
    if (!($database))
        die("<p>Could not connect to database </p>");



    if ($_GET["activeTab"] == "#Patients") {
        $query = "  SELECT patient.National_ID, Fname, Lname, DOB, PhoneNo, Gender 
                    FROM patient, user 
                    WHERE patient.National_ID = user.National_ID";
    }

    $result = mysqli_query($database, $query);
    $array = array();

    while($row = mysqli_fetch_assoc($result)) {
        array_push($array, $row);
    }

    echo json_encode($array);
?>