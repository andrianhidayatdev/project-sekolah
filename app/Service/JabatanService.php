<?php

namespace App\Service;

use App\Entity\Jabatan;
use App\Exception\Validation;
use App\Model\JabatanInputRequest;
use App\Repository\JabatanRepository;

class JabatanService
{
  private JabatanRepository $jabatanRepository;

  function __construct(JabatanRepository $jabatanRepository)
  {
    $this->jabatanRepository = $jabatanRepository;
  }

  function input(JabatanInputRequest $request)
  {
    $this->inputValidation($request);

    $jabatan = new Jabatan();
    $jabatan->setIdJabatan($request->getIdJabatan());
    $jabatan->setNamaJabatan($request->getNamaJabatan());
    $this->jabatanRepository->save($jabatan);
  }

  function inputValidation(JabatanInputRequest $request)
  {
    if (trim($request->getIdJabatan()) == "" || trim($request->getNamaJabatan()) == "") {
      throw new Validation("Id atau nama Jabatan tidak boleh kosong");
    }
  }

  function update(Jabatan $request)
  {
    $this->updateValidation($request);
    $result = $this->jabatanRepository->findById($request->getIdJabatan());

    if ($request == null) {
      throw new Validation("Id tidak di ketahui");
    }

    $this->jabatanRepository->update($request);
  }

  function updateValidation(Jabatan $request)
  {
    if (trim($request->getIdJabatan()) == "" || trim($request->getNamaJabatan()) == "") {
      throw new Validation("Id atau nama Jabatan tidak boleh kosong");
    }
  }
}
