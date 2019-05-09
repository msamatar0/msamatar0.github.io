<html>
  <head>
    <?php session_start();?>
    <html lang="en">
    <meta charset="utf-8">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/cyborg/bootstrap.min.css" rel="stylesheet" integrity="sha384-4DAPMwiyOJv/C/LvTiUsW5ueiD7EsaAhwUKO0Llp+fWzT40XrmAbayhVP00bAJVa" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Bulletin Board</title>
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
    <div style="margain: 0 auto; padding: 30px; width: 50rem;">
      <form action="reply_enter.php" method="post">
          Reply: <br/><textarea class="form-control" name="replybox" rows="7"></textarea><br/>
          <input type="submit" class="btn btn-primary" name="submit" value="Enter"/>
      </form>
    </div>
  </body>
</html>
