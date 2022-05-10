<?php
    session_start();
    // including the database connection file
    include_once("assets/crud/config.php");
    include_once("class_upload.php");
    
    //Pour update la photo
    if(isset($_POST['btnPhoto'])){   
        
        $photo = null;                    
        $upload = new Upload(array('png', 'gif', 'jpg', 'jpeg'), 'images', 500000);     
        $photo = $upload->enregistrer('photo');      
        
        $nom = $photo['nom'];
        $id = $_SESSION['id'];

        $exec = mysqli_query($mysqli, "UPDATE user SET photo='$nom' WHERE id=$id");
              
        if (!$exec){        
            var_dump('error');
        }      
   
        $_SESSION['photo'] = $nom;
    }
    
    //Pour update les infos du profile
    if(isset($_POST['update'])){	
        
        if(isset($_POST['Username'])){
            $username = mysqli_real_escape_string($mysqli, $_POST['Username']);
            if(empty($username)) {
                echo '<div class="alert alert-danger text-center" role="alert">Username field is empty!</div>';
            }else{
                //updating the table
                $id = $_SESSION['id'];
                $result = mysqli_query($mysqli, "UPDATE user SET Username='$username' WHERE id=$id");
                $_SESSION['Username'] = $username;
                header("Location: profile.php");
            }
        }else if(isset($_POST['Name'])){
            $name = mysqli_real_escape_string($mysqli, $_POST['Name']);
            if(empty($name)) {
                echo '<div class="alert alert-danger text-center" role="alert">Name field is empty!</div>';
            }else{
                //updating the table
                $id = $_SESSION['id'];
                $result = mysqli_query($mysqli, "UPDATE user SET Name='$name' WHERE id=$id");
                $_SESSION['Name'] = $name;
                header("Location: profile.php");
            }	
        }else if(isset($_POST['Mail'])){
            $mail = mysqli_real_escape_string($mysqli, $_POST['Mail']);
            if(empty($mail)) {
                echo '<div class="alert alert-danger text-center" role="alert">Mail field is empty!</div>';
            }else{
                //updating the table
                $id = $_SESSION['id'];
                $result = mysqli_query($mysqli, "UPDATE user SET Mail='$mail' WHERE id=$id");
                $_SESSION['Mail'] = $mail;
                header("Location: profile.php");
            }
            
        }


        
    }
?>
<html>
    <head>
        <title>Inscription</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>

    <body>
        <a href="index.php">Retour au site</a>
        <br/><br/>

        <table class="table table-hover table-dark mt-4">
            <tbody>
                <tr class="table-secondary">
                    <th scope="row">Nom</th>
                    <td><?php echo $_SESSION['Name'] ?></td>
                    <td class="pl-5"> <form name="form1" method="post" action="profile.php"> <input type="text" name="Name" value="<?php echo $_SESSION['Name'];?>"> <input type="submit" name="update" value="Update"></form></td></a>
                </tr>

                <tr class="table-secondary">
                    <th scope="row">E-Mail</th>
                    <td><?php echo $_SESSION['Mail'] ?></td>
                    <td class="pl-5"> <form name="form1" method="post" action="profile.php"> <input type="text" name="Mail" value="<?php echo $_SESSION['Mail'];?>"> <input type="submit" name="update" value="Update"></form></td></a>
                </tr>

                <tr class="table-secondary">
                    <th scope="row">Pseudo</th>
                    <td><?php echo $_SESSION['Username'] ?></td>
                    <td class="pl-5"> <form name="form1" method="post" action="profile.php"> <input type="text" name="Username" value="<?php echo $_SESSION['Username'];?>"> <input type="submit" name="update" value="Update"></form></td></a>
                </tr>
            </tbody>
        </table>
        <div class="container">
            <div class="text-center">
                <?php if($_SESSION['photo'] == NULL) {?>
                    <img src="images/base.jpg" alt= "Photo de profile" class="img-thumbnail w-25"/>
                <?php }else{ ?>
                    <img src="images/<?php echo $_SESSION['photo'] ?>" alt= "Photo de profile" class="img-thumbnail w-25"/>
                <?php } ?>
            </div>
        </div>




        <form class="form-signin" action="profile.php" method="post" enctype="multipart/form-data">
            <label for="photo" class="form-control">Photo :</label>
            <input type="file" name="photo" id="photo" class="form-control"/>
            <button type="submit" class="btn btn-primary" name = "btnPhoto" >Changer Photo</button>
        </form


    </body>
</html>

