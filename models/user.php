<?php

class User {
  public $id;
  public $name;
  public $email;
  public $password;
  public $orders;

public function __construct() {}

  public function signIn($e, $p) {
    global $app;

    $app->signOut();
    $da = new DA();
    $da->setSQL("SELECT * FROM users where email = ? and password = ?");
    $da->setParams([$e, $p]);
    $da->runQuery();
    if(!empty($da->result)) {
      $app->signIn($da->result[0]["id"]);
    } else {
      // We did not find a matching user in the database
      throw new SignInException();
    }
}

  // finds user in db, with specified id
  // if it finds one, it will all the properties above
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


public function signUp($name, $email, $password) {
  $da = new DA();
  $da->setSQL("INSERT INTO users (name, email, password) VALUES (?, ?, ?);");
  $da->setParams([$name, $email, $password]);
  $da->runQuery();
  }
}
?>
