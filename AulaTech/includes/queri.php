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
    return $statement->fetch(PDO::FETCH_ASSOC);
}


function getUserById($connection, $id){
    $statement = $connection->prepare("SELECT id, username, full_name, email, role FROM users WHERE id = :id");
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function addArticle($connection, $name, $description, $category, $price, $stock){
    $statement = $connection->prepare("INSERT INTO articles (name, description, category, price, stock) VALUES (:name, :description, :category, :price, :stock)");
    $statement->bindParam(':name', $name);
    $statement->bindParam(':description', $description);
    $statement->bindParam(':category', $category);
    $statement->bindParam(':price', $price);
    $statement->bindParam(':stock', $stock);
    return $statement->execute();
}

function updateArticle($connection, $id, $name, $description, $category, $price, $stock){
    $statement = $connection->prepare("UPDATE articles SET name = :name, description = :description, category = :category, price = :price, stock = :stock WHERE id = :id");
    $statement->bindParam(':name', $name);
    $statement->bindParam(':description', $description);
    $statement->bindParam(':category', $category);
    $statement->bindParam(':price', $price);
    $statement->bindParam(':stock', $stock);
    $statement->bindParam(':id', $id);
    return $statement->execute();
}

function deleteArticle($connection, $id){
    $statement = $connection->prepare("DELETE FROM articles WHERE id = :id");
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    return $statement->rowCount();
}
