<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login page</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
  <div class="d-flex justify-content-center align-items-center mt-5 gap-5 flex-column">
    <?php
    if (!isset($_SESSION["username"])) { ?>
      <div>
        <h3>Login</h3>
        <form method="post" action="actions/auth/login.php" autocomplete="off">
          <input name="username" placeholder="username" class="form-control mt-2" required></input>
          <input name="password" placeholder="password" type="password" class="form-control mt-2" required></input>

          <button type="submit" class="btn btn-primary btn-sm mt-2">Login</button>
        </form>
      </div>

      <div>
        <h3>Sign up</h3>
        <form method="post" action="actions/auth/signup.php" autocomplete="off">
          <input name="username" placeholder="username" class="form-control mt-2" required></input>
          <input name=" password" placeholder="password" type="password" class="form-control mt-2" required></input>

          <button type="submit" class="btn btn-primary btn-sm mt-2">Sign up</button>
        </form>
      </div>
    <?php } else { ?>
      <h1>You are already logged in!</h1>

      <form method="post" action="actions/auth/logout.php" autocomplete="off">
        <button type="submit" class="btn btn-primary btn-sm">Logout</button>
      </form>
    <?php } ?>
  </div>

</body>

</html>