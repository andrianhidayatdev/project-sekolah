<?php

namespace App\Entity;

class Warna
{
  private string $id_warna;
  private string $nama_warna;

  public function getIdWarna(): string
  {
    return $this->id_warna;
  }

  public function setIdWarna(string $id_warna): void
  {
    $this->id_warna = $id_warna;
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
