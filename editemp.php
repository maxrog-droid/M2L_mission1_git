<?php
session_start();

$databaseHost = 'localhost';
$databaseName = 'tb_test';
$databaseUsername = 'login4152';
$databasePassword = 'WnHZcAuGAeLgOmG';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	
	$Statut = mysqli_real_escape_string($conn, $_POST['Statut']);
	$Commentaire = mysqli_real_escape_string($conn, $_POST['Commentaire']);	
	$id_responsable = $_SESSION['id']; 
	// checking empty fields
	if(empty($Statut) ){	
			
		if(empty($Statut)) {
			echo "<font color='red'>Veuillez mettre l'état</font><br/>";
		}
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE demande SET statut ='$Statut',commentaire ='$Commentaire' WHERE id_demande=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: emp.php");
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
	$Statut = $res['statut'];
	$commentaire = $res['commentaire'];
}
?>
<html>
<head>	
	<title>Editer une Donnée</title>
</head>

<body>
	<a href="#####">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editemp.php">
		<table border="0">
			<tr> 
				<td>Demande</td>
				<td><input type="text" name="Demande" disabled="disabled" value="<?php echo $demande;?>"></td>
			</tr>
			<tr> 
				<td>Statut</td>
				<td><input type="text" name="Statut" value="<?php echo $Statut;?>"></td>
			</tr>
			<tr> 
				<td>Commentaire</td>
				<td><input type="text" name="Commentaire"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Valider"></td>
			</tr>
		</table>
	</form>
</body>
</html>
