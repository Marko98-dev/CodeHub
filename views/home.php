<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once("../parts/head.php"); ?>
    <title>Home | My First App</title>
  </head>
  <body>
    <?php require_once("../parts/header.php"); ?>
    <main>
      <h1>Home Page</h1>

      <form action="/signin" method="post">
        <p>
          <label for="email">Email Address:</label>
          <br> <input type="email" name="emailAddress" required>
        </p>
        <p>
          <label for="password">Password:</label>
          <br> <input type="password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,255}">
          <button>Sign In</button>
        </p>
      </form>

    </main>

    <?php require_once("../parts/footer.php"); ?>
  </body>
</html>
