<?php
session_start();
include_once(__DIR__ . "/includes/check_login.php");

if (!isset($_GET["id"])) {
  header("Location: /posts.php");
}

$connection = include_once(__DIR__ . "/includes/db.php");

$query = $connection->prepare("SELECT title,content,author FROM posts WHERE id=?");
$query->execute([$_GET["id"]]);

$post = $query->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My blog website</title>

  <link rel="stylesheet" href="styles.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="bg-custom">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a href="/" class="navbar-brand">My site</a>

        <div class="navbar-collapse">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="/posts.php">Posts</a>
            </li>
          </ul>
        </div>

        <ul class="navbar-nav">
          <li class="nav-item">
            <form method="post" action="actions/auth/logout.php">
              <button type="submit" class="btn btn-danger">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="d-flex flex-column align-items-center mt-5 mb-5">
    <div class="mt-2 w-75">
      <p>Extension task: Add a way to delete posts</p>

      <div class="card p-4 shadow-lg rounded-4 bg-light">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <?php
            if ($post) {
            ?>
              <div>
                <h5 class="card-title"><?= $post["title"] ?></h5>
                <h6 class="card-subtitle text-muted mb-2"><?= $post["author"] ?></h6>
              </div>
              <a href="posts.php"><button class="btn btn-secondary">Back</button></a>
          </div>
          <p class="card-text" style="white-space: pre-wrap;"><?= $post["content"] ?></p>
        <?php } else { ?>
          <h5>No post found</h5>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</body>