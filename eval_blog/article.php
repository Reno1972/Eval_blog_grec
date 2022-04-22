<?php
include 'pdo.php';
include 'requetes.php';


$tmp_name = $_FILES["image"]["tmp_name"];
$name = pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME);


if ($_FILES['image']['size'] > 0) {

    $info = pathinfo($_FILES['image']['name']);
    $errors = null;
    $articles = requete_displayArticles();


    foreach ($articles as $value) {
        if (ucfirst(strtolower($_POST['titre'])) === $value->titre_article) {
            $errors = "existe";
        }
    }

    if ($_FILES['image']['size'] > 1000000) {
        $errors .= "-taille";
    }

    if ($info['extension'] != "jpg" && $info['extension'] != "jpeg" && $info['extension'] != "png") {
        $errors .= "-format";
    }

    if ($errors === null) {
        // Si on est bon, c'est ici que ça se passe !

        move_uploaded_file($tmp_name, 'img/' . $name . '.' . $info['extension']);
        $newImg = $name . '.' . $info['extension'];
        $newTitle = $_POST['titre'];
        $newText = $_POST['texte'];
        requete_enregistrement($newTitle, $newText, $newImg);
    }
} else {
    $errors = "erreur";
}

header("location: page_admin.php?errors=" . $errors);
