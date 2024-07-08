<?php

namespace App\Model;

use App\Config\Database;
use App\Helper\Generete;
use App\Repository\JurusanRepository;

class JurusanInputRequest
{
  private string $id_jurusan;
  private string $nama_jurusan;

  function __construct()
  {
    $jurusanRepository = new JurusanRepository(Database::getConnection());
    $maxIdJurusan = $jurusanRepository->findMaxId();


    $this->id_jurusan = Generete::Id("JUR", $maxIdJurusan);
  }

  public function getIdJurusan(): string
  {
    return $this->id_jurusan;
  }

  public function getNamaJurusan(): string
  {
    return $this->nama_jurusan;
  }

  public function setNamaJurusan(string $nama_jurusan): void
  {
    $this->nama_jurusan = $nama_jurusan;
  }
}
