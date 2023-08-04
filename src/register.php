<?php
session_start();
require_once __DIR__ . "/User.php";
include __DIR__ . '/header.php';

$newuser = new User();

if (isset($_SESSION['_nom'])) {
    $newuser->redirect('/public/index.php');
}


if (isset($_POST['insertion'])) {

    if (
        !empty($email = htmlspecialchars(strip_tags($_POST['email'])))
        && !empty($pwd = htmlspecialchars(strip_tags($_POST['password'])))
        && !empty($nom = htmlspecialchars(strip_tags($_POST['nom'])))
        && !empty($prenom = htmlspecialchars(strip_tags($_POST['prenom'])))
    ) {

        if ($newuser->insertUser($email, $pwd, $nom, $prenom)) {
            $newuser->redirect('/public/index.php');
        } else {
            echo "<h4 style='color:red'>Email Déja existant !! </h4>";
            echo '<meta http-equiv="refresh" content="2;URL=register.php">';

        }


    }

}

?>

<form method="POST">

    <div class="form-group">
        <h1>Inscription</h1>

        <label><b>Adresse e-mail</b></label>
        <input type="email" class="form-control" placeholder="Saisir adresse e-Mail" id="email" name="email" required>

        <label><b>Mot de passe</b></label>
        <input type="password" class="form-control" placeholder="Saisir le mot de passe" id="passwd" name="password"
            required>

        <label><b>Nom</b></label>
        <input type="text" class="form-control" placeholder="Saisir votre nom" id="nom" name="nom" required>

        <label><b>Prénom</b></label>
        <input type="text" class="form-control" placeholder="Saisir votre prénom" id="prenom" name="prenom" required>
        <br>
        <input type="submit" id='submit' class='btn btn-warning' name="insertion" value='Valider Création'>
</form>
<?php include __DIR__ . '/footer.php';