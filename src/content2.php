<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CS290 Assignment 4.1: content2</title>
  </head>
  <body>
  <?php
    session_start();
    
    if(session_status() == PHP_SESSION_ACTIVE) { //the session_status was from the lecture.
      if(isset($_GET['logged']) && $_GET['logged'] == 'yes') {
        //if user logged in correctly display link back to content1
        echo 'Click <a href = "content1.php">here</a> to return to Content1.';
      }
      else {
        //user not logged in correctly
        echo 'You must be logged in to visit this page.<br>
        Please click <a href = "login.php">here</a> to login.';
      }
    }
  ?>
  </body>
</html>