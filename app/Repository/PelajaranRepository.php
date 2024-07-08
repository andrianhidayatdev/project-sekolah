<?php

namespace App\Repository;

use App\Entity\Pelajaran;

class PelajaranRepository
{
  private \PDO $pdo;

  function __construct(\Pdo $connection)
  {
    $this->pdo = $connection;
  }

  function save(Pelajaran $pelajaran): Pelajaran
  {
    $statement = $this->pdo->prepare("INSERT INTO pelajaran (id_pelajaran,nama_pelajaran) VALUES(?,?)");
    $statement->execute([$pelajaran->getIdPelajaran(), $pelajaran->getNamaPelajaran()]);

    return $pelajaran;
  }

  function deleteById(string $id_pelajaran)
  {
    $this->pdo->exec("DELETE FROM pelajaran WHERE id_pelajaran = '$id_pelajaran'");
  }

  function deleteAll()
  {
    $this->pdo->exec("DELETE FROM pelajaran");
  }

  function findById(string $id_pelajaran): ?Pelajaran
  {
    $statement = $this->pdo->prepare("SELECT * FROM pelajaran WHERE id_pelajaran = ?");
    $statement->execute([$id_pelajaran]);

    try {
      $result = $statement->fetch();

      if ($result != null) {
        $pelajaran = new Pelajaran();
        $pelajaran->setIdPelajaran($result['id_pelajaran']);
        $pelajaran->setNamaPelajaran($result['nama_pelajaran']);
        return $pelajaran;
      }
    } finally {
      $statement->closeCursor();
    }
    return null;
  }

  function findAll(): ?array
  {
    $statement = $this->pdo->query("SELECT * FROM pelajaran");

    try {
      $result = $statement->fetchAll();

      if ($result != null) {
        $array = [];
        foreach ($result as $row) {
          $pelajaran = new Pelajaran();
          $pelajaran->setIdPelajaran($row['id_pelajaran']);
          $pelajaran->setNamaPelajaran($row['nama_pelajaran']);
          $array[] = $pelajaran;
        }
        return $array;
      }
    } finally {
      $statement->closeCursor();
    }
    return null;
  }

  function update(Pelajaran $pelajaran)
  {
    $statement = $this->pdo->prepare("UPDATE pelajaran SET nama_pelajaran = ? WHERE id_pelajaran = ?");
    $statement->execute([$pelajaran->getNamaPelajaran(), $pelajaran->getIdPelajaran()]);
  }
  function findMaxId(): ?string
  {
    $statement = $this->pdo->query("SELECT MAX(id_pelajaran) as max_id_pelajaran FROM pelajaran");
    $id_pelajaran = $statement->fetch();
    return $id_pelajaran['max_id_pelajaran'];
  }
}
