<?php
	require_once("../../php/DBConnec.php");
	session_start();
	$pdo = DBConnec::getConnec()->getPdo();
	
	if (empty($_POST['eventname']) || empty($_POST['place']) || empty($_POST['date']) || empty($_POST['description']) || empty($_POST['type']))
        header('location: ../newEvent.php?err=0');
    else {
		$sql = 'SELECT * FROM EVENT WHERE name = :name';
        $stmt = $pdo->prepare($sql); 
        $stmt->bindValue('name', $_POST['eventname'], PDO::PARAM_STR); 
	    try
        {
            $stmt->execute(); 
            if($stmt->rowCount() == 0) {
                 $sql = 'INSERT INTO EVENT (ID, NAME, BUDGET, PLACE, DATE, DESCRIPTION, TYPE)
          VALUES (NULL, :name, :budget, :place, :date, :description, :type)';
		        $stmt = $pdo->prepare($sql);
		        $stmt->bindValue('name', $_POST['eventname'], PDO::PARAM_STR);
		        $stmt->bindValue('budget', $_POST['budget'], PDO::PARAM_STR);
		        $stmt->bindValue('place', $_POST['place'], PDO::PARAM_STR);
		        $stmt->bindValue('date', $_POST['date'], PDO::PARAM_STR); 
		        $stmt->bindValue('description', $_POST['description'], PDO::PARAM_STR);
		        $stmt->bindValue('type', $_POST['type'], PDO::PARAM_STR); 
		        try
		        {
			        if($stmt->execute()) { // execute the query
			            $sql = 'SELECT ID FROM EVENT WHERE NAME = :name';
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue('name', $_POST['eventname'], PDO::PARAM_STR);
                        try
                        {
                            $stmt->execute(); // Exécution de la requête.
                            $stmt->rowCount() or die('Pas de résultat' . PHP_EOL); // S'il y a des résultats.
                            $stmt->setFetchMode(PDO::FETCH_OBJ);
                            if($result = $stmt->fetch())
                            {
                                $sql = "INSERT INTO EVENT_USER_ASSOC (ID, ID_USER, ID_EVENT) VALUES (NULL, :iduser, :idevent)";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindValue('iduser', $_SESSION['sid'], PDO::PARAM_STR);
                                $stmt->bindValue('idevent', $result->ID, PDO::PARAM_STR);
                                try
			                    {
			                        $stmt->execute(); // Exécution de la requête.
		                            header('location: ../index.php');
			                    }
			                    catch (PDOException $e)
			                    {
			                        // Affichage de l'erreur et rappel de la requête.
			                        echo 'Erreur : ', $e->getMessage(), PHP_EOL;
			                        echo 'Requête : ', $sql, PHP_EOL;
			                        exit();
			                    }
                            }       
                        }
                        catch (PDOException $e)
                        {
                            // Affichage de l'erreur et rappel de la requête.
                            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
                            echo 'Requête : ', $sql, PHP_EOL;
                            exit();
                        }
			        }    
		        }
		        catch (PDOException $e)
		        {
		            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
		            echo 'Requête : ', $sql, PHP_EOL;
		            exit();
		        }             
            }
            else
                header('location: ../newEvent.php?err=1');
        }  
        catch (PDOException $e)
        {      
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $pseudo, PHP_EOL;
            exit();
        }
    }
		

	

?>
