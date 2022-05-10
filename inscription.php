<html>
<head>
	<title>Inscription</title>
	<style>
		body{
			background-image: url("https://cdn.discordapp.com/attachments/756407583069175859/843799217016274944/1377261614_98993.png"); 
			text-align: center;
			background-size: 100%;
        	background-attachment: fixed;
    		background-repeat: no-repeat;
        	size:auto;
        	color:white;

		}
		p{
			font-size: 16px;
		}
		table{

				margin-left: 500px;
		}
		form{
			margin-right:35%;
		}
		a{
			color:white;
		}
	</style>
</head>

<body>
	<a href="index.php">Retour au site</a>
	<br/><br/>

	<form action="addu.php" method="post" name="form1">
		<table width="25%" border="0" >
			<tr> 
				<td>Identifiant</td>
				<td><input type="text" name="Username"></td>
			</tr>
			<tr> 
				<td>Mot de passe</td>
				<td><input type="password" name="Password" minlength="=12"></td>
			</tr>
			<tr> 
				<td>Nom</td>
				<td><input type="text" name="Name"></td>
			</tr>
			<tr> 
				<td>Mail</td>
				<td><input type="text" name="Mail"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="S'inscrire"></td>
			</tr>
		</table>
	</form>
	<p class="box-register">Vous avez deja un compte ? <a href="login.php">Se connecter</a></p>
</body>
</html>

