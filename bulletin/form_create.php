<?php
  session_start();

  $dbconnection = mysqli_connect("localhost","root","","bulletin");
  $_SESSION["signconfirm"] = "";
  $query = "insert into bbusers values(\"".
    $_POST["email"] ."\",\"". $_POST["uname"] ."\",\"".
    $_POST["pword"] ."\",\"". $_POST["nname"] ."\")\n";

  $result = mysqli_query($dbconnection, $query);
  if(!$result){
    die("Database query failed.");
    header("Location: bulletin.php");
  }
  else{
    $_SESSION["nickname"] = $_POST["nname"];
    $_SESSION["texttype"] = "success";
    $_SESSION["postconfirm"] = "";
    $_SESSION["uname"] = $_POST["uname"];
    header("Location: bulletin_main.php");
  }

  $dbconnection->close();
?>
