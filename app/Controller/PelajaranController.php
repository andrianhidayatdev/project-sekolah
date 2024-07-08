<?php

namespace App\Controller;

use App\Config\Database;
use App\Entity\Pelajaran;
use App\Helper\Generete;
use App\Helper\View;
use App\Model\PelajaranInputRequest;
use App\Repository\PelajaranRepository;
use App\Service\PelajaranService;

class PelajaranController
{

  private PelajaranRepository $pelajaranRepository;
  private PelajaranService $pelajaranService;
  function __construct()
  {
    $this->pelajaranRepository = new PelajaranRepository(Database::getConnection());
    $this->pelajaranService = new PelajaranService($this->pelajaranRepository);
  }
  public function index()
  {

    $dataPelajaran = $this->pelajaranRepository->findAll();

    View::render('master/pelajaran/index', [
      'title' => 'Table Pelajaran ',
      'script' => [
        '/plugins/datatables/jquery.dataTables.min.js',
        '/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
        '/plugins/datatables-responsive/js/dataTables.responsive.min.js',
        '/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
        '/plugins/datatables-buttons/js/dataTables.buttons.min.js',
        '/plugins/datatables-buttons/js/buttons.bootstrap4.min.js',
        '/plugins/jszip/jszip.min.js',
        '/plugins/pdfmake/pdfmake.min.js',
        '/plugins/datatables-buttons/js/buttons.html5.min.js',
        '/plugins/datatables-buttons/js/buttons.print.min.js',
        '/plugins/pdfmake/pdfmake.min.js',
        '/plugins/datatables-buttons/js/buttons.colVis.min.js',
        '/resource/js/table.js'
      ],
      'data' => $dataPelajaran
    ]);
  }

  function tambahPelajaran()
  {
    $maxId = $this->pelajaranRepository->findMaxId();
    $newId = Generete::Id("PEL", $maxId);
    View::render("master/pelajaran/tambah", [
      'title' => "Tambah Pelajaran",
      'form' => [
        "id_pelajaran" => $newId
      ]
    ]);
  }

  function postTambahPelajaran()
  {
    $id_pelajaran = $_POST['id'];
    $nama_pelajaran = $_POST['nama'];

    try {
      $pelajaran = new PelajaranInputRequest();
      $pelajaran->setNamaPelajaran($nama_pelajaran);

      $this->pelajaranService->input($pelajaran);
      View::redirect('master/pelajaran');
    } catch (\Exception $e) {
      View::render(
        "master/pelajaran/tambah",
        [
          'title' => "Tambah Pelajaran",
          'error' => $e->getMessage(),
          'form' => [
            'id_pelajaran' => $id_pelajaran
          ]
        ]
      );
    }
  }

  function hapus($id)
  {
    $this->pelajaranRepository->deleteById($id);

    View::redirect('master/pelajaran');
  }
  function edit($id)
  {
    $pelajaran = $this->pelajaranRepository->findById($id);

    if ($pelajaran == null) {
      View::render("error/404", [
        'title' => "Not Found",
      ]);
    } else {
      View::render("master/pelajaran/edit", [
        'title' => "Edit Pelajaran",
        'form' => [
          'id_pelajaran' => $pelajaran->getIdPelajaran(),
          'nama_pelajaran' => $pelajaran->getNamaPelajaran(),
        ]
      ]);
    }
  }

  function postEdit($id)
  {
    $pelajaran = new Pelajaran();
    $pelajaran->setIdPelajaran($_POST['id']);
    $pelajaran->setNamaPelajaran($_POST['nama']);

    try {
      $this->pelajaranService->update($pelajaran);
      View::redirect('master/pelajaran');
    } catch (\Exception $e) {
      View::render(
        "master/pelajaran/edit",
        [
          'title' => "Edit Pelajaran",
          'error' => $e->getMessage(),
          'form' => [
            'id_pelajaran' => $pelajaran->getIdPelajaran(),
            'nama_pelajaran' => $pelajaran->getNamaPelajaran()
          ]
        ]

      );
    }
  }
}
