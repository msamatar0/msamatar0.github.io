<html lang="en">
  <head>
    <meta charset="utf-8">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/cyborg/bootstrap.min.css" rel="stylesheet" integrity="sha384-4DAPMwiyOJv/C/LvTiUsW5ueiD7EsaAhwUKO0Llp+fWzT40XrmAbayhVP00bAJVa" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Bulletin Board</title>
    <style>
      div{
        display: block;
      }
    </style>
    <?php session_start();?>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <strong class="nav-link">
              <?php echo "Welcome, " . $_SESSION["nickname"] . "!";?>
              <span class="sr-only">(current)</span>
            </strong>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="logout.php">
              Logout<span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    </br>
    <div style="text-align: left; display: inline-block; width: 60%; padding: 0 20;">
      <h4>Bulletin Posts</h4>
      <?php
        $dbconnection = mysqli_connect("localhost","root","","bulletin");
        $result = mysqli_query($dbconnection, "select * from postings order by postDate DESC\n");

        $i = 1;
        echo "<ul class=\"list-group\"></br>";
        while($row = mysqli_fetch_assoc($result)){
          echo "<li class=\"list-group-item d-flex justify-content-between align-items-center\">"
            . "<a href=\"post_info.php?id=". $row["postId"] ."\">"
            . $row["postSubject"] . "</a> " . $row["postDate"] . "</li></br>";
        }
        echo "</ul></br>";
      ?>
      <p class="text-<?php echo $_SESSION["texttype"];?>">
        <?php
          echo $_SESSION["postconfirm"];
          $_SESSION["postconfirm"] = "";
          $_SESSION["texttype"] = "success";
        ?>
      </p>
    </div>
    <div style="height: 400px; width: 400px; padding: 0 20;">
      <h4>Post a message:</h4>
      <form action="message_enter.php" method="post">
          Subject: <br/><input type="text" class="form-control" name="subject" value=""/><br/>
          Message: <br/><textarea class="form-control" name="msgbox" rows="7"></textarea><br/>
          <input type="submit" class="btn btn-primary" name="submit" value="Enter"/>
      </form>
    </div>
  </body>
</html>
