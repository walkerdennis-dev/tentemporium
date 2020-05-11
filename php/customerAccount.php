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

    <!-- markup for customer acoount section -->
    <div id="contact">
        <h1>Customer Account Page</h1>
        <!-- show name based on value stored in session -->
        <h2>Welcome, <?php echo $_SESSION['fname']; ?></h2>
        <a href="purchaseHistory.php">Purchase History</a><br>
        <a href="alterPassword.php">Change/Reset Password</a><br>
        <a href="updateAccount.php">Update Account Info</a><br>
        <a href="deleteAccount.php">Delete Account</a><br>
        <a href="logout.php">Logout</a>
    </div>

</body>
</html>