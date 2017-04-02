<?php
	require_once("../../php/DBConnec.php");
	session_start();
	$pdo = DBConnec::getConnec()->getPdo();

	$sql = 'INSERT INTO PARTICIPANTS (ID, ID_EVENT, ID_USER) values (NULL, :idevent, :iduser)';
        $stmt = $pdo->prepare($sql); 
        $stmt->bindValue('idevent', $_GET['eventID'], PDO::PARAM_STR);
	$stmt->bindValue('iduser', $_SESSION['sid'], PDO::PARAM_STR);
	try
        {
            $stmt->execute(); 
	    header('location: ../event.php?eventID=' . $_GET['eventID']);
	}
        catch (PDOException $e)
        {
         
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $pseudo, PHP_EOL;
            exit();
        }

?>
