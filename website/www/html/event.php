<?php
	if(!isset($_GET['eventID'])) 
		echo "error";
	else {
		require_once("../php/useful_lib.php");
		require_once("../php/DBConnec.php");
		page_start("Event", "style.css");
		
		
		function ifAttend($idEvent, $idUser) {
			$sql = 'SELECT * FROM PARTICIPANTS WHERE ID_EVENT = :idevent AND ID_USER = :iduser';
			$stmt = DBConnec::getConnec()->getPdo()->prepare($sql);
			$stmt->bindValue('idevent', $idUser, PDO::PARAM_STR); 
            $stmt->bindValue('iduser', $idEvent, PDO::PARAM_STR); 

			try
			{
				$stmt->execute();
				if ($stmt->rowCount() == 0) 
                    return false;
                else
                    return true;
			}
			catch (PDOException $e)
			{
				echo 'Error : ', $e->getMessage(), PHP_EOL;
				echo 'Query : ', $sql, PHP_EOL;
				exit();
			}
		}		
		
		function getUserById($idUser) {
			$sql = 'SELECT NICKNAME as nickname FROM USER WHERE ID = :id';
			$stmt = DBConnec::getConnec()->getPdo()->prepare($sql);
			$stmt->bindValue('id', $idUser, PDO::PARAM_STR); 

			try
			{
				$stmt->execute(); 
				$stmt->rowCount() or die('No results' . PHP_EOL); 
				$stmt->setFetchMode(PDO::FETCH_OBJ);
				if ($result = $stmt->fetch())
					return $result;
			}
			catch (PDOException $e)
			{
				echo 'Error : ', $e->getMessage(), PHP_EOL;
				echo 'Query : ', $sql, PHP_EOL;
				exit();
			}
    	}
		
		function getCreator($idEvent) {
			$sql = 'SELECT id_USER as id FROM EVENT_USER_ASSOC WHERE ID_EVENT = :id';
			$stmt = DBConnec::getConnec()->getPdo()->prepare($sql);
			$stmt->bindValue('id', $idEvent, PDO::PARAM_STR); 

			try
			{
				$stmt->execute(); 
				$stmt->rowCount() or die('No results' . PHP_EOL); 
				$stmt->setFetchMode(PDO::FETCH_OBJ);
				if ($result = $stmt->fetch())
					return $result;
			}
			catch (PDOException $e)
			{
				echo 'Erreur : ', $e->getMessage(), PHP_EOL;
				echo 'Requête : ', $sql, PHP_EOL;
				exit();
			}
		}
		
		$pdo = DBConnec::getConnec()->getPdo();
		$sql = 'SELECT * FROM EVENT WHERE ID = :id';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue('id', $_GET['eventID'], PDO::PARAM_STR); 
	
		try
		{
		    $stmt->execute(); 
		    $stmt->rowCount() or die('Pas de résultat' . PHP_EOL); 
		    $stmt->setFetchMode(PDO::FETCH_OBJ);
			$result = $stmt->fetch();
		}
		catch (PDOException $e)
		{
		    echo 'Erreur : ', $e->getMessage(), PHP_EOL;
		    echo 'Requête : ', $sql, PHP_EOL;
		    exit();
		}
		
?>

<article id="event">
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><?php echo $result->NAME; ?></div>
	  <div class="panel-body">
		<p>
			<img style="height: 200px; width:350px; margin-right: auto; margin-left: auto" class="media-object" src="<?php echo 'img/' . getImageType($result->TYPE); ?>" alt="<?php echo getImageType($result->TYPE); ?>">
			<h5>Description :</h5>
			<?php echo $result->DESCRIPTION ?>
		</p>
	  </div>

	  <!-- List group -->
	  <ul class="list-group">
		<li class="list-group-item">Organizor : 
<?php
			$id = $result->ID;
			$userID = getCreator($id);
			$userNickname = getUserById($userID->id);
			echo $userNickname->nickname;
?>
		</li>
		<li class="list-group-item">Budget to allow : <?php echo $result->BUDGET . ' '; ?>$</li>
		<li class="list-group-item">Place : <?php echo $result->PLACE; ?> </li>
		<li class="list-group-item">Date : <?php echo $result->DATE; ?></li>
<?php
    
	if ($userID->id != $_SESSION['sid']) {
        if(!ifAttend($_SESSION['sid'], $_GET['eventID'])) {
?>
		<li class="list-group-item">
			<a href="phpProcess/attendProcess.php?eventID=<?php echo $_GET['eventID']; ?>">Attend to this event</a>
		</li>
<?php
        }
        else {
?>
        <li class="list-group-item">
			<a href="">Leave this event</a>
		</li>
<?php        

        }
	}
	else
	{
?>
		<li class="list-group-item">
			<a href="phpProcess/cancelProcess.php?id=<?php echo $id; ?>" class="button">Cancel this event</a>
			<a href="updateDescription.php?id=<?php echo $id; ?>">Update description</a>
		</li>

<?php
	}
?>
	  </ul>
	</div>
</article>


<?php
		page_end();
	}
?>
