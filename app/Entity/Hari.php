<?php

namespace App\Entity;

class Hari
{
  private string $id_hari;
  private string $nama_hari;

  public function getIdHari(): string
  {
    return $this->id_hari;
  }

  public function setIdHari(string $id_hari): void
  {
    $this->id_hari = $id_hari;
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
