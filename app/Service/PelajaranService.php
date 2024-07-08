<?php

namespace App\Service;

use App\Entity\Pelajaran;
use App\Exception\Validation;
use App\Model\PelajaranInputRequest;
use App\Repository\PelajaranRepository;

class PelajaranService
{
  private PelajaranRepository $pelajaranRepository;

  function __construct(PelajaranRepository $pelajaranRepository)
  {
    $this->pelajaranRepository = $pelajaranRepository;
  }

  function input(PelajaranInputRequest $request)
  {
    $this->inputValidation($request);

    $pelajaran = new Pelajaran();
    $pelajaran->setIdPelajaran($request->getIdPelajaran());
    $pelajaran->setNamaPelajaran($request->getNamaPelajaran());
    $this->pelajaranRepository->save($pelajaran);
  }

  function inputValidation(PelajaranInputRequest $request)
  {
    if (trim($request->getIdPelajaran()) == "" || trim($request->getNamaPelajaran()) == "") {
      throw new Validation("Id atau nama Pelajaran tidak boleh kosong");
    }
  }

  function update(Pelajaran $request)
  {
    $this->updateValidation($request);
    $result = $this->pelajaranRepository->findById($request->getIdPelajaran());

    if ($request == null) {
      throw new Validation("Id tidak di ketahui");
    }

    $this->pelajaranRepository->update($request);
  }

  function updateValidation(Pelajaran $request)
  {
    if (trim($request->getIdPelajaran()) == "" || trim($request->getNamaPelajaran()) == "") {
      throw new Validation("Id atau nama Pelajaran tidak boleh kosong");
    }
  }
}
