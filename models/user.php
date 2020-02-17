<?php

class User {
  public $id;
  public $name;
  public $email;
  public $password;
  public $orders;

public function __construct() {}

  public function signIn($e, $p) {
    unset($_SESSION["userId"]);
    $da = new DA();
    $da->setSQL("SELECT * FROM users where email = ? and password = ?");
    $da->setParams([$e, $p]);
    $da->runQuery();
    if(!empty($da->result)) $_SESSION["userId"] = $da->result[0]["id"];
}

  public function findById($id) {
      $da = new DA();
      $da->setSQL("SELECT * FROM users where id = ?;");
      $da->setParams([$id]);
      $da->runQuery();
      $this->id = $da->result[0]["id"];
      $this->name = $da->result[0]["name"];
      $this->email = $da->result[0]["email"];
      $this->password = $da->result[0]["password"];

      $da->setSQL("SELECT * FROM orders where user = ?;");
      $da->setParams([$id]);
      $da->runQuery();

      $this->orders = $da->result;

  }
}

?>
