<?php

namespace App\Model;

use App\Config\Database;
use App\Helper\Generete;
use App\Repository\JenisRepository;

class JenisInputRequest
{
  private string $id_jenis;
  private string $nama_jenis;

  function __construct()
  {
    $jenisRepository = new JenisRepository(Database::getConnection());
    $maxIdJenis = $jenisRepository->findMaxId();


    $this->id_jenis = Generete::Id("JNS", $maxIdJenis);
  }

  public function getIdJenis(): string
  {
    return $this->id_jenis;
  }

  public function getNamaJenis(): string
  {
    return $this->nama_jenis;
  }

  public function setNamaJenis(string $nama_jenis): void
  {
    $this->nama_jenis = $nama_jenis;
  }
}
