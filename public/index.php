<?php
session_start();

if (isset($_SESSION['id_nom'])) {
    echo " Hello " . $_SESSION['id_nom'] . " " . $_SESSION['id_prenom'] . ", vous êtes connecté !";
} else {
    header("Location: /src/login.php");
}
;

?>