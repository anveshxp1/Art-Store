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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/docs.min.js"></script>

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    </body>

    </html>

<?php

if(isset($_POST['submit']))

{

	if($_POST['options']=="title")

	{

		echo "<p>fafa</p>";

	}

}

?>

<script type="text/javascript">

function changeIt(x)

{

$('#tit').empty();

$('#des').empty();

if(x!=not)

{

x.innerHTML = x.innerHTML+"<input type='text' size='170px' name='valueToFilter'>";

}

}



</script>

<form>



<div class="container">

<h2>Search Results</h2><hr>

<div class="jumbotron">

<div class='row'>

<input type="radio"  name="options" value="title" onClick="changeIt(tit)">

<label>Filter By Title:</label></div>

<div id="tit"></div>

<div class="row">

<input type="radio" name="options" value="descrition" onClick="changeIt(des)">

<label>Filter By Description:</label></div>

<div id="des"></div>

<div class="row">

<input type="radio" name="options" value="nothing" onClick="changeIt(not)">

<label>No Filter (Show all art works):</label></div>

<div id="not"></div>

<div class="row">

<input type="submit" name="submit" value="Filter" class="btn btn-primary" id="filter" action="#page" method="get">

</div></div></div>	





</form>  

<div id='page'>

<?php 

$conn=mysqli_connect("localhost", "i4372602_anvesh", "chargeFree_1","i4372602_art");

$conn->query("SET NAMES 'utf8'");

if(isset($_GET["submit"]))

{

	if($_GET["options"]=="title")

	{

		if($_GET["valueToFilter"]!=null){

        $sql= "SELECT * FROM artworks where Title like '%".$_GET["valueToFilter"]."%'";

		$result = $conn->query($sql);

        while($rows= $result-> fetch_assoc())

              {

                 $id=$rows["ArtWorkID"];

                 echo "<div class='container'><div class='row' style='margin-top:10px'>";

                 echo "<div class='col-md-2'>";

                 echo "<p><a href='Part03_SingleWork.php?id=".$id."'><img src='images/art/works/square-medium/".$rows['ImageFileName'].".jpg'></div>";

                 echo "<div class='col-md-9'>";

                 echo "<p><a href='Part03_SingleWork.php?id=".$id."'>".$rows["Title"]."</a></p>";

                 echo "<p>".$rows["Description"]."</p></div></div></div>";		

              }

            }

	}

	if($_GET["options"]=="descrition")

	{

		if($_GET["valueToFilter"]!=null){

        $sql= "SELECT * FROM artworks where Description like '%".$_GET["valueToFilter"]."%'";

		$result = $conn->query($sql);

        while($rows= $result-> fetch_assoc())

              {

                 $id=$rows["ArtWorkID"];

                 echo "<div class='container'><div class='row' style='margin-top:10px'>";

                 echo "<div class='col-md-2'>";

                 echo "<p><a href='Part03_SingleWork.php?id=".$id."'><img src='images/art/works/square-medium/".$rows['ImageFileName'].".jpg'></div>";

                 echo "<div class='col-md-9'>";

                 echo "<p><a href='Part03_SingleWork.php?id=".$id."'>".$rows["Title"]."</a></p>";

                 $str = $rows["Description"];

				 $keyword = $_GET["valueToFilter"];





				 $highlightcolor = "#daa732";

    	$occurrences = substr_count(strtolower($str), strtolower($keyword));

    $newstring = $str;

    $match = array();

 

    for ($i=0;$i<$occurrences;$i++) {

        $match[$i] = stripos($str, $keyword, $i);

        $match[$i] = substr($str, $match[$i], strlen($keyword));

        $newstring = str_replace($match[$i], '[#]'.$match[$i].'[@]', strip_tags($newstring));

    }

 

    $newstring = str_replace('[#]', '<span style="background-color: '.$highlightcolor.';">', $newstring);

    $newstring = str_replace('[@]', '</span>', $newstring);

    



				 echo $newstring;

                 echo "</div></div></div>";		







                 

              }

            }

	}

	if($_GET["options"]=="nothing")

	{

		

        $sql= "SELECT * FROM artworks ";

		$result = $conn->query($sql);

        while($rows= $result-> fetch_assoc())

              {

                 $id=$rows["ArtWorkID"];

                 echo "<div class='container'><div class='row' style='margin-top:10px'>";

                 echo "<div class='col-md-2'>";

                 echo "<p><a href='Part03_SingleWork.php?id=".$id."'><img src='images/art/works/square-medium/".$rows['ImageFileName'].".jpg'></div>";

                 echo "<div class='col-md-9'>";

                 echo "<p><a href='Part03_SingleWork.php?id=".$id."'>".$rows["Title"]."</a></p>";

                 echo "<p>".$rows["Description"]."</p></div></div></div>";		

              }

            

	}

}

if(isset($_GET["title"])&&$_GET["title"]!=null)

{

	 $sql= "SELECT * FROM artworks where Title like '%".$_GET["title"]."%'";

		$result = $conn->query($sql);

        while($rows= $result-> fetch_assoc())

              {

                 $id=$rows["ArtWorkID"];

                 echo "<div class='container'><div class='row' style='margin-top:10px'>";

                 echo "<div class='col-md-2'>";

                 echo "<p><a href='Part03_SingleWork.php?id=".$id."'><img src='images/art/works/square-medium/".$rows['ImageFileName'].".jpg'></div>";

                 echo "<div class='col-md-9'>";

                 echo "<p><a href='Part03_SingleWork.php?id=".$id."'>".$rows["Title"]."</a></p>";

                 echo "<p>".$rows["Description"]."</p></div></div></div>";		

              







              }

}



?>

