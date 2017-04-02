<?php
	require_once("../../php/DBConnec.php");
	
	$pdo = DBConnec::getConnec()->getPdo();
	
	if (empty($_POST['surname']) || empty($_POST['name']) || empty($_POST['nickname']) || empty($_POST['birthday']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['cpassword']))
		header('location: ../register.php?err=0');
	else if ($_POST['password'] != $_POST['cpassword'])
		header('location: ../register.php?err=1');
	else {
		$sql = 'SELECT * FROM USER WHERE NICKNAME = :nickname';
        $stmt = $pdo->prepare($sql); 
        $stmt->bindValue('nickname', $_POST['nickname'], PDO::PARAM_STR); 

	try
        {
            $stmt->execute(); 
            if($stmt->rowCount() == 0) {
				$sql = 'INSERT INTO USER (ID, name, surname, nickname, birthday, email, password)
                  VALUES (NULL, :name, :surname, :nickname, :birthday, :email, :password)';
				$stmt = $pdo->prepare($sql);
				$stmt->bindValue('name', $_POST['name'], PDO::PARAM_STR);
				$stmt->bindValue('surname', $_POST['surname'], PDO::PARAM_STR);
				$stmt->bindValue('nickname', $_POST['nickname'], PDO::PARAM_STR);
				$stmt->bindValue('birthday', $_POST['birthday'], PDO::PARAM_STR); 
				$stmt->bindValue('password', $_POST['password'], PDO::PARAM_STR);
				$stmt->bindValue('email', $_POST['email'], PDO::PARAM_STR); 
				try
				{
				    $stmt->execute(); // Exécution de la requête.
			            header('location: ../index.php?success=1');
				}
				catch (PDOException $e)
				{
				    // Affichage de l'erreur et rappel de la requête.
				    echo 'Erreur : ', $e->getMessage(), PHP_EOL;
				    echo 'Requête : ', $sql, PHP_EOL;
				    exit();
				}
			}                
           	else
				header('location: ../register.php?err=2');
        }
        catch (PDOException $e)
        {
         
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $pseudo, PHP_EOL;
            exit();
        }
	}
		

	

?>
