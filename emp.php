
<?php
session_start();

$databaseHost = 'localhost';
$databaseName = 'tb_test';
$databaseUsername = 'login4152';
$databasePassword = 'WnHZcAuGAeLgOmG';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$id_employe = $_SESSION['id'];

$result = mysqli_query($conn, "SELECT * FROM demande WHERE id_employe = '$id_employe' ORDER BY id_demande DESC");



?>

<table width='80%' border=0>


<tr bgcolor='#CCCCCC'>
<td>Demande</td>
<td>statut</td>
<td>Commentaire</td>
<td>Modifier</td>
</tr>
<?php
// assignation des élément contenu dans result
while($res = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$res['type_demande']."</td>";	
echo "<td>".$res['statut']."</td>";
echo "<td>".$res['commentaire']."</td>";
echo "<td><a href=\"editemp.php?id=$res[id_demande]\">Modifier</a> | <a href=\"delete.php?id=$res[id_demande]\" onClick=\"return confirm('Etes-vous sur de vouloir supprimer?')\">Supprimer</a></td>";
}
?>
</body>
</html>



