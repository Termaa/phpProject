<?php
	require_once("../php/useful_lib.php");

	page_start("login", "style.css");
?>

<div class="container">

      <form class="form-signin" action="phpProcess/loginProcess.php" method='POST'>
<?php
	if(isset($_GET['err'])) {
		switch ($_GET['err']) {
			case 0 :
				echo "<h2 class=\"form-signin-heading\">User doesn't exist</h2>";
				break;
			case 1 :
				echo "<h2 class=\"form-signin-heading\">Wrong password</h2>";
				break;
			default :
				break;
		}
	}
	else
		echo "<h2 class=\"form-signin-heading\">Please sign in</h2>";
?>
        <label for="inputEmail" class="sr-only">Nickname</label>
        <input name='nickname' type="text" class="form-control" placeholder="Nickname" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name='password' type="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->

<?php
	page_end();
?>
