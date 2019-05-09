<html lang="en">
  <head>
    <meta charset="utf-8">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/cyborg/bootstrap.min.css" rel="stylesheet" integrity="sha384-4DAPMwiyOJv/C/LvTiUsW5ueiD7EsaAhwUKO0Llp+fWzT40XrmAbayhVP00bAJVa" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Login</title>
    <?php
      session_start();
      $_SESSION["postconfirm"] = "";
    ?>
  </head>
  <body>
    <?php
      $dbconnection = mysqli_connect("localhost","root","","bulletin");

      if (mysqli_connect_errno()){
        die("Database connection failed: " . mysqli_connect_error());
      }

      $query = "select email, name, password, nickname from bbusers\n";
      $result = mysqli_query($dbconnection, $query);
      if(!$result){
         die("Database query failed.");
      }
    ?>
    <div class="jumbotron" style="text-align: center; height: 410; width: 1000; margin: auto;">
      <h2>Bulletin Board</h2></br>
      <form action="form_processing.php" method="post">
        <input class="form-control" style="width: 200; display: inline-block; margain: 0 auto;"
          type="text" name="uname" placeholder="Username" value=""/><br/><br/>
        <input class="form-control" style="width: 200; display: inline-block; margain: 0 auto;"
          type="password" name="pword" placeholder="Password" value=""/><br/><br/>
        <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
      </form>
      <form action="register.php">
        <input type="submit" class="btn btn-success" value="Register"/>
      </form>
    </div>
    <?php
      /*
      while ($row = mysqli_fetch_assoc($result)){
        echo $row["email"]." ".$row["name"]." ".$row["password"]." ".$row["nickname"]."<br>";
      }
      */
      $dbconnection->close();
    ?>
  </body>
</html>
