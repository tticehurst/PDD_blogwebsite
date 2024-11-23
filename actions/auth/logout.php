<?php
session_start();
header("Location: /");

if (isset($_SESSION["username"])) {
  session_destroy();
} else {
  die();
}
