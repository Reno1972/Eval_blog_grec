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
    <header>
        <div class="bg-dark collapse" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">A propos</h4>
                        <p class="text-muted">Ceci est le blog de Jean Client sur la mythologie grecque</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Utilisateur</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">S'inscrire</a></li>
                            <li>
                                <form action="connexion.php">
                                    <a href="connexion.php?connexion" class="text-white">Se connecter</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                        <circle cx="12" cy="13" r="4"></circle>
                    </svg>
                    <strong>Articles</strong>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <main>

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Le blog de la mythologie grecque !</h1>
                    <p class="lead text-muted">Bienvenue sur ce blog. Nous y publions des articles sur le thème fascinant et intriguant de la mythologie grecque</p>
                    <div>
                        <form action="connexion.php">
                            <button class="btn btn-primary my-2" name="btn_connexion">Se connecter</button>
                        </form>
                        <form action="deconnexion.php">
                            <button class="btn btn-secondary my-2" name="">Déconnexion</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container" style="text-align : center">
                <div class="article row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    $allArticles = requete_displayArticles();
                    $allUsers = requete_lire_all_user();
                    foreach ($allArticles as $value) {
                        foreach ($allUsers as $user) ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <rect width="100%" height="100%" fill="#55595c"></rect><img src="img/<?= $value->image_article ?>" class="card-img-top" alt="<?= $value->image_article ?>" height="250rem" style="object-fit : cover">
                                <div class="card-body">
                                    <h2 class="card-title"><?= $value->titre_article ?></h2>
                                    <p class="card-text"><?= $value->text_article ?></p>
                                    <small class="text-muted ">Article ajouté par <?= $user->pseudo ?></small>
                                    <small class="text-muted">Le <?= $value->date_heure ?></small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
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