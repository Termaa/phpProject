<?php
require_once("../../php/DBConnec.php");	

	var_dump($_POST);
	var_dump($_GET);
	$pdo = DBConnec::getConnec()->getPdo();
	$sql = 'UPDATE EVENT SET DESCRIPTION = :description WHERE ID = :id';
	
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue('id', $_GET['id'], PDO::PARAM_STR);
	$stmt->bindValue('description', $_POST['description'], PDO::PARAM_STR);
	try
	{
	    $stmt->execute();
		header("location: ../event.php?eventID=" . $_GET['id']);     
	}
	catch (PDOException $e)
	{
	    echo 'Erreur : ', $e->getMessage(), PHP_EOL;
	    echo 'Requête : ', $sql, PHP_EOL;
	    exit();
	}



?>
