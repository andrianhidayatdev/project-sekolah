<?php

namespace App\Model;

use App\Config\Database;
use App\Helper\Generete;
use App\Repository\WarnaRepository;

class WarnaInputRequest
{
  private string $id_warna;
  private string $nama_warna;

  function __construct()
  {
    $warnaRepository = new WarnaRepository(Database::getConnection());
    $maxIdWarna = $warnaRepository->findMaxId();


    $this->id_warna = Generete::Id("WRN", $maxIdWarna);
  }

  public function getIdWarna(): string
  {
    return $this->id_warna;
  }

  public function getNamaWarna(): string
  {
    return $this->nama_warna;
  }

  public function setNamaWarna(string $nama_warna): void
  {
    $this->nama_warna = $nama_warna;
  }
}
