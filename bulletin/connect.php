<?php
  $dbconnection = mysqli_connect("localhost","root","","bulletin");

  if (mysqli_connect_errno()){
    die("Database connection failed: " . mysqli_connect_error());
  }

  $query = "show tables\n";
  $result = mysqli_query($dbconnection, $query);
  if(!$result){
     die("Database query failed.");
  }
  echo $result;
  echo "hi\nno\n";

  $dbconnection->close();
?>
