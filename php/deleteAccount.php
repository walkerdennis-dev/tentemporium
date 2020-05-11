<?php
    // start session and ensure user is logged in
    session_start();
    if(!isset($_SESSION['userID'])) {
        header("Location: login.php");
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

    <?php

        // if the confirm form was submitted delete account otherwise display the confirm form
        if(isset($_POST['submit'])) {
            // connect to database
            include("../includes/db_connect.php");

            // store the id of the session as a variable
            $IDtoDelete = $_SESSION['userID'];

            // delete record sql            
            $deleteSQL = "DELETE FROM customerAccounts WHERE customerID='$IDtoDelete' LIMIT 1";
            $deleteResult = mysqli_query($db, $deleteSQL);

            // if the query succeeded unset session variables and show confirmation message
            if($deleteResult) {
                unset($_SESSION['userID']);
                unset($_SESSION['fname']);
                echo "<div id='contact'>
                <h1>You successfully deleted your account</h1>
                <p>Click Ok to go to the home page</p>
                <a href='../index.html'>Ok</a>
                </div>";
            }
        } else {
            echo "<div id='contact'>
            <h2>Please confirm that you want to delete your account</h2>
            <form action='deleteAccount.php' method='post'>
            <input type='submit' name='submit' value='Confirm'>
            </form>
            </div>";
        }

    ?>

</body>
</html>