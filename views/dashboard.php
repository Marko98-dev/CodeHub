<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once("../parts/head.php"); ?>
    <title>Home | My First App</title>
  </head>
  <body>
    <?php require_once("../parts/header.php"); ?>
    <main>
      <h1>Dashboard</h1>

      <?php
        require_once("../models/user.php");

        $user = new User();
        $user->findById($_SESSION["userId"]);

        if(!empty($_SESSION["userId"])) {
          echo "Welcome Back $user->name";
          echo "<p><a href='/orders'>Click Here to see your orders</a></p>";
          echo "<p><a href='/signout'>SignOut</a></p>";
        } else {
          echo "Your not signed In";
          echo "<p><a href='/'>Click here to go to home page</a></p>";
        }
      ?>

    </main>

    <?php require_once("../parts/footer.php"); ?>
  </body>
</html>
