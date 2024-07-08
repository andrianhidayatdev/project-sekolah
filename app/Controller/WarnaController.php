<?php

namespace App\Controller;

use App\Config\Database;
use App\Entity\Warna;
use App\Helper\Generete;
use App\Helper\View;
use App\Model\WarnaInputRequest;
use App\Repository\WarnaRepository;
use App\Service\WarnaService;

class WarnaController
{

  private WarnaRepository $warnaRepository;
  private WarnaService $warnaService;
  function __construct()
  {
    $this->warnaRepository = new WarnaRepository(Database::getConnection());
    $this->warnaService = new WarnaService($this->warnaRepository);
  }
  public function index()
  {

    $dataWarna = $this->warnaRepository->findAll();

    View::render('master/warna/index', [
      'title' => 'Table Warna ',
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
      'data' => $dataWarna
    ]);
  }

  function tambahWarna()
  {
    $maxId = $this->warnaRepository->findMaxId();
    $newId = Generete::Id("WRN", $maxId);
    View::render("master/warna/tambah", [
      'title' => "Tambah Warna",
      'form' => [
        "id_warna" => $newId
      ]
    ]);
  }

  function postTambahWarna()
  {
    $id_warna = $_POST['id'];
    $nama_warna = $_POST['nama'];

    try {
      $warna = new WarnaInputRequest();
      $warna->setNamaWarna($nama_warna);

      $this->warnaService->input($warna);
      View::redirect('master/warna');
    } catch (\Exception $e) {
      View::render(
        "master/warna/tambah",
        [
          'title' => "Tambah Warna",
          'error' => $e->getMessage(),
          'form' => [
            'id_warna' => $id_warna
          ]
        ]
      );
    }
  }

  function hapus($id)
  {
    $this->warnaRepository->deleteById($id);

    View::redirect('master/warna');
  }
  function edit($id)
  {
    $warna = $this->warnaRepository->findById($id);

    if ($warna == null) {
      View::render("error/404", [
        'title' => "Not Found",
      ]);
    } else {
      View::render("master/warna/edit", [
        'title' => "Edit Warna",
        'form' => [
          'id_warna' => $warna->getIdWarna(),
          'nama_warna' => $warna->getNamaWarna(),
        ]
      ]);
    }
  }

  function postEdit($id)
  {
    $warna = new Warna();
    $warna->setIdWarna($_POST['id']);
    $warna->setNamaWarna($_POST['nama']);

    try {
      $this->warnaService->update($warna);
      View::redirect('master/warna');
    } catch (\Exception $e) {
      View::render(
        "master/warna/edit",
        [
          'title' => "Edit Warna",
          'error' => $e->getMessage(),
          'form' => [
            'id_warna' => $warna->getIdWarna(),
            'nama_warna' => $warna->getNamaWarna()
          ]
        ]

      );
    }
  }
}
