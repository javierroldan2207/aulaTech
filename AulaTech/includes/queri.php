<?php

function getUser($connection, $username){
    $statement = $connection->prepare("SELECT id, password, role FROM users WHERE username = :username");
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}


function getArticles($connection){
    $query = "SELECT id, name, category, price, stock FROM articles ORDER BY id";
    $statement = $connection->query($query);
    $articles = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
}


function getArticleById($connection, $id){
    $statement = $connection->prepare("SELECT id, name, description, category, price, stock FROM articles WHERE id = :id");
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $article = $statement->fetch(PDO::FETCH_ASSOC);
    return $article;
}