<?php

namespace App\Service;

use App\Entity\Merk;
use App\Exception\Validation;
use App\Model\MerkInputRequest;
use App\Repository\MerkRepository;

class MerkService
{
  private MerkRepository $merkRepository;

  function __construct(MerkRepository $merkRepository)
  {
    $this->merkRepository = $merkRepository;
  }

  function input(MerkInputRequest $request)
  {
    $this->inputValidation($request);

    $merk = new Merk();
    $merk->setIdMerk($request->getIdMerk());
    $merk->setNamaMerk($request->getNamaMerk());
    $this->merkRepository->save($merk);
  }

  function inputValidation(MerkInputRequest $request)
  {
    if (trim($request->getIdMerk()) == "" || trim($request->getNamaMerk()) == "") {
      throw new Validation("Id atau nama Merk tidak boleh kosong");
    }
  }

  function update(Merk $request)
  {
    $this->updateValidation($request);
    $result = $this->merkRepository->findById($request->getIdMerk());

    if ($request == null) {
      throw new Validation("Id tidak di ketahui");
    }

    $this->merkRepository->update($request);
  }

  function updateValidation(Merk $request)
  {
    if (trim($request->getIdMerk()) == "" || trim($request->getNamaMerk()) == "") {
      throw new Validation("Id atau nama Merk tidak boleh kosong");
    }
  }
}
