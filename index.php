<?php
session_start();

include_once(__DIR__ . "/includes/check_login.php");
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
              <a class="nav-link" href="/posts.php">Posts</a>
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

  <div class="ms-3 mt-3">
    <h1>Home</h1>
    <h3>Hello, <?= $_SESSION["username"] ?> </h3>

    <p class="mt-5">Extension task: 5 most recent posts</p>
  </div>


</body>

</html>