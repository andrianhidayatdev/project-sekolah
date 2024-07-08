<?php

namespace App\Controller;

use App\Helper\View;


class HomeController
{

  function index()
  {
    View::render('home/dashboard', ['title' => "Dashboard"]);
  }
}
