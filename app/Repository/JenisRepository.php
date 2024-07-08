<?php

namespace App\Repository;

use App\Entity\Jenis;

class JenisRepository
{
  private \PDO $pdo;

  function __construct(\Pdo $connection)
  {
    $this->pdo = $connection;
  }

  function save(Jenis $jenis): Jenis
  {
    $statement = $this->pdo->prepare("INSERT INTO jenis (id_jenis,nama_jenis) VALUES(?,?)");
    $statement->execute([$jenis->getIdJenis(), $jenis->getNamaJenis()]);

    return $jenis;
  }

  function deleteById(string $id_jenis)
  {
    $this->pdo->exec("DELETE FROM jenis WHERE id_jenis = '$id_jenis'");
  }

  function deleteAll()
  {
    $this->pdo->exec("DELETE FROM jenis");
  }

  function findById(string $id_jenis): ?Jenis
  {
    $statement = $this->pdo->prepare("SELECT * FROM jenis WHERE id_jenis = ?");
    $statement->execute([$id_jenis]);

    try {
      $result = $statement->fetch();

      if ($result != null) {
        $jenis = new Jenis();
        $jenis->setIdJenis($result['id_jenis']);
        $jenis->setNamaJenis($result['nama_jenis']);
        return $jenis;
      }
    } finally {
      $statement->closeCursor();
    }
    return null;
  }

  function findAll(): ?array
  {
    $statement = $this->pdo->query("SELECT * FROM jenis");

    try {
      $result = $statement->fetchAll();

      if ($result != null) {
        $array = [];
        foreach ($result as $row) {
          $jenis = new Jenis();
          $jenis->setIdJenis($row['id_jenis']);
          $jenis->setNamaJenis($row['nama_jenis']);
          $array[] = $jenis;
        }
        return $array;
      }
    } finally {
      $statement->closeCursor();
    }
    return null;
  }

  function update(Jenis $jenis)
  {
    $statement = $this->pdo->prepare("UPDATE jenis SET nama_jenis = ? WHERE id_jenis = ?");
    $statement->execute([$jenis->getNamaJenis(), $jenis->getIdJenis()]);
  }
  function findMaxId(): ?string
  {
    $statement = $this->pdo->query("SELECT MAX(id_jenis) as max_id_jenis FROM jenis");
    $id_jenis = $statement->fetch();
    return $id_jenis['max_id_jenis'];
  }
}
