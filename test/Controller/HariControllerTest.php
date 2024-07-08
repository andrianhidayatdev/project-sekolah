<?php

namespace Test\Controller;

use App\Controller\HariController;
use PHPUnit\Framework\TestCase;

class HariControllerTest extends TestCase
{
  private HariController $hariController;

  function setUp(): void
  {
    $this->hariController = new HariController();
  }

  function testIndex()
  {
    $this->hariController->index();
    $this->expectOutputRegex('[Master Hari]');
  }
}
