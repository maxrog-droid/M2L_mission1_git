<?php
session_start();

$databaseHost = 'localhost';
$databaseName = 'tb_test';
$databaseUsername = 'root';
$databasePassword = 'root';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	
	$etat = mysqli_real_escape_string($conn, $_POST['Etat']);
	$employe = mysqli_real_escape_string($conn, $_POST['IdEmploye']);	
	$id_responsable = $_SESSION['id']; 
	// checking empty fields
	if(empty($etat) || empty($employe) ){	
			
		if(empty($etat)) {
			echo "<font color='red'>Veuillez mettre l'état</font><br/>";
		}
		
		if(empty($employe)) {
			echo "<font color='red'>Veuillez mettre l'employe</font><br/>";
		}
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE demande SET id_responsable ='$id_responsable',etat ='$etat',id_employe='$employe' WHERE id_demande=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: res.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM demande WHERE id_demande=$id");

while($res = mysqli_fetch_array($result))
{
	$demande = $res['type_demande'];
	$etat = $res['etat'];
	$employe = $res['id_employe'];
}
?>
<html>
<head>	
	<title>Editer une Donnée</title>
</head>

<body>
	<a href="#####">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Demande</td>
				<td><input type="text" name="Demande" disabled="disabled" value="<?php echo $demande;?>"></td>
			</tr>
			<tr> 
				<td>Etat</td>
				<td><input type="password" name="Etat" value="<?php echo $etat;?>"></td>
			</tr>
			<tr> 
				<td>Id Employe</td>
				<td><input type="text" name="IdEmploye" value="<?php echo $employe;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Valider"></td>
			</tr>
		</table>
	</form>
</body>
</html>
