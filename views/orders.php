<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once("../parts/head.php"); ?>
    <title>orders | My First App</title>
  </head>
  <body>
    <?php require_once("../parts/header.php"); ?>
    <main>
      <h1>Orders</h1>
      <?php
        if(!empty($_SESSION["userId"])) {
          require_once("../models/user.php");
          $user = new User();

          $user->findById($_SESSION["userId"]);

          echo "<pre>";
            var_dump($user->orders);
          echo "</pre>";

        } else {
          echo "Your not signed In";
          echo "<p><a href='/'>Click here to go to home page</a></p>";
        }
      ?>
    </main>

    <?php require_once("../parts/footer.php"); ?>
  </body>
</html>
