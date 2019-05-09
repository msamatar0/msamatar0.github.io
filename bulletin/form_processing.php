<?php session_start();
  $uname = $_POST["uname"];
  $_SESSION["uname"] = $uname;
  $pword = $_POST["pword"];

  $dbconnection = mysqli_connect("localhost","root","","bulletin");
  $userQuery = "select `name` from `bbusers` where `name` = \"" . $uname . "\"\n";
  $pwordQuery = "select `password` from `bbusers` where `password` = \"" . $pword . "\"\n";

  $userResult = mysqli_query($dbconnection, $userQuery);
  $pwordResult = mysqli_query($dbconnection, $pwordQuery);
  if(!$userResult || !$pwordResult){
     die("Database query failed.");
  }

  //values to check if user and pw match
  $ucheck = 0;
  $pwcheck = 0;
  while($row = mysqli_fetch_assoc($userResult)){
    $ucheck = 1;
  }
  while($row = mysqli_fetch_assoc($pwordResult)){
    $pwcheck = 1;
  }

  if($ucheck && $pwcheck){
    $query = "select nickname from bbusers where name = \"". $uname ."\"\n";
    $result = mysqli_query($dbconnection, $query);
    $_SESSION["nickname"] = mysqli_fetch_assoc($result)["nickname"];
    $_SESSION["texttype"] = "success";
    header("Location: bulletin_main.php");
  }
  else{
    header("Location: bulletin.php");
  }

  $dbconnection->close();
?>
