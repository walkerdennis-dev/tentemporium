<?php
    // connect to database
    $db = mysqli_connect("localhost", "root", "", "TentEmporium")
    OR
    die(mysqli_connect_error());

    // test database connection
    if(!$db) {
        die("Error: " . mysqli_error($db));
    }
?>