<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once("../parts/head.php"); ?>
    <title>Register | My First App</title>
  </head>
  <body>
    <?php require_once("../parts/header.php"); ?>
    <main>
        <h1>Signup Page</h1>
        <form action="/signup" method="POST">
            <input type="text" name="name" placeholder="Name"><br /><br />
            <input type="text" name="email" placeholder="E-mail"><br /><br />
            <input type="password" name="password" placeholder="Password"><br /><br />
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </main>

    <?php require_once("../parts/footer.php"); ?>
  </body>
</html>
