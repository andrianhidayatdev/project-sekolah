<?php

namespace App\Entity;

class Jabatan
{
  private string $id_jabatan;
  private string $nama_jabatan;

  public function getIdJabatan(): string
  {
    return $this->id_jabatan;
  }

  public function setIdJabatan(string $id_jabatan): void
  {
    $this->id_jabatan = $id_jabatan;
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
