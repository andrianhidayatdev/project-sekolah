<?php

namespace App\Repository;

use App\Entity\Warna;

class WarnaRepository
{
  private \PDO $pdo;

  function __construct(\Pdo $connection)
  {
    $this->pdo = $connection;
  }

  function save(Warna $warna): Warna
  {
    $statement = $this->pdo->prepare("INSERT INTO warna (id_warna,nama_warna) VALUES(?,?)");
    $statement->execute([$warna->getIdWarna(), $warna->getNamaWarna()]);

    return $warna;
  }

  function deleteById(string $id_warna)
  {
    $this->pdo->exec("DELETE FROM warna WHERE id_warna = '$id_warna'");
  }

  function deleteAll()
  {
    $this->pdo->exec("DELETE FROM warna");
  }

  function findById(string $id_warna): ?Warna
  {
    $statement = $this->pdo->prepare("SELECT * FROM warna WHERE id_warna = ?");
    $statement->execute([$id_warna]);

    try {
      $result = $statement->fetch();

      if ($result != null) {
        $warna = new Warna();
        $warna->setIdWarna($result['id_warna']);
        $warna->setNamaWarna($result['nama_warna']);
        return $warna;
      }
    } finally {
      $statement->closeCursor();
    }
    return null;
  }

  function findAll(): ?array
  {
    $statement = $this->pdo->query("SELECT * FROM warna");

    try {
      $result = $statement->fetchAll();

      if ($result != null) {
        $array = [];
        foreach ($result as $row) {
          $warna = new Warna();
          $warna->setIdWarna($row['id_warna']);
          $warna->setNamaWarna($row['nama_warna']);
          $array[] = $warna;
        }
        return $array;
      }
    } finally {
      $statement->closeCursor();
    }
    return null;
  }

  function update(Warna $warna)
  {
    $statement = $this->pdo->prepare("UPDATE warna SET nama_warna = ? WHERE id_warna = ?");
    $statement->execute([$warna->getNamaWarna(), $warna->getIdWarna()]);
  }
  function findMaxId(): ?string
  {
    $statement = $this->pdo->query("SELECT MAX(id_warna) as max_id_warna FROM warna");
    $id_warna = $statement->fetch();
    return $id_warna['max_id_warna'];
  }
}
