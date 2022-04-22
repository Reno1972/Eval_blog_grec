<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Connexion</title>
</head>

<body>

    <?php

    include "pdo.php";
    include "requetes.php";

    if (!empty($_SESSION['users'])) {
        header('location: index.php');
    }

    $allData = requete_lire_all_user();

    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="" method="POST" class="mb-5">
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary my-2" name="btn_connexion">Se connecter</button>
                </form>

            </div>
            <form action="index.php">
                <button class="btn btn-secondary">Retour à l'accueil</button>
            </form>
        </div>
    </div>

    <?php

    if (isset($_POST['btn_connexion'])) {
        $user = requete_findUser($_POST['pseudo']);
        $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (!$user) {
            echo "<p>Pseudo inexistant !</p>";
        } else if ($_POST['pseudo'] === $user->pseudo && password_verify($_POST['password'], $user->password)) {
            $_SESSION['users'] = $_POST['pseudo'];
            $_SESSION['role'] = $user->role;
            $_SESSION['id_user'] = $user->id_user;
            if ($_SESSION['role'] == 'admin') {
                header('location: page_admin.php');
            } else {
                header('location: index.php');
            }
        } else {
            echo "<p>Mot de passe ou identifiant incorrect !</p>";
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>