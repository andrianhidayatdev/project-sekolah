<?php

namespace App\Model;

use App\Config\Database;
use App\Helper\Generete;
use App\Repository\JabatanRepository;

class JabatanInputRequest
{
  private string $id_jabatan;
  private string $nama_jabatan;

  function __construct()
  {
    $jabatanRepository = new JabatanRepository(Database::getConnection());
    $maxIdJabatan = $jabatanRepository->findMaxId();

    $this->id_jabatan = Generete::Id("JAB", $maxIdJabatan);
  }

  public function getIdJabatan(): string
  {
    return $this->id_jabatan;
  }

  public function getNamaJabatan(): string
  {
    return $this->nama_jabatan;
  }

  public function setNamaJabatan(string $nama_jabatan): void
  {
    $this->nama_jabatan = $nama_jabatan;
  }
}
