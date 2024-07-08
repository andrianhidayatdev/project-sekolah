<?php

namespace App\Entity;

class Pelajaran
{
  private string $id_pelajaran;
  private string $nama_pelajaran;

  public function getIdPelajaran(): string
  {
    return $this->id_pelajaran;
  }

  public function setIdPelajaran(string $id_pelajaran): void
  {
    $this->id_pelajaran = $id_pelajaran;
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
