<?php

ob_start();
// require_once('functions.php');
require_once '../src/functions.php';
require '../src/user_class.php';
conn_Bdd();
echo ("ICI");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taches PHP MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="./styles/style.css"> -->
</head>

<body>
    <form>
        <div class="form-group">
            <label for="email">Adresse Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                placeholder="Saisir votre Adresse">

        </div>
        <div class="form-group">
            <label for="password">Mot de Passe</label>
            <input type="password" class="form-control" id="password" placeholder="Mot de Passe">
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>


</html>


<?php
ob_flush();

?>