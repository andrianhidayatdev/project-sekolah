<?php

namespace App\Helper;

define("BASEURL", $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);

class View
{
  static function render(string $view, array $model)
  {

    require_once __DIR__ . '/../View/templates/header.php';
    require_once __DIR__ . '/../View/templates/navbar.php';
    require_once __DIR__ . '/../View/templates/sidebar.php';
    require_once __DIR__ . '/../View/' . $view . '.php';
    require_once __DIR__ . '/../View/templates/footer.php';
  }

  public  static function redirect(string $url)
  {
    header("Location: /$url");
    if (getenv('mode') != "test") {
      exit();
    }
  }
}
