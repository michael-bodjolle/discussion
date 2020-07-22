<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <title>DISCUSSION</title>
</head>

<body>
    <header>
        <?php
        include('header.php');
        ?>
        <h1>DISCUSSION</h1>
    </header>
    <main id="contmssg">
        <?php
        if (isset($_SESSION['login'])) {
            $ssLogin = $_SESSION['login'];
            $requete = "SELECT * FROM utilisateurs WHERE login = '" . $ssLogin . "'";
            $bdd = mysqli_connect('localhost', 'root', '', 'discussion') or die('erreur');
            $query = mysqli_query($bdd, $requete);
            $infoUser = mysqli_fetch_assoc($query);
            if (isset($_POST['submit'])) {

                if (isset($_POST['message'])) {
                    $coment = $_POST['message'];
                    $iduser = (int)$infoUser["id"];
                    $request = "INSERT INTO messages (`message`, `id_utilisateur`, `date`) VALUES ('" . $coment . "','" . $iduser . "', CURTIME() )";
                    $query = mysqli_query($bdd, $request);
                    header('location: discussion.php');
                }
            }
        }
        ?>
        <?php
        $bdd = mysqli_connect('localhost', 'root', '', 'discussion') or die('erreur');
        $requete = "SELECT *, DATE_FORMAT(date,'%d/%m/%Y')  AS NEW_DATE FROM `messages` INNER JOIN utilisateurs ON messages.id_utilisateur = utilisateurs.id ";
        $query = mysqli_query($bdd, $requete);
        $messages = mysqli_fetch_all($query);
        ?>


        <?php foreach ($messages as $message) {  ?>
            <div class="mssg">
                <div class="logdat">
                    <h3> <?php echo $message[5] ?></h3>
                    <b> <?php echo $message[7] ?></b>
                </div>
                <p class="mssg2"><?php echo $message[1]  ?></p>
            </div>

        <?php } ?>

        <div class="padd"> 
        <div class="container">
            <form action="#" method="post">
                
            <div class="ms"><label for="msg"></label>
                    <p>Messages:</p>
                    <textarea name="message"></textarea>
                    </div>

                    <div class="form-example">
                        <input type="submit" name="submit" value="valider">
                    </div>
            </form>
            </div>
        </div>
    </main>
    <footer>
        <p>tel: 04 33 33 33 33</p> <p>mail: gggg@gmail.com</p> <p>Copyright © 2020 Bodjolle Michael</p>

    </footer>

</body>

</html>