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
    
        // connect to the database
        include("../includes/db_connect.php");
        // store session id in variable
        $id = $_SESSION['userID'];
    
        // if post is submitted
        if(isset($_POST['update'])) {

            // store post data into variables
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $username = $_POST['username'];

            // update the account information
            $modifySQL = "UPDATE customerAccounts SET firstName='$fname', lastName='$lname', email='$email', phone='$phone', username='$username' WHERE customerID='$id' LIMIT 1";
            $modifyResult = mysqli_query($db, $modifySQL);

            // if the update was successful change session value and show confirmation
            if($modifyResult) {
                $_SESSION['fname'] = $fname;
                echo "<div id='contact'>
                <h1>You successfully updated your account</h1>
                <p>Click Ok to go to the customer account page</p>
                <a href='customerAccount.php'>Ok</a>
                </div>";
            }

        // if the post is not submitted
        } else {

            // get stored values from database
            $fillSQL = "SELECT firstName, lastName, email, phone, username FROM customerAccounts WHERE customerID='$id'";
            $fillResult = mysqli_query($db, $fillSQL);

            // if values are successfully found then do the following
            if($fillResult) {

                // fetch the values as an array
                $fillValues = mysqli_fetch_array($fillResult, MYSQLI_NUM);

                // echo the form with the filled in values
                echo "<div id='contact'>
                <h1>Update Account Info</h1>
                <form action='updateAccount.php' method='post'>
                First Name:<br><input type='text' name='fname' value='$fillValues[0]'><br>
                Last Name:<br><input type='text' name='lname' value='$fillValues[1]'><br>
                E-mail:<br><input type='email' name='email' value='$fillValues[2]'><br>
                Phone Number:<br><input type='tel' name='phone' id='phone' value='$fillValues[3]'><br>
                Username:<br><input type='text' name='username' value='$fillValues[4]'><br>
                <input type='submit' name='update' value='Update'>
                </form>
                </div>";

            }

        }
    
    ?>

</body>
</html>