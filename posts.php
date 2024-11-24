<?php
session_start();

include_once(__DIR__ . "/includes/check_login.php");
$connection = include_once(__DIR__ . "/includes/db.php");

function truncateText($text)
{
  if (strlen($text) > 100) {
    return substr($text, 0, 100) . "...";
  }

  return $text;
}
$query = $connection->prepare("SELECT * FROM posts");
$query->execute();

$posts = $query->fetchAll();
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

  <div class="ms-5 mt-3">
    <div class="d-flex flex-wrap gap-3 align-content-center">
      <h5>Hello, <?= $_SESSION["username"] ?> </h5>
      <a href="/post_create.php"><button class="btn btn-primary btn-sm d-flex flex-row">New post</button></a>
    </div>

    <div class="mt-3 text-center">
      <h1>Extension task: Add a way to private posts and display them accordingly</h1>
      <h3>All posts:</h3>
      <div class="d-flex flex-wrap justify-content-center gap-3">

        <?php
        if (count($posts) === 0) {
          echo "<h5>No posts found</h5>";
        } else {
          foreach ($posts as $post) {
        ?>
            <div class="card bg-light" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title"><?= $post["title"] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Author: <?= $post["author"] ?></h6>
                <p class="card-text"><?= truncateText($post["content"]) ?></p>
                <form method="get" action="post_view.php">
                  <input type="hidden" name="id" value="<?= $post["id"] ?>">
                  <button type="submit" class="btn btn-secondary">View post</button>
                </form>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
    </div>
  </div>
</body>

</html>