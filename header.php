<?php

session_start();
if (isset($_POST['deconnexion'])) {
    session_destroy();
    header('location:connexion.php');
}
?>
<!-- si je suis connecté, accueil,  profil et discution s'affiche -->
<?php
if (isset($_SESSION['login'])) {
    echo "<nav>
<a href='index.php'> Accueil</a>
<a href='profil.php'>Profil</a>
<a href='discussion.php'> Discussion</a>
<form  action='profil.php' method='post'>
<div class='form-example'>
        <input type='submit' name='deconnexion' value='Déconnexion'></input>
        </div>
        </form>
</nav>";
} else {
    echo "<nav><a href='index.php'> Accueil</a> 
 <a href='inscription.php'>Inscription</a>
 <a href='connexion.php'>Connexion</a>
 </nav>";
}

?>
<!-- si je ne suis pas connecté, accueil,  inscription et connexion s'affiche -->