<?php
	require_once("../php/useful_lib.php");

	page_start("Register", "style.css");
?>

<div class="container" id='blue'>
	<?php
		if (isset($_GET['err'])) {
	?>
	<div class="container" id = 'errDisplay' style="text-align: center">
		<p> 
			<?php 
				switch($_GET['err']) {
					case '0' : 
						echo 'Please fill all the fields';
						break;
					case '1' :
						echo 'The two passwords doesn\'t match';
						break;
					case '2' : 
						echo 'Sorry, this nickname already exists...';
						break;
					default : 
						break;
				}
			
			?>
		</p>
	</div>
	<?php
		}
	?>
	<form id='registerForm' action="phpProcess/registerProcess.php" method='POST'>

		<div class="form-group" >
			<label for="exampleInputEmail1">Surname</label>
			<input name="surname" type="text" class="form-control"  placeholder="Surname">
		</div>

		<div class="form-group" >
			<label for="exampleInputEmail1">Name</label>
			<input name="name" type="text" class="form-control"  placeholder="Name">
		</div>
		
		<div class="form-group" >
			<label for="exampleInputEmail1">Nickname</label>
			<input name="nickname" type="text" class="form-control"  placeholder="Nickname">
		</div>

		<div class="form-group" >
			<label for="exampleInputEmail1">Birthday</label>
			<input name="birthday" type="date" class="form-control"  placeholder="Birthday">
		</div>

		<div class="form-group" >
			<label for="exampleInputEmail1">Email address</label>
			<input name="email" type="email" class="form-control"  placeholder="Email">
		</div>

		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input name="password" type="password" class="form-control" placeholder="Password">
		</div>

		<div class="form-group">
			<label for="exampleInputPassword1">Password check</label>
			<input name="cpassword" type="password" class="form-control" placeholder="Password">
		</div>

		<button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
	</form>
</div>


<?php
	
	page_end();
?>
