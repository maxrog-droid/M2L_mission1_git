
<?php

$databaseHost = 'localhost';
$databaseName = 'tb_test';
$databaseUsername = 'login4152';
$databasePassword = 'WnHZcAuGAeLgOmG';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$result = mysqli_query($conn, "SELECT * FROM demande ORDER BY id_demande DESC");

$date = mysqli_query($conn, "SELECT count(*) FROM `demande` WHERE dateDemande = '2022-05-10'");



?>
<a href="indexuser.html"> Faire une demande </a><br/><br/>
<table width='80%' border=0>


<tr bgcolor='#CCCCCC'>
<td>Demande</td>
<td>Responsable</td>
<td>Statut</td>
<td>état</td>
<td>Commentaire</td>
<td>Employe</td>
<td>Modifier</td>
</tr>
<?php
// assignation des élément contenu dans result
while($res = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$res['type_demande']."</td>";
echo "<td>".$res['id_responsable']."</td>";
echo "<td>".$res['statut']."</td>";	
echo "<td>".$res['etat']."</td>";
echo "<td>".$res['commentaire']."</td>";
echo "<td>".$res['id_employe']."</td>";
echo "<td><a href=\"edit.php?id=$res[id_demande]\">Modifier</a> | <a href=\"delete.php?id=$res[id_demande]\" onClick=\"return confirm('Etes-vous sur de vouloir supprimer?')\">Supprimer</a></td>";
}

echo "</table>";
echo "</br>";
echo mysqli_fetch_array($date)[0];
?>


</body>
</html>



