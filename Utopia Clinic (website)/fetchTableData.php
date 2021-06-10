<?php
    //Make the connection with the sql database and store it in $database
    $database = mysqli_connect("localhost", "root", "", "utopiaclinic");
    if (!($database))
        die("<p>Could not connect to database </p>");
        
    $result = mysqli_query($database, $_GET['query']);
    $array = array();

    while($row = mysqli_fetch_assoc($result)) {
        array_push($array, $row);
    }

    echo json_encode($array);
?>