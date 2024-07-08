<?php

namespace App\Service;

use App\Entity\Hari;
use App\Exception\Validation;
use App\Model\HariInputRequest;
use App\Repository\HariRepository;

class HariService
{
  private HariRepository $hariRepository;

  function __construct(HariRepository $hariRepository)
  {
    $this->hariRepository = $hariRepository;
  }

  function input(HariInputRequest $request)
  {
    $this->inputValidation($request);

    $hari = new Hari();
    $hari->setIdHari($request->getIdHari());
    $hari->setNamaHari($request->getNamaHari());
    $this->hariRepository->save($hari);
  }

  function inputValidation(HariInputRequest $request)
  {
    if (trim($request->getIdHari()) == "" || trim($request->getNamaHari()) == "") {
      throw new Validation("Id atau nama Hari tidak boleh kosong");
    }
  }

  function update(Hari $request)
  {
    $this->updateValidation($request);
    $result = $this->hariRepository->findById($request->getIdHari());

    if ($request == null) {
      throw new Validation("Id tidak di ketahui");
    }

    $this->hariRepository->update($request);
  }

  function updateValidation(Hari $request)
  {
    if (trim($request->getIdHari()) == "" || trim($request->getNamaHari()) == "") {
      throw new Validation("Id atau nama Hari tidak boleh kosong");
    }
  }
}
