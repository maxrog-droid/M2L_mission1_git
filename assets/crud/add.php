<html>
<head>
	<title> Ajouter un utilisateur</title>
</head>

<body>
<?php 
//connexion base de données
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$username = mysqli_real_escape_string($mysqli, $_POST['Username']);
	$password = mysqli_real_escape_string($mysqli, $_POST['Password']);
	$name = mysqli_real_escape_string($mysqli, $_POST['Name']);
	$mail = mysqli_real_escape_string($mysqli, $_POST['Mail']);	

	// vérification case vide 
	if(empty($username) || empty($password) || empty($name) || empty($mail)) {
				
		if(empty($username)) {
			echo "<font color='red'>Username field is empty.</font><br/>";
		}
		
		if(empty($password)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}
		
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($mail)) {
			echo "<font color='red'>Mail field is empty.</font><br/>";
		}
		
		//liens vers la page d'index
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}
		else { 
		
			
		//insertion dans la base de données	
		$result = mysqli_query($mysqli, "INSERT INTO user (Username,Password,Name,Mail,photo) VALUES('$username','".hash('sha256',$password)."','$name','$mail','NULL')");

		//affichage d'un message de confirmation
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}

?>
</body>
</html>
