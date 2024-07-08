<?php

namespace App\Service;

use App\Entity\Warna;
use App\Exception\Validation;
use App\Model\WarnaInputRequest;
use App\Repository\WarnaRepository;

class WarnaService
{
  private WarnaRepository $warnaRepository;

  function __construct(WarnaRepository $warnaRepository)
  {
    $this->warnaRepository = $warnaRepository;
  }

  function input(WarnaInputRequest $request)
  {
    $this->inputValidation($request);

    $warna = new Warna();
    $warna->setIdWarna($request->getIdWarna());
    $warna->setNamaWarna($request->getNamaWarna());
    $this->warnaRepository->save($warna);
  }

  function inputValidation(WarnaInputRequest $request)
  {
    if (trim($request->getIdWarna()) == "" || trim($request->getNamaWarna()) == "") {
      throw new Validation("Id atau nama Warna tidak boleh kosong");
    }
  }

  function update(Warna $request)
  {
    $this->updateValidation($request);
    $result = $this->warnaRepository->findById($request->getIdWarna());

    if ($request == null) {
      throw new Validation("Id tidak di ketahui");
    }

    $this->warnaRepository->update($request);
  }

  function updateValidation(Warna $request)
  {
    if (trim($request->getIdWarna()) == "" || trim($request->getNamaWarna()) == "") {
      throw new Validation("Id atau nama Warna tidak boleh kosong");
    }
  }
}
