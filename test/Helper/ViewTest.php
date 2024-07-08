<?php

namespace Test\Helper;

require_once __DIR__ . '/../Tools/View.php';

use PHPUnit\Framework\TestCase;
use App\Helper\View;

class ViewTest extends TestCase
{


  function testRender()
  {
    $this->markTestSkipped();
    View::render('Home/dashboard', ['title' => 'Dashboard']);
  }

  function testHeader()
  {
    putenv("mode=test");
    View::redirect('');

    $this->expectOutputRegex('[Location: /]');
  }
}
