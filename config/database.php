<?php

function getConfigDatabase(): array
{
  return [
    "database" => [
      "test" => [
        "url" => "mysql:host=localhost:3306;dbname=",
        "dbname" => "db_sekolah_test",
        "username" => "root",
        "password" => ""
      ],
      "prod" => [
        "url" => "mysql:host=localhost:3306;dbname=",
        "dbname" => "db_sekolah",
        "username" => "root",
        "password" => ""
      ]
    ]
  ];
}
