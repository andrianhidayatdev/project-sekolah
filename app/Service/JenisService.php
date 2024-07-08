<?php

namespace App\Service;

use App\Entity\Jenis;
use App\Exception\Validation;
use App\Model\JenisInputRequest;
use App\Repository\JenisRepository;

class JenisService
{
  private JenisRepository $jenisRepository;

  function __construct(JenisRepository $jenisRepository)
  {
    $this->jenisRepository = $jenisRepository;
  }

  function input(JenisInputRequest $request)
  {
    $this->inputValidation($request);

    $jenis = new Jenis();
    $jenis->setIdJenis($request->getIdJenis());
    $jenis->setNamaJenis($request->getNamaJenis());
    $this->jenisRepository->save($jenis);
  }

  function inputValidation(JenisInputRequest $request)
  {
    if (trim($request->getIdJenis()) == "" || trim($request->getNamaJenis()) == "") {
      throw new Validation("Id atau nama Jenis tidak boleh kosong");
    }
  }

  function update(Jenis $request)
  {
    $this->updateValidation($request);
    $result = $this->jenisRepository->findById($request->getIdJenis());

    if ($request == null) {
      throw new Validation("Id tidak di ketahui");
    }

    $this->jenisRepository->update($request);
  }

  function updateValidation(Jenis $request)
  {
    if (trim($request->getIdJenis()) == "" || trim($request->getNamaJenis()) == "") {
      throw new Validation("Id atau nama Jenis tidak boleh kosong");
    }
  }
}
