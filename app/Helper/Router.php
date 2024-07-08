<?php

namespace App\Helper;


class Router
{
  private static array $routes = [];
  static function add(
    string $method,
    string $path,
    string $controller,
    string $function,
  ) {
    self::$routes[] = [
      'method' => $method,
      'path' => $path,
      'controller' => $controller,
      'function' => $function,
    ];
  }

  static function run()
  {
    $path = '/';

    if (isset($_SERVER['PATH_INFO'])) {
      $path = $_SERVER['PATH_INFO'];
    }


    $method = $_SERVER['REQUEST_METHOD'];

    foreach (self::$routes as $route) {


      $pattern = "#^" . $route['path'] . "$#";

      if (preg_match($pattern, $path, $variables) && $method == $route['method']) {
        $function = $route['function'];
        $controller = new $route['controller'];
        // $controller->$function();

        array_shift($variables);
        call_user_func_array([$controller, $function], $variables);

        return;
      }
    }
    http_response_code(404);
    View::render('Error/404', ['title' => "Not Found"]);
  }
}
