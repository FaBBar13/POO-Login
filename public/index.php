<?php
session_start();
// $_SESSION['_nom'] = 'aaa';
// $_SESSION['_prenom'] = 'bbb';
include '../src/header.php';

if (isset($_SESSION['_nom'])) {
    echo "<h3 style='color:green'> Hello Utilisateur N°" . $_SESSION['_user'] . ", vous êtes " . $_SESSION['_nom'] . " " . $_SESSION['_prenom'] . ", connexion réussie !</h3>";
    ?>
    <form method='POST' action='/src/logout.php'>
        <input type='submit' class='btn btn-danger' id='deconnexion' name='deconnexion' value='Déconnecter ?'>
    </form>
    <?php
} else {

    header("Location: /src/login.php");
}
;
include '../src/footer.php';