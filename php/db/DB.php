<?php

class DB {
  private static $_instance = null;

  private $_pdo,
          $_query,
          $_error = false,
          $results,
          $_count = 0;

  private function __construct() {
    try {
      $this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
      //echo "Success";
    }
    catch(PDOException $e) {
      die($e->getMessage());
    }
  }

  public static function getInstance() {
    if(!isset(self::$_instance)) {
      self::$_instance = new DB();
    }

    return self::$_instance;
  }


  public function query($sql, $params = array()) {
    $this->_error = false;

    if($this->_query = $this->_pdo->prepare($sql)) {
      $x = 1;
      if(count($params)) {
        foreach ($params as $param) {
          $this->_query->bindValue($x, $param);

          $x++;
        }
      }

      if($this->_query->execute()) {
        $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
        $this->_count = $this->_query->rowCount();
      }
      else {
        $this->error = true;
      }
    }

    return $this;
  }


  public function getError() {
    return $this->_error;
  }

  public function getCount() {
    return $this->_count;
  }

  public function getResults() {
    return $this->_results;
  }
}
