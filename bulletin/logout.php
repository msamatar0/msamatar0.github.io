<?php
  session_start();
  session_unset();
  session_destroy();
  ob_start();
  header("location:bulletin.php");
  ob_end_flush();
  include 'bulletin.php';
  exit();
?>
