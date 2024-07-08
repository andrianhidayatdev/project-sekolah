<?php

namespace Test\Controller;

use App\Controller\HomeController;
use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
  private HomeController $homeController;

  function setUp(): void
  {
    $this->homeController = new HomeController();
  }

  function testIndex()
  {
    $this->markTestSkipped();

    $this->homeController->index();
    $this->expectOutputRegex('[Dashboard]');
    $this->expectOutputRegex('[body]');
    $this->expectOutputRegex('[sidebar]');
    $this->expectOutputRegex('[navbar]');
    $this->expectOutputRegex('[footer]');
  }
}
