<?php
	require_once("../php/useful_lib.php");
	require_once("../php/DBConnec.php");
	page_start("Events", "style.css");
	
	
	$events = array();
	
	$pdo = DBConnec::getConnec()->getPdo();
    $sql = 'SELECT * FROM EVENT WHERE ID IN (SELECT ID_EVENT FROM EVENT_USER_ASSOC WHERE ID_USER = :id)';
    $stmt = $pdo->prepare($sql);
	$stmt->bindValue('id', $_SESSION['sid'], PDO::PARAM_STR); 
	
    try
    {
        $stmt->execute(); 
        $stmt->rowCount() or die('Pas de résultat' . PHP_EOL); 
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        while ($result = $stmt->fetch())
        {
			array_push($events, $result);
		}
    }
    catch (PDOException $e)
    {
        echo 'Erreur : ', $e->getMessage(), PHP_EOL;
        echo 'Requête : ', $sql, PHP_EOL;
        exit();
    }


?>

<h1 id='titre'> Here are the events you are organizing :)</h1>

<?php
	foreach($events as $event) {
?>
<div class="media">
  <div class="media-left">
    <a href="event.php?eventID=<?php echo $event->ID; ?>">
      <img style="height: 120px; width:170px" class="media-object" src="<?php echo 'img/' . getImageType($event->TYPE); ?>" alt="<?php echo getImageType($event->TYPE); ?>">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><?php echo $event->NAME; ?></h4>
    <p><?php echo $event->DESCRIPTION;?></p>
  </div>
</div>

<?php
	}
	page_end();
?>
