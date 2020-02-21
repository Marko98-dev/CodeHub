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
        if($app->getSignedInUser()) {
          require_once("../models/user.php");
          $user = new User();
          $user->findById($app->getSignedInUser());
          echo "Welcome Back $user->name";
          echo "<p><a href='/orders'>Click Here to see your orders</a></p>";
          echo "<p><a href='/signout'>SignOut</a></p>";
        } else {
          echo "Your not signed In";
          if($app->userError) {
            echo "<p>The Email address or password is incorrect</p>";
          }
          if($app->systemError) {
            echo "<p>Sorry, there is a problem with website, please try again later.</p>";
          }
          echo "<p><a href='/'>Click here to go to home page</a></p>";
        }
      ?>

    </main>

    <?php require_once("../parts/footer.php"); ?>
  </body>
</html>
