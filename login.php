<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
include_once('config.php');

session_start();

$databaseHost = 'localhost';
$databaseName = 'tb_test';
$databaseUsername = 'root';
$databasePassword = 'root';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (isset($_POST['Username'])){
    $username = stripslashes($_REQUEST['Username']);
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_REQUEST['Password']);
    $password = mysqli_real_escape_string($conn, $password);

      $query = "SELECT * FROM `user` WHERE Username='$username' and Password='".hash('sha256', $password)."'";
      $result = mysqli_query($conn,$query) or die(mysql_error());
      $rows = mysqli_num_rows($result);
      //Retourne sous forme de tableau associatif les données de $result
      $datas = mysqli_fetch_array($result);
      if($rows==1){
          //var_dump($datas);
          $_SESSION['id'] = $datas['iduser'];
          $_SESSION['Username'] = $username;
          $_SESSION['Mail'] = $datas['Mail'];
          $_SESSION['Name'] = $datas['Name'];
          $_SESSION['role'] = $datas['role'];
          $_SESSION['photo'] = $datas['photo'];
      
      if (!empty($_SESSION['role'])){
      if ($_SESSION['role'] == 1){
         header("Location: indexuser.html");
      }
      elseif ($_SESSION['role'] == 2){
         header("Location: res.php");
        }
      elseif ($_SESSION['role'] == 3){
         header("Location: emp.php");
        
      }
      }
      
        }
        else{
            $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
          }
        }
        ?>
        <form class="box" action="" method="post" name="login">
        <h1 class="box-title">Connexion</h1>
        <input type="text" class="box-input" name="Username" placeholder="Nom d'utilisateur">
        <input type="password" class="box-input" name="Password" placeholder="Mot de passe">
        <input type="submit" value="Connexion " name="submit" class="box-button">
        <p class="box-register">Vous êtes nouveau ici? <a href="inscription.php">S'inscrire</a></p>
        <p> <a href="index.php">Retour au site</a></p>
        <style>
		body{
			background-image: url('https://cdn.futura-sciences.com/buildsv6/images/largeoriginal/9/4/0/940b22eda6_50170334_code-informatique.jpg');
			background-size: 100%;
     	background-attachment: fixed;
    	background-repeat: no-repeat;
     	size:auto;
      color:white;
		}
		p{
			color: white;
			font-size: 16px;
		}
		form{
      margin-left:35%
		}
    a{
      color:white;
    }
		</style>
        <?php if (! empty($message)) { ?>
            <p class="errorMessage"><?php echo $message; ?></p>
        <?php } ?>
        </form>
        </body>
        </html>