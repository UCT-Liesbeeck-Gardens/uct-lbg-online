  <?php

  //Do not forget to close the connection: mysql_close($con);
  require_once '../config/dbconnect.php';
  $con = mysql_connect($hostname, $username, $password) or
    die("Could not connect to mysql \n");

  mysql_select_db("$dbname") or
    die("Could not select database \n");
?>
