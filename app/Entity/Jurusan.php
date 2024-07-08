<?php

namespace App\Entity;

class Jurusan
{
  private string $id_jurusan;
  private string $nama_jurusan;

  public function getIdJurusan(): string
  {
    return $this->id_jurusan;
  }

  public function setIdJurusan(string $id_jurusan): void
  {
    $this->id_jurusan = $id_jurusan;
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
