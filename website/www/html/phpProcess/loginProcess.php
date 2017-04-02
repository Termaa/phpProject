<?php
	require_once("../../php/DBConnec.php");
	
	var_dump($_POST);
	$pdo = DBConnec::getConnec()->getPdo();
	
        $sql = 'SELECT * FROM USER WHERE nickname = :nickname';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('nickname', $_POST['nickname'], PDO::PARAM_STR);
        try
        {
            $stmt->execute();
            if($stmt->rowCount() == 0) {
				header("location: ../login.php?err=0"); // user doesn't exist
			}
			else {
				$pdo = DBConnec::getConnec()->getPdo();
				$sql = 'SELECT * FROM USER WHERE NICKNAME = :nickname';
				$stmt = $pdo->prepare($sql);
				$stmt->bindValue('nickname', $_POST['nickname'], PDO::PARAM_STR);
				try
				{
				    $stmt->execute();
				    if($result = $stmt->fetch()) {
						if($result['PASSWORD'] == $_POST['password']) {
							session_start();
							$_SESSION['sid'] = $result['ID'];
                					$_SESSION['nickname'] = $result['NICKNAME'];
							$_SESSION['email'] = $result['EMAIL'];
							header("location: ../index.php");
						}
						else
							header("location: ../login.php?err=1");
					}     
				}
				catch (PDOException $e)
				{
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
?>
