<?php
	require_once("../../php/DBConnec.php");	

	
	$pdo = DBConnec::getConnec()->getPdo();
	$sql = 'DELETE FROM EVENT WHERE ID = :id';
	$sql2 = 'DELETE FROM EVENT_USER_ASSOC WHERE ID_EVENT = :id';
	$sql3 = 'DELETE FROM PARTICIPANTS WHERE ID_EVENT = :id';
	$stmt = $pdo->prepare($sql);
	$stmt2= $pdo->prepare($sql2);
	$stmt3= $pdo->prepare($sql3);
	
	$stmt->bindValue('id', $_GET['id'], PDO::PARAM_STR);
	$stmt2->bindValue('id', $_GET['id'], PDO::PARAM_STR);
	$stmt3->bindValue('id', $_GET['id'], PDO::PARAM_STR);
	try
	{
	    $stmt->execute();
		$stmt2->execute();
		$stmt3->execute();
		header("location: ../events.php");     
	}
	catch (PDOException $e)
	{
	    echo 'Erreur : ', $e->getMessage(), PHP_EOL;
	    echo 'Requête : ', $sql, PHP_EOL;
	    exit();
	}


?>
