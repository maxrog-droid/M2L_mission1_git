
<?php

$databaseHost = 'localhost';
$databaseName = 'tb_test';
$databaseUsername = 'login4152';
$databasePassword = 'WnHZcAuGAeLgOmG';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$result = mysqli_query($conn, "SELECT * FROM demande ORDER BY id_demande DESC");

$date = mysqli_query($conn, "SELECT count(*) FROM `demande` WHERE dateDemande = '2022-05-10'");

$employe = mysqli_query($conn, "SELECT * FROM user");


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

<table width='80%' border=0> 
    <tr bgcolor='#CCCCCC'>
        <td>ID</td>
        <td>Username</td>
        <td>Name</td>
        <td>Mail</td>
        <td>Role</td>
        <td>Disponible</td>
        <td>nbDispo</td>
    </tr>
    <?php
    
    while($res = mysqli_fetch_array($employe)) {
        if ($res['role'] == "3") {
            echo "<tr>";
            echo "<td>".$res['iduser']."</td>";
            echo "<td>".$res['Username']."</td>";
            echo "<td>".$res['Name']."</td>";
            echo "<td>".$res['Mail']."</td>";
            echo "<td>"."Employe"."</td>";

            $dispo = mysqli_query($conn, "SELECT count(*) FROM `demande` WHERE id_employe = '$res[iduser]'");
            $dispo = mysqli_fetch_array($dispo)[0];
            if($dispo == 0) {
                echo "<td>"."Disponible"."</td>";
            } else {
                echo "<td>"."Non disponible"."</td>";
            }
            echo "<td>".$res["disponible"]."</td>";
            echo "</tr>";
        }
    }
    ?>



</table>



</body>
</html>



