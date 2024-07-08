<?php

namespace App\Repository;

use App\Entity\Jabatan;

class JabatanRepository
{
  private \PDO $pdo;

  function __construct(\Pdo $connection)
  {
    $this->pdo = $connection;
  }

  function save(Jabatan $jabatan): Jabatan
  {
    $statement = $this->pdo->prepare("INSERT INTO jabatan (id_jabatan,nama_jabatan) VALUES(?,?)");
    $statement->execute([$jabatan->getIdJabatan(), $jabatan->getNamaJabatan()]);

    return $jabatan;
  }

  function deleteById(string $id_jabatan)
  {
    $this->pdo->exec("DELETE FROM jabatan WHERE id_jabatan = '$id_jabatan'");
  }

  function deleteAll()
  {
    $this->pdo->exec("DELETE FROM jabatan");
  }

  function findById(string $id_jabatan): ?Jabatan
  {
    $statement = $this->pdo->prepare("SELECT * FROM jabatan WHERE id_jabatan = ?");
    $statement->execute([$id_jabatan]);

    try {
      $result = $statement->fetch();

      if ($result != null) {
        $jabatan = new Jabatan();
        $jabatan->setIdJabatan($result['id_jabatan']);
        $jabatan->setNamaJabatan($result['nama_jabatan']);
        return $jabatan;
      }
    } finally {
      $statement->closeCursor();
    }
    return null;
  }

  function findAll(): ?array
  {
    $statement = $this->pdo->query("SELECT * FROM jabatan");

    try {
      $result = $statement->fetchAll();

      if ($result != null) {
        $array = [];
        foreach ($result as $row) {
          $jabatan = new Jabatan();
          $jabatan->setIdJabatan($row['id_jabatan']);
          $jabatan->setNamaJabatan($row['nama_jabatan']);
          $array[] = $jabatan;
        }
        return $array;
      }
    } finally {
      $statement->closeCursor();
    }
    return null;
  }

  function update(Jabatan $jabatan)
  {
    $statement = $this->pdo->prepare("UPDATE jabatan SET nama_jabatan = ? WHERE id_jabatan = ?");
    $statement->execute([$jabatan->getNamaJabatan(), $jabatan->getIdJabatan()]);
  }

  function findMaxId(): ?string
  {
    $statement = $this->pdo->query("SELECT MAX(id_jabatan) as max_id_jabatan FROM jabatan");
    $id_jabatan = $statement->fetch();
    return $id_jabatan['max_id_jabatan'];
  }
}
