<?php 
$mysqli = new mysqli("localhost","root","","web_mysqli");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Connect to MYSQLi failed " . $mysqli -> connect_error;
  exit();
}
?>