<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Jean Client</title>
    <meta name="Eval_blog_php" content="Evaluation blog grèce anthique PHP">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <?php


    include "pdo.php";
    include "requetes.php";

    $allData = requete_lire_all_user();

    ?>

    <main class="container" style="text-align : center">
        <form action="inscription.php" method="POST" class="form-signin" enctype="multipart/form-data">
            <div class="form-label-group" style="margin-top: 3rem;">
                <label for="inputText">
                    <h3>Pseudo</h3>
                </label>
                <input type="text" name="pseudo" id="inputPseudo" class="form-control" placeholder="Pseudo" required="" autofocus="">
            </div>

            <div style="margin-top: 3rem;">
                <label for="inputEmail">
                    <h3>Mot de passe</h3>
                </label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required="">
            </div>

            <div style=" margin-top: 3rem;">
                <form action="#">
                    <button type="submit" class="btn btn-lg btn-primary btn-block" name="btn_inscription">Enregistrer</button>
                </form>
            </div>
        </form>

        <?php

        if (isset($_POST['btn_inscription'])) {
            $users = requete_findUser($_POST['pseudo']);
            $existe = 0;
            if ($users) {
                $existe = 1;
                header("location: connexion.php?existe=" . $existe);
            } else {
                $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);
                requete_inscription($_POST['pseudo'], $mdp, 'user');
                header("location: connexion.php?existe=" . $existe);
            }
        }
        ?>

        <form action="index.php">
            <button class="btn btn-secondary m-5">Retour à l'accueil</button>
        </form>

    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">Renaud COLOMAR©</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>