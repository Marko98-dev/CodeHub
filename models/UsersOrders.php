<?php

class UsersOreders {

  public $id;
  public $user;
  public $total;

  public function findByUser ($userId) {
    $user = new User();
    $user->findById($_SESSION["userId"]);
  }
}

?>
