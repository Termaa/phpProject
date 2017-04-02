<?php
	require_once("../php/useful_lib.php");

	page_start("new event", "style.css");
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
						echo 'This name already exists';
					default : 
						break;
				}
			
			?>
		</p>
	</div>
	<?php
		}
	?>
	<form id='registerForm' action="phpProcess/newEventProcess.php" method='POST'>

		<div class="form-group" >
			<label for="exampleInputEmail1">Event name</label>
			<input name="eventname" type="text" class="form-control"  placeholder="Name">
		</div>

		<div class="form-group" >
			<label for="exampleInputEmail1">Budget ($)</label>
			<input name="budget" type="text" class="form-control"  placeholder="Budget">
		</div>

		<div class="form-group" >
			<label for="exampleInputEmail1">Place</label>
			<input name="place" type="text" class="form-control"  placeholder="Place">
		</div>

		<div class="form-group" >
			<label for="exampleInputEmail1">Date</label>
			<input name="date" type="date" class="form-control"  placeholder="Date">
		</div>

		<div class="form-group" >
			<label for="exampleInputEmail1">Description</label>
			<textarea class="form-control" name="description" rows="3"></textarea>
		</div>

		<div class="form-group">
			<label for="exampleInputPassword1">Type</label>
			<input name="type" list="types" type="text" class="form-control" placeholder="Type">
			<datalist id="types">
				<option value="Sport">
				<option value="Music">
				<option value="Party">
				<option value="OutdoorEvent">
			</datalist>
		</div>

		<button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
	</form>
</div>


<?php
	
	page_end();
?>
