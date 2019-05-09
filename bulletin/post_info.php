<html lang="en">
  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/cyborg/bootstrap.min.css" rel="stylesheet" integrity="sha384-4DAPMwiyOJv/C/LvTiUsW5ueiD7EsaAhwUKO0Llp+fWzT40XrmAbayhVP00bAJVa" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Post</title>
    <?php
      session_start();
      $dbconnection = mysqli_connect("localhost","root","","bulletin");
      $query = "select ancestorPath from postings where postId = " . $_GET["id"] . "\n";
      $result = mysqli_query($dbconnection, $query);
      $_SESSION["path"] = mysqli_fetch_assoc($result)["ancestorPath"];
      $_SESSION["id"] = $_GET["id"];
    ?>
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
    <div style="text-align: center; padding: 20 20; margain: auto;">
      <div class="jumbotron" style="text-align: center; max-width: 50rem;">
        <div class="card-header">
          <?php
            $result = mysqli_query($dbconnection, "select postSubject,postedBy".
              " from postings where postId = ". $_GET["id"] ."\n");
            $row = mysqli_fetch_assoc($result);
            $subj = $row["postSubject"];
            $author = $row["postedBy"];

            $_SESSION["parentid"] = $_GET["id"];
            $_SESSION["parentsubj"] = $subj;

            echo "<h5 style=\"text-align: left;\">" . $subj . "</h5>";
            echo "<h6 style=\"text-align: left;\">By " . $author . "</h6>"
          ?>
        </div>
        <div class="card-body">
        <?php
          $result = mysqli_query($dbconnection, "select content from postings where postId = ". $_GET["id"] ."\n");
          echo "<p style=\"text-align: left;\">" . mysqli_fetch_assoc($result)["content"] . "</p><hr>";
        ?>
        </div>
      </div>
      <div style="text-align: left">
        <form action="bulletin_main.php">
          <input type="submit" class="btn btn-primary" value="Return"/>
        </form>
        <form action="reply.php">
          <input type="submit" class="btn btn-warning" value="Reply"/>
        </form>
      </div>
    </div>
    <?php $dbconnection->close();?>
  </body>
</html>
