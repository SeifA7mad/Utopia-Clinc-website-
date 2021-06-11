<?php
    //Make the connection with the sql database and store it in $database
    $database = mysqli_connect("localhost", "root", "", "utopiaclinic");
    if (!($database))
        die("<p>Could not connect to database </p>");

    //function that return a query $result    
    function getData($query) {
        global $database;
        $result = mysqli_query($database, $query);

        return $result;
    }

    mysqli_close($database);
?>