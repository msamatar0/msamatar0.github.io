<?php
  session_start();
  $reply = $_POST["replybox"];
  $max = 0;
  $path = "";
  $dbconnection = mysqli_connect("localhost","root","","bulletin");
  $_SESSION["postconfirm"] = "";

  $query = "select max(postId) as maxId from postings";
  $result = mysqli_query($dbconnection, $query);
  while ($row = mysqli_fetch_assoc($result)){
    $max = $row["maxId"];
  }
  $max = $max + 1;

  $query = "select ancestorPath from postings where postId = " .
    $_SESSION["parentid"] . "\n";

  $result = mysqli_query($dbconnection, $query);
  if(!$result){
    die("Database query failed.");
  }
  $path = mysqli_fetch_assoc($result)["ancestorPath"] . ":" . $max;

  $query = "insert into postings values(".
    $max . ",now(),\"" . $_SESSION["uname"] .
    "\",\"Re: " . $_SESSION["parentsubj"] . "\",\"" .
    $reply . "\",\"" . $path . "\")\n";
  $result = mysqli_query($dbconnection, $query);
  if(!$result){
    $_SESSION["texttype"] = "danger";
    $_SESSION["postconfirm"] = "Error: reply exceeds char limit";
    header("Location: bulletin_main.php");
  }
  else{
    $_SESSION["texttype"] = "success";
    $_SESSION["postconfirm"] = "Reply Posted!";
    header("Location: bulletin_main.php");
  }

  $dbconnection->close();
?>
