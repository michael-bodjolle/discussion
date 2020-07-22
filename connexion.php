<?php

//envoyer le formulaire 
if(isset($_POST['submit']))
{   //variables
    $login=htmlspecialchars(trim($_POST['login']));
    $password=htmlspecialchars(trim($_POST['password']));
    if($login && $password)
    {
            
             $bdd=mysqli_connect('localhost','root', '',"discussion");
             $log = mysqli_query($bdd, 'SELECT * FROM utilisateurs WHERE login = "' . $login . '"');
             $execute = mysqli_fetch_array($log);
             if($execute && password_verify($password, $execute['password'])){
                    session_start();
                    $_SESSION['login'] = $login;
                    header('location: index.php');
                 
                
             }else echo "nom d'utilisateur ou mot de passe incorrect";


    }else echo"veuillez saisir tout saisir les champs";


}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <title>CONNEXION</title>
</head>
<body>
    <header>
        <?php
        include ('header.php') ;
        ?>
      
    </header>
    <main>
    <h1 class="ins" >CONNEXION</h1>
    <div class="container">
        <form action="#" method="post">

            <label for="name">Login :</label>
            <input type="text" id="login" name="login">


            <label for="pasword">Password:</label>
            <input type="password" id="password" name="password">
            <div class="form-example">
                <input type="submit" name="submit" value="valider!">
            </div>
        </form>

    </main>
    
    
</body>
</html>