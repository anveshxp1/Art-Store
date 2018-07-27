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

    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/docs.min.js"></script>

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    </html>

<link href="theme.css" rel="stylesheet">



<?php

if(isset($_GET['id']))

{   $conn=mysqli_connect("localhost", "i4372602_anvesh", "chargeFree_1","i4372602_art");

    $conn->query("SET NAMES 'utf8'");

    $sql = "SELECT * FROM artists where ArtistID=".$_GET['id'];

    $result = $conn->query($sql);

    echo "<div class='container'><div class='row'>";

    $row = $result->fetch_assoc();

    if($row!=null)

    {

        echo "<div class='col-md-3'><h3>".$row["FirstName"]." ".$row["LastName"]."</h3>";

        echo "<img class='img-custom' width='260px' height='350px' src='images/art/artists/medium/".$_GET['id'].".jpg'></div>";

        echo "<div class='col-md-6'> <p style='margin-top: 50px;'>".$row['Details']."</p>";

        echo "<a class='btn btn-custom' href='#'><span class='glyphicon glyphicon-heart' aria-hidden='true'></span> Add to Favourites List</a>"; 

        echo "<div class='jumbotron-custom'><div class='container'><p><strong>Artist Details</strong></p></div></div>";

        echo "<div class='jumbotron-custom2'><div class='container'><div class='col-md-2'><p><strong>Date:</strong></p></div>";

        echo "<div class='col-md-3'>".$row['YearOfBirth']." - ".$row['YearOfDeath']."</div></div></div>";

        echo "<div class='jumbotron-custom2 '><div class='container'><div class='col-md-2'><p><strong>Nationality:</strong></p></div>";

        echo "<div class='col-md-3'>".$row['Nationality']."</div></div></div>"; 

        echo "<div class='jumbotron-custom2 '><div class='container'><div class='col-md-2'><strong>More info:</strong></div>";

        echo "<div class='col-md-3'><a href=".$row['ArtistLink'].">".$row['ArtistLink']."</a></div></div></div></div></div>";       

        echo "<h4>Art by ".$row["FirstName"]." ".$row["LastName"]."</h4>";

    

    $sql = "SELECT * FROM artworks where ArtistID=".$_GET['id'];

    $result = $conn->query($sql);           

    while($row = $result->fetch_assoc()) {

         echo "<div class='col-custom' style='border:1px solid #eee;margin-right:20px'><div class='row' align='center'><a  href='Part03_SingleWork.php?id=".$row["ArtWorkID"]."'><img class='thumbnail' src='images/art/works/square-medium/".$row['ImageFileName'].".jpg'></a></div>";

         echo "<div class='row' align='center'><a  href='Part03_SingleWork.php?id=".$row["ArtWorkID"]."'>".$row["Title"].",".$row["YearOfWork"]."</a> </div>";

         echo "<div class='row' align='center'><a class='btn btn-xs btn-primary style='margin:10px 4px 10px 4px;' href='Part03_SingleWork.php?id=".$row["ArtWorkID"]."'><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span> View</a>";

         echo "<button type='button' class='btn btn-xs btn-success' style='margin:10px 4px 10px 4px;'><span class='glyphicon glyphicon-gift' aria-hidden='true'></span> Wish</button>";

         echo "<button type='button' class='btn btn-xs btn-info' style='margin:10px 4px 10px 4px;''><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Cart</button></div></div>";

        }

    }

    else

    {

    echo "<div class='jumbotron'><div class='container'><h2>There is no corresponding artist for the query string passed.</h2></div></div>";

    }

}

else

{
echo "<script>window.location = 'Error.php';</script>'";

}



?>            

