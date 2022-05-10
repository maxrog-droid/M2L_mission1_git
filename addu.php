<html>
<head>
	<title> s'inscrire</title>
</head>

<body>
<?php 
//including the database connection file
include_once("assets/crud/config.php");

if(isset($_POST['Submit'])) {	
	$username = mysqli_real_escape_string($mysqli, $_POST['Username']);
	$password = mysqli_real_escape_string($mysqli, $_POST['Password']);
	$name = mysqli_real_escape_string($mysqli, $_POST['Name']);
	$mail = mysqli_real_escape_string($mysqli, $_POST['Mail']);	

	// checking empty fields 
	if(empty($username) || empty($password) || empty($name) || empty($mail)) {
				
		if(empty($username)) {
			echo "<font color='red'>Champ d'identifiant vide</font><br/>";
		}
		
		if(empty($password)) {
			echo "<font color='red'>Champ du mot de passe vide.</font><br/>";
		}
		
		if(empty($name)) {
			echo "<font color='red'>Champ du nom vide.</font><br/>";
		}

		if(empty($mail)) {
			echo "<font color='red'>Champ du mail vide.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	
	}else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO user (Username,Password,Name,Mail) VALUES('$username','".hash('sha256',$password)."','$name','$mail')");

		//display success message
		echo "<font color='green'>vous êtes biens inscrit.";
		echo "<br/><a href='index.php'>Retourner à l'accueil</a>";
		echo "<br/><a href='login.php'>Se connecter</a>";
	}
}

?>
</body>
</html>
