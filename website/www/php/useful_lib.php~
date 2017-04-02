<?php

function getImageType($type) {
		switch ($type) {
			case "Sport" : 
				return "sport.jpg";
				break;
			case "Music" :
				return "music.jpg";
				break;
			case "Party" : 
				return "party.jpg";
				break;
			case "OutdoorEvent" :
				return "outdoor.jpg";
				break;
			default :
				break;		
		}
	}
	

function page_start($title, $cssFile) {
	session_start();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Organizor</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="<?php echo $cssFile ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Organizor</a>
        </div>
<?php
	if (!isset($_SESSION['sid'])) {
?>
        <div id="navbar" class="navbar-collapse collapse">
            <button id="loginbutton" type="submit" class="btn btn-success"><a style="color: black" href="login.php">Log in</a></button>
        </div><!--/.navbar-collapse -->
<?php
	}
	else {
?>		
		<div id="navbar" class="navbar-collapse collapse">
			<ul id='nav' class="nav navbar-nav">
				<li><a class="navbar-brand" href="#">Hello <?php echo $_SESSION['nickname']; ?></a></li>
				<li><a href="#">Page 1</a></li>
      			<li><a href="#">Page 2</a></li> 
      			<li><a href="#">Page 3</a></li>
            	<li><button style="margin-top: 5px;" id="logoutbutton" type="submit" class="btn btn-success"><a style="color: black" href="phpProcess/logoutProcess.php">Log out</a></button></li>
        </div><!--/.navbar-collapse -->
<?php
}
?>
      </div>
    </nav>
<?php
}

function page_end() {
?>

	<footer>
        <p>&copy; 2016 Hamza Hichem, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php
}

?>
