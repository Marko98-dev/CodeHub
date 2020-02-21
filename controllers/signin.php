<?php
  // Store data in the session and redirect to avoid browser's re-submit warning on refresh

  if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $_SESSION['post']=$_POST;
    header('Location: /signin', true, 302);
    exit;
  }

  // If the session has post data, move it to a local variable and unset the session variable

  $_POST = [];
  if(!empty($_SESSION['post'])) {
    $post = $_SESSION['post'];
    unset($_SESSION['post']);
  }

  // if we have a data in the local $post variable, lets proces it
  if(!empty($post)) {
    // By Default we assume the submitted data is not valid
    $validEmail = false;
    $validPassword= false;

    // Email is required and must be an email Address
    if (!empty($post['emailAddress']) && filter_var($post['emailAddress'], FILTER_VALIDATE_EMAIL)) $validEmail = true;

    // CHecking for Password

    if (!empty($post['password']) && filter_var($post['password'], FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => '%(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,255}%']])) $validPassword = true;

    // cheking in database

    if ($validEmail && $validPassword) {
      try {
        require_once("../models/user.php");

        $user = new User();

        $user->signIn($post["emailAddress"], $post["password"]);
      }
      catch(SignInException $e) {
        $app->setUserError(true);
      }
      catch(Exception $e) {
        $app->setSystemError(true);
      }
    }
  }
?>
