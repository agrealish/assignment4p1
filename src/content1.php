<?php
header('Content-Type: text/html');
session_start();
  
  if(isset($_GET['action']) && $_GET['action'] == 'end') { // this came primarily from the lecture
    $_SESSION = array();
    session_destroy();
    header("Location: login.php?action=end", true);
    die();
  }
  
  if(session_status()==PHP_SESSION_ACTIVE) { //the session_status was from the lecture
    if(!isset($_REQUEST['username']) && !isset($_SESSION['username'])) { //checks to see if a username is provided
      echo '<p>You have not logged in. You need to login to be here. <br>';
      echo 'Please click <a href="login.php">here</a> to login.';
    }
    else if(isset($_REQUEST['username']) && isset($_SESSION['username']) && ($_REQUEST['username'] != $_SESSION['username'])) {
      //if user is not the user currently logged on
      echo '<p>Another user is currently logged in.<br>';
      echo 'Please click <a href="content1.php?action=end">here</a> to log them out.';
    }
    else if(!isset($_SESSION['username'])) { //if username provided but not set in session, set in session
      $_SESSION['username'] = $_REQUEST['username'];

      if(!isset($_SESSION['visits'])) { //if visits tracking not set, set it 
        $_SESSION['visits'] = 0;
      }
      
      $_SESSION['visits']++; //from the lecture
      echo '<p>Hello ' . $_SESSION['username'] . '! You have visited this page ' . $_SESSION['visits'] . ' time.';
      echo '<p>Please click <a href="content2.php?logged=yes">here</a> to go to content2.php.';
      echo '<p>Please click <a href="content1.php?action=end">here</a> to logout.';
    }
    else if(isset($_SESSION['username']) && (($_REQUEST['username'] == $_SESSION['username']) || !isset($_REQUEST['username']))) {
      //if user is the current logged in user then print visits, and provide option to go to content2 or logout
      if(!isset($_SESSION['visits'])) { //if visits not set for some reason... set it.
        $_SESSION['visits'] = 0;
      }
      
      $_SESSION['visits']++; //from the lecture
      echo '<p>Hello ' . $_SESSION['username'] . '! You have visited this page ' . $_SESSION['visits'] . ' times.';
      echo '<p>Please click <a href="content2.php?logged=yes">here</a> to go to content2.php.';
      echo '<p>Please click <a href="content1.php?action=end">here</a> to logout.';
    }
  }
?>