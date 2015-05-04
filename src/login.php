<?php //code received from lecture
error_reporting(E_ALL);
ini_set('display_errors','On');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CS290 Assignment 4.1: Login</title>
  </head>
  <body>
    <?php //used information on GET action from lecture
      if(isset($_GET['action']) && $_GET['action']=='end') {
        echo 'You are now logged out.<br>Use below to login again<br><br>';
      }
    ?>
    <form action="content1.php" method="POST">
      Please type your username to login: 
      <input type="text" name="username">
      <input type="submit" value="Login">
    </form>
  </body>
</html>