<?php

namespace Test\Config;

use App\Config\Database;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
  function testGetConnection()
  {
    $connection = Database::getConnection();

    $this->assertNotNull($connection);
  }

  function testGetConnectionSingleton()
  {
    $connection1 = Database::getConnection();
    $connection2 = Database::getConnection();

    $this->assertSame($connection1, $connection2);
  }
}
