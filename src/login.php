<?php
session_start();

require_once __DIR__ . "/User.php";
include __DIR__ . '/header.php';

ini_set('display_errors', '1');
$user = new User();
//var_dump($_POST);

if (isset($_POST['connexion'])) {

    if (!empty($email = htmlspecialchars(strip_tags($_POST['email']))) && !empty($pwd = htmlspecialchars(strip_tags($_POST['password'])))) {

        $currentuser = $user->connectUser($email, $pwd);

        if ($currentuser) {

            $_SESSION['_user'] = $currentuser->getIdUser();
            $_SESSION['_email'] = $currentuser->getIdEmail();
            $_SESSION['_nom'] = $currentuser->getIdNom();
            $_SESSION['_prenom'] = $currentuser->getIdPrenom();
            $user->redirect('/public/index.php');

        } else {
            echo "<h4 style='color:red'>Email ou Mot de Passe incorrect</h4>";
        }

    }

}

if (isset($_POST['creation'])) {
    header("Location: ./register.php");
}

?>


<form method="POST">
    <div class="form-group">
        <label for="email">Adresse Email</label>
        <input type="email" class="form-control" id="email" name='email' placeholder="Saisir votre Adresse">

    </div>
    <div class="form-group">
        <label for="password">Mot de Passe</label>
        <input type="password" class="form-control" id="password" name='password' placeholder="Mot de Passe">
    </div>
    <br>
    <button type="submit" class="btn btn-primary" name='connexion'>Se connecter</button>
    <button type="submit" class="btn btn-success" name='creation'>Créer</button>

</form>
<?php include __DIR__ . '/footer.php';