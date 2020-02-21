<?php

  class DA {
    private $conn;
    public $sql;
    public $params;
    public $result;

    public function __construct() {
      $this -> conn = new PDO(
        "mysql:host=127.0.0.1;dbname=student_db_happen",
        "student8_mysql",
        "TwinLeagueLittle"
      );
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function setSQL($s) {
      $this -> sql = $s;
    }

    public function setParams ($a) {
      $this->params = $a;
    }

    public function runQuery() {
      $stmt = $this->conn->prepare($this->sql);

      $i = 1;
      foreach($this->params as &$param) {
        $stmt->bindParam($i, $param);
        $i++;
      }
    $stmt->execute();
    $this->result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
