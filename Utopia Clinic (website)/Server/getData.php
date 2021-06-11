<?php
    $database = mysqli_connect("localhost", "root", "", "utopiaclinic");
    if (!($database))
        die("<p>Could not connect to database </p>");

    if ($_GET['tableName'] === "clinic") {
        $query = "SELECT * FROM clinic_lab";
    }

    $result = mysqli_query($database, $query);
    $array = array();

    while($row = mysqli_fetch_assoc($result)) {
        array_push($array, $row);
    }

    echo json_encode($array);
    mysqli_close($database);
?>