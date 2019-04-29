<?php
session_start();
include("config/host.php");
include("config/dbname.php");
include("config/functions.php");
$_SESSION['welcome']="NAY";
if (!isset($hostname) || !isset($username) || !isset($password) || !isset($database)) {
  header("location: config/analyzer.php");
} else {
  $con = mysqli_connect($hostname,$username,$password,$database);
  if (!$con) {
    header("location: config/analyzer.php");
  }
  if (table_exist($con,'accs') && table_exist($con,'snaps') && table_exist($con,'trash')) {
    $_SESSION['welcome'] = "YAY";
  } else {
    $_SESSION['welcome'] = "NAY";
  }
}
  if ($_SESSION['welcome'] !== "YAY") {
    header("location: config/analyzer.php");
  }
?>
