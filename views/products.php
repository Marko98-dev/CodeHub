<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once("../parts/head.php"); ?>
    <title>Home | My First App</title>
  </head>
  <body>
    <?php require_once("../parts/header.php"); ?>
    <main>
      <h1>Users Orders</h1>

      <?php
        require_once("../models/user.php");
        $user = new User();
        $user->findById($_SESSION["userId"]);

        echo "<pre>";
        var_dump($user->orders);
        echo "</pre>";
      ?>

    </main>

    <?php require_once("../parts/footer.php"); ?>
  </body>
</html>
