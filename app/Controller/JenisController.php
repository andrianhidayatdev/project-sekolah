<?php

namespace App\Controller;

use App\Config\Database;
use App\Entity\Jenis;
use App\Helper\Generete;
use App\Helper\View;
use App\Model\JenisInputRequest;
use App\Repository\JenisRepository;
use App\Service\JenisService;

class JenisController
{

  private JenisRepository $jenisRepository;
  private JenisService $jenisService;
  function __construct()
  {
    $this->jenisRepository = new JenisRepository(Database::getConnection());
    $this->jenisService = new JenisService($this->jenisRepository);
  }
  public function index()
  {

    $dataJenis = $this->jenisRepository->findAll();

    View::render('master/jenis/index', [
      'title' => 'Table Jenis ',
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
      'data' => $dataJenis
    ]);
  }

  function tambahJenis()
  {
    $maxId = $this->jenisRepository->findMaxId();
    $newId = Generete::Id("JNS", $maxId);
    View::render("master/jenis/tambah", [
      'title' => "Tambah Jenis",
      'form' => [
        "id_jenis" => $newId
      ]
    ]);
  }

  function postTambahJenis()
  {
    $id_jenis = $_POST['id'];
    $nama_jenis = $_POST['nama'];

    try {
      $jenis = new JenisInputRequest();
      $jenis->setNamaJenis($nama_jenis);

      $this->jenisService->input($jenis);
      View::redirect('master/jenis');
    } catch (\Exception $e) {
      View::render(
        "master/jenis/tambah",
        [
          'title' => "Tambah Jenis",
          'error' => $e->getMessage(),
          'form' => [
            'id_jenis' => $id_jenis
          ]
        ]
      );
    }
  }

  function hapus($id)
  {
    $this->jenisRepository->deleteById($id);

    View::redirect('master/jenis');
  }
  function edit($id)
  {
    $jenis = $this->jenisRepository->findById($id);

    if ($jenis == null) {
      View::render("error/404", [
        'title' => "Not Found",
      ]);
    } else {
      View::render("master/jenis/edit", [
        'title' => "Edit Jenis",
        'form' => [
          'id_jenis' => $jenis->getIdJenis(),
          'nama_jenis' => $jenis->getNamaJenis(),
        ]
      ]);
    }
  }

  function postEdit($id)
  {
    $jenis = new Jenis();
    $jenis->setIdJenis($_POST['id']);
    $jenis->setNamaJenis($_POST['nama']);

    try {
      $this->jenisService->update($jenis);
      View::redirect('master/jenis');
    } catch (\Exception $e) {
      View::render(
        "master/jenis/edit",
        [
          'title' => "Edit Jenis",
          'error' => $e->getMessage(),
          'form' => [
            'id_jenis' => $jenis->getIdJenis(),
            'nama_jenis' => $jenis->getNamaJenis()
          ]
        ]

      );
    }
  }
}
