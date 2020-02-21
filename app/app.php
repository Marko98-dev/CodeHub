<?php

class App {
  public $userError;
  public $systemError;

  public function __construct() {
  }

  public function setUserError($val) {
    $this->userError = $val;
  }

  public function getUserError() {
    return $this->userError;
  }

  public function setSystemError($val) {
    $this->systemError = $val;
  }

  public function getSystemError() {
    return $this->systemError;
  }

  public function signIn($id) {
    $_SESSION["userId"] = $id;
  }

  public function getSignedInUser() {
    if(!empty($_SESSION["userId"])) {
      return $_SESSION["userId"];
    } else {
      return false;
    }
  }

  public function signOut() {
    if(!empty($_SESSION["userId"])) unset($_SESSION["userId"]);
  }
}
?>
