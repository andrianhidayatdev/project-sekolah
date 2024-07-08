<?php

namespace App\Config;

use PDO;

class Database
{
  private static ?\PDO $pdo = null;

  static function  getConnection(string $env = "test"): PDO
  {
    if (self::$pdo == null) {
      require_once __DIR__ . '/../../config/database.php';

      $config = getConfigDatabase();

      $dsn = $config['database'][$env]['url'] . $config['database'][$env]['dbname'];
      $username = $config['database'][$env]['username'];
      $password = $config['database'][$env]['password'];

      self::$pdo = new PDO($dsn, $username, $password);
    }

    return self::$pdo;
  }

  static function beginTransaction()
  {
    self::$pdo->beginTransaction();
  }


  static function commitTransaction()
  {
    self::$pdo->commit();
  }


  static function rollbackTransaction()
  {
    self::$pdo->rollBack();
  }
}
