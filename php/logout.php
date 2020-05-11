<?php
    // start session, unset $_SESSION variables, and redirect to login page
    session_start();
    unset($_SESSION['userID']);
    unset($_SESSION['fname']);
    header("Location: login.php");
?>