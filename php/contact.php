<?php
    // stops users from coming to this page by directly entering the url
    if (empty($_POST["fname"]) and empty($_POST["lname"]) and empty($_POST["email"]) and empty($_POST["message"])) {
        header("Location: ../contact.html");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>James' Tent Emporium</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="icon" href="../images/tentlogo.png">
</head>
<body>

    <!-- Markup for navigation bar -->
    <ul>
        <li><img src="../images/tentlogo.png" alt="Logo" id="logo-nav"></li>
        <li><a href="../index.html">Home</a></li>
        <li class="dropdown">
            <a href="../store.html" class="dropbtn">Store</a>
            <div class="dropdown-content">
                <a href="../store.html#carcamp">Car Camping</a>
                <a href="../store.html#backpacking">Backpacking</a>
                <a href="../store.html#luxury">Luxury</a>
                <a href="../store.html#family">Family</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="../about.html" class="dropbtn">About</a>
            <div class="dropdown-content">
                <a href="../about.html#whoweare">Who We Are</a>
                <a href="../about.html#whatwedo">What We Do</a>
            </div>
        </li>
        <li><a href="../contact.html">Contact Us</a></li>
        <li class="dropdown">
            <a href="customerAccount.php" class="dropbtn">Account</a>
            <div class="dropdown-content">
                <a href="login.php">Login</a>
                <a href="../signup.html">Sign-Up</a>
            </div>
        </li>
        <li><a href="../admin.html">Admin</a></li>
    </ul>

    <div id="contact">
        <?php

        // gather variables from post
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];


        if (!empty($_POST["fname"]) and !empty($_POST["lname"]) and !empty($_POST["email"]) and !empty($_POST["message"])) {
            // connect to database
            include("../includes/db_connect.php");
        
            // insert data into contact table
            $sql = "
            INSERT INTO contact(fname, lname, email, phone, message)
            VALUES('$fname', '$lname', '$email', '$phone', '$message')";
        
            // check if data was inserted correctly
            if(mysqli_query($db, $sql)) {
                echo "<h3>Your form information was successfully submitted to the database.</h3>";
            }
            else {
                echo "<h3>Error: " . mysqli_error($db) . "</h3>";
            }
        
            // close connection
            mysqli_close($db);
        }
        
        ?>

        <p>You can either use the navigation bar to contiue browsing James' Tent Emporium or click the ok button below to return to the Contact Us page.</p>
        <a href="../contact.html">Ok</a>
    </div>
    

</body>
</html>