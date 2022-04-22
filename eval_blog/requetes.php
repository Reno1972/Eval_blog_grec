<?php

function requete_findUser($pseudo)
{
    $db = connexion_BD();
    $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
    $req = $db->prepare($sql);
    $req->execute([
        ":pseudo" => $pseudo
    ]);
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
}

function requete_lire_all_user()
{
    $db = connexion_BD();
    $sql = "SELECT * FROM users";
    $req = $db->prepare($sql);
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}

function requete_displayArticles()
{
    $db = connexion_BD();
    $sql = "SELECT * FROM articles ORDER BY date_heure DESC";
    $req = $db->prepare($sql);
    $result = $req->execute([
        // "users" => $user
    ]);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}

function requete_enregistrement($newTitle, $newText, $newImg)
{
    $db = connexion_BD();
    $sql = "INSERT INTO articles (titre_article,text_article,image_article) VALUES (:titre_article,:text_article,:image_article)";
    $req = $db->prepare($sql);
    $result = $req->execute([
        ":titre_article" => $newTitle,
        ":text_article" => $newText,
        ":image_article" => $newImg
    ]);
    return $result;
}

function requete_delete($id)
{
    $db = connexion_BD();
    $sql = "DELETE FROM articles WHERE id_article=:id";
    $req = $db->prepare($sql);
    $req->execute([
        ":id" => $id
    ]);
}

function requete_id($id)
{
    $db = connexion_BD();
    $sql = "SELECT * FROM articles WHERE id_article=:id";
    $req = $db->prepare($sql);
    $req->execute([
        ":id" => $id
    ]);
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
}

function requete_inscription($pseudo, $password, $role)
{
    $db = connexion_BD();
    $sql = "INSERT INTO users (pseudo, password, role) VALUES (:pseudo, :password, :role)";
    $req = $db->prepare($sql);
    $result = $req->execute([
        ":pseudo" => $pseudo,
        "password" => $password,
        ":role" => $role
    ]);
    return $result;
}
