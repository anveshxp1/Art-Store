<!DOCTYPE html>

<html lang="en">

  <head>

  <link rel="stylesheet" type="text/css" href="theme.css">

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

    <?php if(isset($_GET['id'])){       $conn=mysqli_connect("localhost", "i4372602_anvesh", "chargeFree_1","i4372602_art");

    $conn->query("SET NAMES 'utf8'");

		$sql="SELECT * FROM artists,artworks WHERE artists.ArtistID = artworks.ArtistID and artworks.ArtWorkID=".$_GET['id'];    

		$result = $conn->query($sql);

		echo "<div class='container'><div class='row'>";

        $row = $result->fetch_assoc();

        if($row!=null){

        	echo "<div class='col-md-3'><h3>".$row["Title"]."</h3>";

        	echo "by <a href='Part02_SingleArtist.php?id=".$row["ArtistID"]."'>".$row["FirstName"]." ".$row["LastName"]."</a>";

        	echo "<img class='img-custom' width='260px' height='350px' data-toggle='modal' data-target='#myModal' src='images/art/works/square-medium/".$row["ImageFileName"].".jpg'></div>";

        	echo "<div class='col-md-6'> <p style='margin-top: 75px;'>".$row["Description"]."</p>";

          $row['MSRP']=number_format ( $row['MSRP'] , 2,  "." ,'');

           	echo "<p style='color:red'><strong>$".$row['MSRP']."</strong></p>";

            echo "<a class='btn btn-custom' href='#'><span class='glyphicon glyphicon-gift' aria-hidden='true'></span> Add to Wish List</a>"; 

        	echo "<a class='btn btn-custom' href='#'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Add to Shopping Cart</a>"; 

        	echo "<div class='jumbotron-custom'><div class='container'><p><strong>Artist Details</strong></p></div></div>";

        	echo "<div class='jumbotron-custom2'><div class='container'><div class='col-md-2'><p><strong>Date:</strong></p></div>";

        	echo "<div class='col-md-3'>".$row['YearOfWork']."</div></div></div>";

			echo "<div class='jumbotron-custom2 '><div class='container'><div class='col-md-2'><p><strong>Medium:</strong></p></div>";

        	echo "<div class='col-md-3'>".$row['Medium']."</div></div></div>";

			echo "<div class='jumbotron-custom2 '><div class='container'><div class='col-md-2'><p><strong>Dimensions:</strong></p></div>";

        	echo "<div class='col-md-3'>".$row['Width']."cm x ".$row['Height']."cm</div></div></div>";

			echo "<div class='jumbotron-custom2 '><div class='container'><div class='col-md-2'><p><strong>Home:</strong></p></div>";

        	echo "<div class='col-md-3'>".$row['OriginalHome']."</div></div></div>";

        	echo "<div class='jumbotron-custom2 '><div class='container'><div class='col-md-2'><p><strong>Genres:</strong></p></div>";

        	echo "<div class='col-md-3'>";

        	$sql2="SELECT GenreID FROM artworkgenres WHERE ArtWorkID=".$_GET['id'];    

			$result2 = $conn->query($sql2);

			while($row2 = $result2->fetch_assoc()) {

			$sql3="SELECT * FROM genres WHERE GenreID=".$row2['GenreID'];    

			$result3 = $conn->query($sql3);

			$row3 = $result3->fetch_assoc();

			echo "<p><a href=''>".$row3['GenreName']."</a></p>";

			}

			echo "</div></div></div>";



			echo "<div class='jumbotron-custom2 '><div class='container'><div class='col-md-2'><p><strong>Subjects:</strong></p></div>";

			echo "<div class='col-md-3'>";

        	$sql2="SELECT SubjectID FROM artworksubjects WHERE ArtWorkID=".$_GET['id'];    

			$result2 = $conn->query($sql2);

			while($row2 = $result2->fetch_assoc()) {

			$sql3="SELECT * FROM subjects WHERE SubjectId=".$row2['SubjectID'];    

			$result3 = $conn->query($sql3);

			$row3 = $result3->fetch_assoc();

			echo "<p><a href=''>".$row3['SubjectName']."</a></p>";

			}

			echo "</div></div></div></div>";		

        



			echo "<div class='col-md-3' style='margin-top:100px'>";

			echo "<div class='jumbotron-custom3'><div class='container'><p><strong>Sales</strong></div></p>";

			echo "<div class='jumbotron-custom4'><div class='container'>";

        	$sql3="SELECT OrderID FROM orderdetails WHERE ArtWorkID=".$_GET['id'];    

			$result3 = $conn->query($sql3);

			while($row3 = $result3->fetch_assoc()) {

			$sql4="SELECT * FROM orders WHERE OrderID=".$row3['OrderID'];    

			$result4 = $conn->query($sql4);

			$row4 = $result4->fetch_assoc();

      $time = strtotime($row4["DateCreated"]);

          $dat = date('n/j/y', $time);

			echo "<p><a href=''>".$dat."</a></p>";

        }

    		echo "</div></div></div></div></div>";



  		echo "<div class='modal fade' id='myModal' role='dialog'>

    <div class='modal-dialog'>

    

      <div class='modal-content'>

        <div class='modal-header'>

          <button type='button' class='close' data-dismiss='modal'>&times;</button>

          <h4 class='modal-title'>".$row["Title"]." (".$row["YearOfWork"].") by ".$row["FirstName"]." ".$row["LastName"]."</h4>

        </div>

        <div class='modal-body'>

          <img align='center' width='500px' height='500px' src='images/art/works/square-medium/".$row["ImageFileName"].".jpg'>

        </div>

        <div class='modal-footer'>

          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>

        </div>

      </div>

      

    </div>

  </div>";

    		

    	}

      else

      {

      echo "<div class='jumbotron'><div class='container'><h2>There is no corresponding art work for the query string passed.</h2></div></div>";

      }

    }

    else

{

echo "<script>window.location = 'Error.php';</script>'";

}

?></html>