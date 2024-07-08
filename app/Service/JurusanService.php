<?php

namespace App\Service;

use App\Entity\Jurusan;
use App\Exception\Validation;
use App\Model\JurusanInputRequest;
use App\Repository\JurusanRepository;

class JurusanService
{
  private JurusanRepository $jurusanRepository;

  function __construct(JurusanRepository $jurusanRepository)
  {
    $this->jurusanRepository = $jurusanRepository;
  }

  function input(JurusanInputRequest $request)
  {
    $this->inputValidation($request);

    $jurusan = new Jurusan();
    $jurusan->setIdJurusan($request->getIdJurusan());
    $jurusan->setNamaJurusan($request->getNamaJurusan());
    $this->jurusanRepository->save($jurusan);
  }

  function inputValidation(JurusanInputRequest $request)
  {
    if (trim($request->getIdJurusan()) == "" || trim($request->getNamaJurusan()) == "") {
      throw new Validation("Id atau nama Jurusan tidak boleh kosong");
    }
  }

  function update(Jurusan $request)
  {
    $this->updateValidation($request);
    $result = $this->jurusanRepository->findById($request->getIdJurusan());

    if ($request == null) {
      throw new Validation("Id tidak di ketahui");
    }

    $this->jurusanRepository->update($request);
  }

  function updateValidation(Jurusan $request)
  {
    if (trim($request->getIdJurusan()) == "" || trim($request->getNamaJurusan()) == "") {
      throw new Validation("Id atau nama Jurusan tidak boleh kosong");
    }
  }
}
