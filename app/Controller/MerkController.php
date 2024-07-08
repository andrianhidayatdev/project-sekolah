<?php

namespace App\Controller;

use App\Config\Database;
use App\Entity\Merk;
use App\Helper\Generete;
use App\Helper\View;
use App\Model\MerkInputRequest;
use App\Repository\MerkRepository;
use App\Service\MerkService;

class MerkController
{

  private MerkRepository $merkRepository;
  private MerkService $merkService;
  function __construct()
  {
    $this->merkRepository = new MerkRepository(Database::getConnection());
    $this->merkService = new MerkService($this->merkRepository);
  }
  public function index()
  {

    $dataMerk = $this->merkRepository->findAll();

    View::render('master/merk/index', [
      'title' => 'Table Merk ',
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
      'data' => $dataMerk
    ]);
  }

  function tambahMerk()
  {
    $maxId = $this->merkRepository->findMaxId();
    $newId = Generete::Id("MRK", $maxId);
    View::render("master/merk/tambah", [
      'title' => "Tambah Merk",
      'form' => [
        "id_merk" => $newId
      ]
    ]);
  }

  function postTambahMerk()
  {
    $id_merk = $_POST['id'];
    $nama_merk = $_POST['nama'];

    try {
      $merk = new MerkInputRequest();
      $merk->setNamaMerk($nama_merk);

      $this->merkService->input($merk);
      View::redirect('master/merk');
    } catch (\Exception $e) {
      View::render(
        "master/merk/tambah",
        [
          'title' => "Tambah Merk",
          'error' => $e->getMessage(),
          'form' => [
            'id_merk' => $id_merk
          ]
        ]
      );
    }
  }

  function hapus($id)
  {
    $this->merkRepository->deleteById($id);

    View::redirect('master/merk');
  }
  function edit($id)
  {
    $merk = $this->merkRepository->findById($id);

    if ($merk == null) {
      View::render("error/404", [
        'title' => "Not Found",
      ]);
    } else {
      View::render("master/merk/edit", [
        'title' => "Edit Merk",
        'form' => [
          'id_merk' => $merk->getIdMerk(),
          'nama_merk' => $merk->getNamaMerk(),
        ]
      ]);
    }
  }

  function postEdit($id)
  {
    $merk = new Merk();
    $merk->setIdMerk($_POST['id']);
    $merk->setNamaMerk($_POST['nama']);

    try {
      $this->merkService->update($merk);
      View::redirect('master/merk');
    } catch (\Exception $e) {
      View::render(
        "master/merk/edit",
        [
          'title' => "Edit Merk",
          'error' => $e->getMessage(),
          'form' => [
            'id_merk' => $merk->getIdMerk(),
            'nama_merk' => $merk->getNamaMerk()
          ]
        ]

      );
    }
  }
}
