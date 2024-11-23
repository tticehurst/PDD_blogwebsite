<?php
session_start();
header("Location: /");
$connection = include_once(__DIR__ . "../../../includes/db.php");

$query = $connection->prepare("SELECT username FROM users WHERE username=?");
$query->execute([$_POST["username"]]);

if ($query->rowCount() === 0) {
  $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  $query = $connection->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
  $query->execute([$_POST["username"], $hashed_password]);

  $_SESSION["username"] = $_POST["username"];
} else {
  die();
}
