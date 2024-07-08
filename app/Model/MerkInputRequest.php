<?php

namespace App\Model;

use App\Config\Database;
use App\Helper\Generete;
use App\Repository\MerkRepository;

class MerkInputRequest
{
  private string $id_merk;
  private string $nama_merk;

  function __construct()
  {
    $merkRepository = new MerkRepository(Database::getConnection());
    $maxIdMerk = $merkRepository->findMaxId();


    $this->id_merk = Generete::Id("MRK", $maxIdMerk);
  }

  public function getIdMerk(): string
  {
    return $this->id_merk;
  }

  public function getNamaMerk(): string
  {
    return $this->nama_merk;
  }

  public function setNamaMerk(string $nama_merk): void
  {
    $this->nama_merk = $nama_merk;
  }
}
