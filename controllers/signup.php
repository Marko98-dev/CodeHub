<?php

if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
  $_SESSION['post'] = $_POST;
  header('Location: /signup', true, 302);
  exit;
}

$_POST = [];
if(!empty($_SESSION['post'])) {
  $post = $_SESSION['post'];
  unset($_SESSION['post']);
}


if(!empty($post)) {

$validEmail = true;
$validPassword= true;

// if (!empty($post['email']) && filter_var($post['email'], FILTER_VALIDATE_EMAIL)) $validEmail = true;

// CHecking for Password

// if (!empty($post['password']) && filter_var($post['password'], FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => '%(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,255}%']])) $validPassword = true;

// cheking in database

if ($validEmail && $validPassword) {
  require_once("../models/user.php");

  $user = new User();

  $user->signUp($post["name"], $post["email"], $post["password"]);

  var_dump($user);

  }
}
