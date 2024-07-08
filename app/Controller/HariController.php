<?php

namespace App\Controller;

use App\Config\Database;
use App\Entity\Hari;
use App\Helper\Generete;
use App\Helper\View;
use App\Model\HariInputRequest;
use App\Repository\HariRepository;
use App\Service\HariService;

class HariController
{

  private HariRepository $hariRepository;
  private HariService $hariService;
  function __construct()
  {
    $this->hariRepository = new HariRepository(Database::getConnection());
    $this->hariService = new HariService($this->hariRepository);
  }
  public function index()
  {

    $dataHari = $this->hariRepository->findAll();

    View::render('master/hari/index', [
      'title' => 'Table Hari ',
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
      'data' => $dataHari
    ]);
  }

  function tambahHari()
  {
    $maxId = $this->hariRepository->findMaxId();
    $newId = Generete::Id("H", $maxId);
    View::render("master/hari/tambah", [
      'title' => "Tambah Hari",
      'form' => [
        "id_hari" => $newId
      ]
    ]);
  }

  function postTambahHari()
  {
    $id_hari = $_POST['id'];
    $nama_hari = $_POST['nama'];

    try {
      $hari = new HariInputRequest();
      $hari->setNamaHari($nama_hari);

      $this->hariService->input($hari);
      View::redirect('master/hari');
    } catch (\Exception $e) {
      View::render(
        "master/hari/tambah",
        [
          'title' => "Tambah Hari",
          'error' => $e->getMessage(),
          'form' => [
            'id_hari' => $id_hari
          ]
        ]
      );
    }
  }

  function hapus($id)
  {
    $this->hariRepository->deleteById($id);

    View::redirect('master/hari');
  }
  function edit($id)
  {
    $hari = $this->hariRepository->findById($id);

    if ($hari == null) {
      View::render("error/404", [
        'title' => "Not Found",
      ]);
    } else {
      View::render("master/hari/edit", [
        'title' => "Edit Hari",
        'form' => [
          'id_hari' => $hari->getIdHari(),
          'nama_hari' => $hari->getNamaHari(),
        ]
      ]);
    }
  }

  function postEdit($id)
  {
    $hari = new Hari();
    $hari->setIdHari($_POST['id']);
    $hari->setNamaHari($_POST['nama']);

    try {
      $this->hariService->update($hari);
      View::redirect('master/hari');
    } catch (\Exception $e) {
      View::render(
        "master/hari/edit",
        [
          'title' => "Edit Hari",
          'error' => $e->getMessage(),
          'form' => [
            'id_hari' => $hari->getIdHari(),
            'nama_hari' => $hari->getNamaHari()
          ]
        ]

      );
    }
  }
}
