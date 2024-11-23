<?php
if (!isset($_SESSION["username"]) || !isset($_SESSION)) {
  header("Location: login.php");
  die();
}
