<?php

namespace App\Repository;

use App\Entity\Jurusan;

class JurusanRepository
{
  private \PDO $pdo;

  function __construct(\Pdo $connection)
  {
    $this->pdo = $connection;
  }

  function save(Jurusan $jurusan): Jurusan
  {
    $statement = $this->pdo->prepare("INSERT INTO jurusan (id_jurusan,nama_jurusan) VALUES(?,?)");
    $statement->execute([$jurusan->getIdJurusan(), $jurusan->getNamaJurusan()]);

    return $jurusan;
  }

  function deleteById(string $id_jurusan)
  {
    $this->pdo->exec("DELETE FROM jurusan WHERE id_jurusan = '$id_jurusan'");
  }

  function deleteAll()
  {
    $this->pdo->exec("DELETE FROM jurusan");
  }

  function findById(string $id_jurusan): ?Jurusan
  {
    $statement = $this->pdo->prepare("SELECT * FROM jurusan WHERE id_jurusan = ?");
    $statement->execute([$id_jurusan]);

    try {
      $result = $statement->fetch();

      if ($result != null) {
        $jurusan = new Jurusan();
        $jurusan->setIdJurusan($result['id_jurusan']);
        $jurusan->setNamaJurusan($result['nama_jurusan']);
        return $jurusan;
      }
    } finally {
      $statement->closeCursor();
    }
    return null;
  }

  function findAll(): ?array
  {
    $statement = $this->pdo->query("SELECT * FROM jurusan");

    try {
      $result = $statement->fetchAll();

      if ($result != null) {
        $array = [];
        foreach ($result as $row) {
          $jurusan = new Jurusan();
          $jurusan->setIdJurusan($row['id_jurusan']);
          $jurusan->setNamaJurusan($row['nama_jurusan']);
          $array[] = $jurusan;
        }
        return $array;
      }
    } finally {
      $statement->closeCursor();
    }
    return null;
  }

  function update(Jurusan $jurusan)
  {
    $statement = $this->pdo->prepare("UPDATE jurusan SET nama_jurusan = ? WHERE id_jurusan = ?");
    $statement->execute([$jurusan->getNamaJurusan(), $jurusan->getIdJurusan()]);
  }
  function findMaxId(): ?string
  {
    $statement = $this->pdo->query("SELECT MAX(id_jurusan) as max_id_jurusan FROM jurusan");
    $id_jurusan = $statement->fetch();
    return $id_jurusan['max_id_jurusan'];
  }
}
