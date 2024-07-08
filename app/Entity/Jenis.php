<?php

namespace App\Entity;

class Jenis
{
  private string $id_jenis;
  private string $nama_jenis;

  public function getIdJenis(): string
  {
    return $this->id_jenis;
  }

  public function setIdJenis(string $id_jenis): void
  {
    $this->id_jenis = $id_jenis;
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
