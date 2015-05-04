<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CS290 Assignment 4.1:Multtable</title>
  </head>
  <body>
    <?php
      $eCheck=false; //if errors are found, change to true
      if(!$eCheck) { //if no errors so far, check existence of parameters
        checkExist($eCheck);
      }
      if(!$eCheck) { //if params exist, check if they are integers
        checkInt($eCheck);
      }
      if(!$eCheck) { //if params exist and are integers, check min<=max
        checkMinMax($eCheck);
      }
      if(!$eCheck) { //if no errors reported, create the table
        createTable();
      }
      
      function checkExist(&$eCheck) {
        if($_GET['min-multiplicand'] === "") { //if min-multiplicand doesn't exist, print error message
          $eCheck=true; //an error occurred, so set eCheck to true
          echo "<p>Missing parameter min-multiplicand.";
        }
        if($_GET['max-multiplicand'] === "") { //if max-multiplicand doesn't exist, print error message
          $eCheck=true; //an error occurred, so set eCheck to true
          echo "<p>Missing parameter max-multiplicand.";
        }
        if($_GET['min-multiplier'] === "") { //if min-multiplier doesn't exist, print error message
          $eCheck=true; //an error occurred, so set eCheck to true
          echo "<p>Missing parameter min-multiplier.";
        }
        if($_GET['max-multiplier'] === "") { //if max-multiplier doesn't exist, print error message
          $eCheck=true; //an error occurred, so set eCheck to true
          echo "<p>Missing parameter max-multiplier.";
        }
      }
      
      function checkInt(&$eCheck) { //is_numeric function came from PHP manual: http://php.net/manual/en/function.is-numeric.php
        if(!(is_numeric($_GET['min-multiplicand']))) { //if min-multiplicand isn't integer, print error message
          $eCheck=true; //an error occurred, so set eCheck to true
          echo "<p>min-multiplicand must be an integer.";
        }
        if(!(is_numeric($_GET['max-multiplicand']))) { //if max-multiplicand isn't integer, print error message
          $eCheck=true; //an error occurred, so set eCheck to true
          echo "<p>max-multiplicand must be an integer.";
        }
        if(!(is_numeric($_GET['min-multiplier']))) { //if min-multiplier isn't integer, print error message
          $eCheck=true; //an error occurred, so set eCheck to true
          echo "<p>min-multiplier must be an integer.";
        }
        if(!(is_numeric($_GET['max-multiplier']))) { //if max-multiplier isn't integer, print error message
          $eCheck=true; //an error occurred, so set eCheck to true
          echo "<p>max-multiplier must be an integer.";
        }
      }
      
      function checkMinMax(&$eCheck) {
        if($_GET['min-multiplicand']>$_GET['max-multiplicand']) {
          //if min-multiplicand > max-multiplicand print error message
          $eCheck=true; //an error occurred, so set eCheck to true
          echo "<p>Minimum multiplicand larger than maximum.";
        }
        if($_GET['min-multiplier']>$_GET['max-multiplier']) {
          //if min-multiplier > max-multiplier print error message
          $eCheck=true; //an error occurred, so set eCheck to true
          echo "<p>Minimum multiplier larger than maximum.";
        }
      }
      
      function createTable() { //some of the formatting for the table comes from Variables and Arrays in PHP lecture
      //other parts of the formatting of the table comes from assignment2
        $i = (int)$_GET['min-multiplier'];
        $iend = (int)$_GET['max-multiplier'];
        $j = (int)$_GET['min-multiplicand'];
        $jend = (int)$_GET['max-multiplicand'];
        echo "<p><h3>Multiplication Table</h3>
        <p>
        <table border=1>
        <tbody>
        <tr>
        <td width = 25>";
        for ($i; $i <= $iend; $i++) {
          echo "
          <td width = 25>" . $i;
        } //for loop prints integers from min-multiplier to max-multiplier on top row of table
        for ($j; $j <= $jend; $j++) {
          echo "<tr> 
          <td>" . $j;
          for ($k = (int)$_GET['min-multiplier']; $k <= $iend; $k++) {
            echo "
            <td>" . $j * $k;
          }
        }
        echo "</tbody></table>";
      }
?>
  </body>
</html>