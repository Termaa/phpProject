<?php
	require_once("../php/useful_lib.php");

	page_start("Welcome", "style.css");

	if (isset($_SESSION['sid'])) {
?>
<div class="jumbotron">
		  <div class="container">
		    <h1>Welcome to you <?php echo $_SESSION['nickname']; ?></h1>
		    <p style="color: #FF4136; font-size: 150%">
		    </p>
		    <p>You are now logged, you can either create an event, browse events, or check your events.</p>
			<ul class="list-inline">
			  <li><p><a class="btn btn-primary btn-lg" href="newEvent.php" role="button">Create event</a></p></li>
			  <li><p><a class="btn btn-primary btn-lg" href="events.php" role="button">Browse events</a></p></li>
			  <li><p><a class="btn btn-primary btn-lg" href="yourEvents.php" role="button">Your events</a></p></li>
			</ul>
		  </div>
		</div>

<?php
	
	}
	else
	{
?>
		<div class="jumbotron">
		  <div class="container">
		    <h1>Welcome to Organizor</h1>
		    <p style="color: #FF4136; font-size: 150%">
			<?php
				if (isset($_GET['success']) && $_GET['success'] == 1) {
					echo 'You have been successfully registered, you can now log in and enjoy !';
				}
			?>
		    </p>
		    <p>Welcome to Organizor, this website allows you to create any kind of event you want. People can join your event, or you can join theirs. Take advantage of our large Community in order to make new friends or find new passions. You just need to register to have access to our services.</p>
		    <p><a class="btn btn-primary btn-lg" href="register.php" role="button">Register &raquo;</a></p>
		  </div>
		</div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Diversity</h2>
          <p>Our purpose is to propose the most kind of events possible, it can be sports event, flashmobs, parties and many more, this is why decided to leave the user able to create it's own events.</p>
          <p><a class="btn btn-default" href="#" role="button">Check examples &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Network</h2>
          <p>Enlarge your personal or professional network with our large community of users, meet people with the same passions or discover new ones. </p>
        </div>
		<div class="col-md-4">
			<img src="img/couchesoleil.jpg" alt="sunny" height="80" width="80">
			<img src="img/cheerleaders.jpg" alt="cheerleader" height="80" width="80">
			<img src="img/flashmob.jpg" alt="flashmob" height="80" width="80">
			<img src="img/trek.jpg" alt="trek" height="80" width="80">
        </div>
	</div>




      <hr>

<?php
	}
	page_end();
?>
