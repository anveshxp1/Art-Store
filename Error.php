<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="icon" href="../../favicon.ico">



    <title>Art Store</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="theme.css" rel="stylesheet">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">

      <a class="navbar-brand" href="#">Art Store</a>

      <div class="container">

        <div class="navbar-header">

        </div>

        <div id="navbar" class="navbar-collapse collapse">

          <ul class="nav navbar-nav">

            <li class="active"><a href="index.php">Home</a></li>

            <li class="dropdown">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages<span class="caret"></span></a>

                <ul class="dropdown-menu">

                <li><a href="Part01_ArtistsDataList.php">Artist Data List (Part 1)</a></li>

                <li><a href="Part02_SingleArtist.php">Single Artist (Part 2)</a></li>

                <li><a href="Part03_SingleWork.php">Single Work (Part 3)</a></li>

                <li><a href="Part04_Search.php">Search (Part 4)</a></li>

              </ul>

            </li>

          </ul>

          <form class="navbar-form navbar-right" action="Part04_Search.php" method="get">

            <div class="form-group">

              <input type="text" placeholder="Search Paintings" class="form-control" name='title'>

            </div>

            <button type="submit" class="btn btn-success">Search</button>          

            <p class="nav navbar-form navbar-left" style="color:white;"><sub>Anvesh Reddy Auvula</sub></p>

          </form> 

        </div>                  

      </div>

    </nav>

    <div class='jumbotron'><div class='container'><h2>Navigate to the page by passing an id</h2></div></div>;

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/docs.min.js"></script>

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</body>

</html>

