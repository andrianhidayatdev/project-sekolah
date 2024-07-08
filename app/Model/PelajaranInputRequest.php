<?php

namespace App\Model;

use App\Config\Database;
use App\Helper\Generete;
use App\Repository\PelajaranRepository;

class PelajaranInputRequest
{
  private string $id_pelajaran;
  private string $nama_pelajaran;

  function __construct()
  {
    $pelajaranRepository = new PelajaranRepository(Database::getConnection());
    $maxIdPelajaran = $pelajaranRepository->findMaxId();


    $this->id_pelajaran = Generete::Id("PEL", $maxIdPelajaran);
  }

  public function getIdPelajaran(): string
  {
    return $this->id_pelajaran;
  }

  public function getNamaPelajaran(): string
  {
    return $this->nama_pelajaran;
  }

  public function setNamaPelajaran(string $nama_pelajaran): void
  {
    $this->nama_pelajaran = $nama_pelajaran;
  }
}
