<?php

session_start();
header("Location: /posts.php");

$connection = include_once(__DIR__ . "../../includes/db.php");

if (isset($_SESSION) && isset($_SESSION["username"])) {
  $query = $connection->prepare("INSERT INTO posts (title,content,author) VALUES (?,?,?)");
  $query->execute([$_POST["title"], $_POST["content"], $_SESSION["username"]]);
} else {
  die();
}
