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

    <!-- markup for login form -->
    <div id="contact">
        <h1>Login</h1>
        <?php

            // if post is not empty the code will run
            if(!empty($_POST)) {
            
                // include file to connect to database
                include("../includes/db_connect.php");
            
                // gather data from post
                $attemptedUsername = $_POST["username"];
                $attemptedPassword = $_POST["password"];
            
                // get hashed_password and query to check success
                $sql = "SELECT hashed_password FROM customerAccounts WHERE username='$attemptedUsername'";
                $result = mysqli_query($db, $sql);
            
                // if the query succeeded the code will run
                if($result) {
                
                    // store password that was fetched from the database
                    $storedPassword = mysqli_fetch_array($result, MYSQLI_NUM);
                
                    // check to see if the password is correct
                    if(password_verify($attemptedPassword, $storedPassword[0])) {

                        // get the customerID and firstName from the database and query the results
                        $getID = "SELECT customerID FROM customerAccounts WHERE username='$attemptedUsername'";
                        $getName = "SELECT firstName FROM customerAccounts WHERE username='$attemptedUsername'";
                        $IDresult = mysqli_query($db, $getID);
                        $nameResult = mysqli_query($db, $getName);
                    
                        // if both the queries succeeded run the code
                        if($IDresult and $nameResult) {
                            // start the session
                            session_start();
                        
                            // store the ID and first name that was fetched from the database
                            $storedID = mysqli_fetch_array($IDresult, MYSQLI_NUM); 
                            $storedName = mysqli_fetch_array($nameResult, MYSQLI_NUM); 

                            // set the ID and first name in the session
                            $_SESSION['userID'] = $storedID[0];
                            $_SESSION['fname'] = $storedName[0];
                        
                            // redirect the user to the customer account page
                            header("Location: customerAccount.php");
                        }
                    } else {
                        // display if password failed
                        echo "Login Failed<br>";
                    }
                
                } else {
                    // display if username was incorrect
                    echo "Login Failed<br>";
                }
            
                // close the connection to the database
                mysqli_close($db);

            }

        ?>
        <form action="login.php" method="POST">
            Username:<br><input type="text" name="username" required><br>
            Password:<br><input type="password" name="password" required><br>
            <input type="submit">
        </form>
    </div>
    

</body>
</html>