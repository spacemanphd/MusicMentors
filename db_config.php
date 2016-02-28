<?php

// modify these variables for your installation
define("DBHOST", "webdev.cs.kent.edu:3306");
define("DBNAME", "agrant12");
define("DBUSER", "agrant12");
define("DBPASS", "aW4tP1pn");
define("DBCONNSTRING", 'mysql:host='.DBHOST.';dbname='.DBNAME);

function attemptLogin()
{
	try {
	         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
	         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//Prepare a statement by setting parameters
	         $sql = 'SELECT * FROM A_user_login WHERE username=:username' ;
			 $username = $_POST['username'];
			 $statement = $pdo->prepare($sql);
			 $statement->bindValue(':username', $username); //Bind value of sql statement with value of id in query string
			 $statement->execute();

	         while ($row =  $statement->fetch()) {
	            if (password_verify($_POST['password'], $row['password']))
	            {
	            	session_start();
	            	$_SESSION['username'] = $row['username'];
	            }
	         }
	         $pdo = null;
	      }

	   catch (PDOException $e) {
	      die( $e->getMessage() );
   }
}


function registerUser($username, $password, $email, $type)
{
	unset($_POST);
	try {
		 $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
		 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Prepare a statement by setting parameters
		 $sql = 'INSERT INTO A_user_login (username, password, email, type) VALUES (:username, :password, :email, :type)';
		 $statement = $pdo->prepare($sql);
		 $statement->bindValue(':username', $username); //Bind value of sql statement with value of id in query string
		 $password = password_hash($password, PASSWORD_DEFAULT);
		 $statement->bindValue(':password', $password);
		 $statement->bindValue(':email', $email);
		 $statement->bindValue(':type', $type);
		 $statement->execute();

		 $pdo = null;
	  }

	   catch (PDOException $e) {
		  die( $e->getMessage() );
   }
	header("Location: index.php?page=login");
}

?>