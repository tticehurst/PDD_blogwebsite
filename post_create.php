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

  <div class="d-flex flex-column align-items-center mt-5">
    <div class="mt-2 w-75">
      <p>Extension task: Add a private toggle - links with task on <a href="/posts.php">posts page</a></p>
      <div class="card p-4 shadow-lg rounded-4 bg-light">
        <h2 class="card-title text-center mb-4">Create New Blog Post</h2>

        <form method="post" action="actions/post_create.php">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Enter the post title" required>
          </div>

          <div class="mb-3">
            <label for="content" class="form-label">Body</label>
            <textarea class="form-control" name="content" rows="13" placeholder="Write your post here..." required></textarea>
          </div>

          <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>