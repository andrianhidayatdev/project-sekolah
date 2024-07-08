<?php

namespace App\Model;

use App\Config\Database;
use App\Helper\Generete;
use App\Repository\HariRepository;

class HariInputRequest
{
  private string $id_hari;
  private string $nama_hari;

  function __construct()
  {
    $hariRepository = new HariRepository(Database::getConnection());
    $maxIdHari = $hariRepository->findMaxId();


    $this->id_hari = Generete::Id("H", $maxIdHari);
  }

  public function getIdHari(): string
  {
    return $this->id_hari;
  }

  public function getNamaHari(): string
  {
    return $this->nama_hari;
  }

  public function setNamaHari(string $nama_hari): void
  {
    $this->nama_hari = $nama_hari;
  }
}
