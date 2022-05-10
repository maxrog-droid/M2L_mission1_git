<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$username = mysqli_real_escape_string($mysqli, $_POST['Username']);
	$password = mysqli_real_escape_string($mysqli, $_POST['Password']);
	$name = mysqli_real_escape_string($mysqli, $_POST['Name']);	
	$mail = mysqli_real_escape_string($mysqli, $_POST['Mail']);

	// checking empty fields
	if(empty($username) || empty($password) || empty($name) || empty($mail)) {	
			
		if(empty($username)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($password)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($name)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		

		if(empty($mail)) {
			echo "<font color='red'>mail field is empty.</font><br/>";
		}
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE user SET Username='$username',Password='$password',Name='$name', Mail='$mail' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$username = $res['Username'];
	$password = $res['Password'];
	$name = $res['Name'];
	$mail = $res['Mail']
}
?>
<html>
<head>	
	<title>Editer une Donnée</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Username</td>
				<td><input type="text" name="Username" value="<?php echo $username;?>"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="Password" value="<?php echo $password;?>"></td>
			</tr>
			<tr> 
				<td>Name</td>
				<td><input type="text" name="Name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Mail</td>
				<td><input type="text" name="Mail" value="<?php echo $mail;?>"></td>
			</tr>
			<tr> 
				<td>Role</td>
				<td><input type="text" name="Role" value="<?php echo $mail;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
