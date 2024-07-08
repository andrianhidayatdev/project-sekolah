<?php

namespace App\Repository;

use App\Entity\Merk;

class MerkRepository
{
  private \PDO $pdo;

  function __construct(\Pdo $connection)
  {
    $this->pdo = $connection;
  }

  function save(Merk $merk): Merk
  {
    $statement = $this->pdo->prepare("INSERT INTO merk (id_merk,nama_merk) VALUES(?,?)");
    $statement->execute([$merk->getIdMerk(), $merk->getNamaMerk()]);

    return $merk;
  }

  function deleteById(string $id_merk)
  {
    $this->pdo->exec("DELETE FROM merk WHERE id_merk = '$id_merk'");
  }

  function deleteAll()
  {
    $this->pdo->exec("DELETE FROM merk");
  }

  function findById(string $id_merk): ?Merk
  {
    $statement = $this->pdo->prepare("SELECT * FROM merk WHERE id_merk = ?");
    $statement->execute([$id_merk]);

    try {
      $result = $statement->fetch();

      if ($result != null) {
        $merk = new Merk();
        $merk->setIdMerk($result['id_merk']);
        $merk->setNamaMerk($result['nama_merk']);
        return $merk;
      }
    } finally {
      $statement->closeCursor();
    }
    return null;
  }

  function findAll(): ?array
  {
    $statement = $this->pdo->query("SELECT * FROM merk");

    try {
      $result = $statement->fetchAll();

      if ($result != null) {
        $array = [];
        foreach ($result as $row) {
          $merk = new Merk();
          $merk->setIdMerk($row['id_merk']);
          $merk->setNamaMerk($row['nama_merk']);
          $array[] = $merk;
        }
        return $array;
      }
    } finally {
      $statement->closeCursor();
    }
    return null;
  }

  function update(Merk $merk)
  {
    $statement = $this->pdo->prepare("UPDATE merk SET nama_merk = ? WHERE id_merk = ?");
    $statement->execute([$merk->getNamaMerk(), $merk->getIdMerk()]);
  }
  function findMaxId(): ?string
  {
    $statement = $this->pdo->query("SELECT MAX(id_merk) as max_id_merk FROM merk");
    $id_merk = $statement->fetch();
    return $id_merk['max_id_merk'];
  }
}
