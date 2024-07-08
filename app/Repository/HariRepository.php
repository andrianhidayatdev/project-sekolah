<?php

namespace App\Repository;

use App\Entity\Hari;

class HariRepository
{
  private \PDO $pdo;

  function __construct(\Pdo $connection)
  {
    $this->pdo = $connection;
  }

  function save(Hari $hari): Hari
  {
    $statement = $this->pdo->prepare("INSERT INTO hari (id_hari,nama_hari) VALUES(?,?)");
    $statement->execute([$hari->getIdHari(), $hari->getNamaHari()]);

    return $hari;
  }

  function deleteById(string $id_hari)
  {
    $this->pdo->exec("DELETE FROM hari WHERE id_hari = '$id_hari'");
  }

  function deleteAll()
  {
    $this->pdo->exec("DELETE FROM hari");
  }

  function findById(string $id_hari): ?Hari
  {
    $statement = $this->pdo->prepare("SELECT * FROM hari WHERE id_hari = ?");
    $statement->execute([$id_hari]);

    try {
      $result = $statement->fetch();

      if ($result != null) {
        $hari = new Hari();
        $hari->setIdHari($result['id_hari']);
        $hari->setNamaHari($result['nama_hari']);
        return $hari;
      }
    } finally {
      $statement->closeCursor();
    }
    return null;
  }

  function findAll(): ?array
  {
    $statement = $this->pdo->query("SELECT * FROM hari");

    try {
      $result = $statement->fetchAll();

      if ($result != null) {
        $array = [];
        foreach ($result as $row) {
          $hari = new Hari();
          $hari->setIdHari($row['id_hari']);
          $hari->setNamaHari($row['nama_hari']);
          $array[] = $hari;
        }
        return $array;
      }
    } finally {
      $statement->closeCursor();
    }
    return null;
  }

  function update(Hari $hari)
  {
    $statement = $this->pdo->prepare("UPDATE hari SET nama_hari = ? WHERE id_hari = ?");
    $statement->execute([$hari->getNamaHari(), $hari->getIdHari()]);
  }
  function findMaxId(): ?string
  {
    $statement = $this->pdo->query("SELECT MAX(id_hari) as max_id_hari FROM hari");
    $id_hari = $statement->fetch();
    return $id_hari['max_id_hari'];
  }
}
