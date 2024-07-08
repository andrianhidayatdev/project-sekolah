<?php

namespace App\Entity;

class Merk
{
  private string $id_merk;
  private string $nama_merk;

  public function getIdMerk(): string
  {
    return $this->id_merk;
  }

  public function setIdMerk(string $id_merk): void
  {
    $this->id_merk = $id_merk;
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
