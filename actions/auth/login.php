<?php
session_start();
header("Location: /");
$connection = include_once(__DIR__ . "../../../includes/db.php");

if (!isset($_SESSION["username"])) {
  $query = $connection->prepare("SELECT username,password FROM users WHERE BINARY username=?");
  $query->execute([$_POST["username"]]);

  if ($query->rowCount() === 1) {
    $details = $query->fetchAll();

    if (password_verify($_POST["password"], $details[0]["password"])) {
      session_regenerate_id();

      $_SESSION["username"] = $_POST["username"];
    }
  }
} else {
  die();
}
