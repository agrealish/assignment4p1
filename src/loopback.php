<?php //code received from lecture
error_reporting(E_ALL);
ini_set('display_errors','On');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CS290 Assignment 4 part 1</title>
  </head>
  <body>
  <?php
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
      $gArr = array(
        "TYPE" => "GET",
        "parameters" => null
      );
      if(!empty($_GET)) { //got the use of empty from stackoverflow: http://stackoverflow.com/questions/3408616/how-to-check-if-get-is-empty
        foreach($_GET as $key => $value) {
          if(empty($value)) {
            $_GET[$key] = 'undefined';
          }
        }
        $gArr["parameters"] = $_GET;
      }
      echo json_encode($gArr); //from link provided in assignment.
    }
    elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
      $pArr = array(
        "TYPE" => "POST",
        "parameters" => null
      );
      if(!empty($_POST)) { //got the use of empty from stackoverflow: http://stackoverflow.com/questions/3408616/how-to-check-if-get-is-empty
        foreach($_POST as $key => $value) {
          if(empty($value)) {
            $_POST[$key] = 'undefined';
          }
        }
        $pArr["parameters"] = $_POST;
      }
      echo json_encode($pArr); //from link provided in assignment.
    }
  ?>
  </body>
</html>