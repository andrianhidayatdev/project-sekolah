<?php

namespace App\Helper;

class Generete
{
  static function Id($huruf, $maxId): string
  {
    if ($maxId != null) {
      $number = (int) substr($maxId, strlen($huruf)) + 1;
      $newIdHari =  $huruf . str_pad($number, 3, '0', STR_PAD_LEFT);
      return $newIdHari;
    }

    $newIdHari =  $huruf . str_pad(1, 3, '0', STR_PAD_LEFT);
    return $newIdHari;
  }
}
