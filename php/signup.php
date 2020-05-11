<?php
    // stops users from coming to this page by directly entering the url
    if (empty($_POST["fname"]) and empty($_POST["lname"]) and empty($_POST["email"]) and empty($_POST["phone"]) and empty($_POST["username"]) and empty($_POST["password"])) {
        header("Location: ../signup.html");
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
        $firstName = $_POST["fname"];
        $lastName = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $username = $_POST["username"];
        $hashed_password = password_hash($_POST["password"], PASSWORD_BCRYPT);


        if (!empty($_POST["fname"]) and !empty($_POST["lname"]) and !empty($_POST["email"]) and !empty($_POST["phone"]) and !empty($_POST["username"]) and !empty($_POST["password"])) {
            // connect to database
            include("../includes/db_connect.php");
        
            // insert data into customerAccounts table
            $sql = "
            INSERT INTO customerAccounts(firstName, lastName, email, phone, username, hashed_password)
            VALUES('$firstName', '$lastName', '$email', '$phone', '$username', '$hashed_password')";
        
            // check if data was inserted correctly
            if(mysqli_query($db, $sql)) {
                echo "<h3>Your customer account was successfully created.</h3>";
            }
            else {
                echo "<h3>Error: " . mysqli_error($db) . "</h3>";
            }
        
            // close connection
            mysqli_close($db);
        }
        
        ?>

        <p>You can either use the navigation bar to contiue browsing James' Tent Emporium or click the ok button below to go to the Login page.</p>
        <a href="login.php">Ok</a>
    </div>
    

</body>
</html>