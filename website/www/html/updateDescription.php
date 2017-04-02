<?php
	require_once("../php/useful_lib.php");

	page_start("Update Description", "style.css");
?>

<div class="container" id='blue'>
	<form id='update' action="phpProcess/updateDescriptionProcess.php?id=<?php echo $_GET['id']; ?>" method='POST'>

		<div class="form-group" >
			<label for="exampleInputEmail1">Description</label>
			<textarea class="form-control" name="description" rows="4"></textarea>
		</div>

		<button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
	</form>
</div>


<?php
	
	page_end();
?>
