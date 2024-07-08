<?php

namespace App\Controller;

use App\Config\Database;
use App\Entity\Jurusan;
use App\Helper\Generete;
use App\Helper\View;
use App\Model\JurusanInputRequest;
use App\Repository\JurusanRepository;
use App\Service\JurusanService;

class JurusanController
{

  private JurusanRepository $jurusanRepository;
  private JurusanService $jurusanService;
  function __construct()
  {
    $this->jurusanRepository = new JurusanRepository(Database::getConnection());
    $this->jurusanService = new JurusanService($this->jurusanRepository);
  }
  public function index()
  {

    $dataJurusan = $this->jurusanRepository->findAll();

    View::render('master/jurusan/index', [
      'title' => 'Table Jurusan ',
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
      'data' => $dataJurusan
    ]);
  }

  function tambahJurusan()
  {
    $maxId = $this->jurusanRepository->findMaxId();
    $newId = Generete::Id("JUR", $maxId);
    View::render("master/jurusan/tambah", [
      'title' => "Tambah Jurusan",
      'form' => [
        "id_jurusan" => $newId
      ]
    ]);
  }

  function postTambahJurusan()
  {
    $id_jurusan = $_POST['id'];
    $nama_jurusan = $_POST['nama'];

    try {
      $jurusan = new JurusanInputRequest();
      $jurusan->setNamaJurusan($nama_jurusan);

      $this->jurusanService->input($jurusan);
      View::redirect('master/jurusan');
    } catch (\Exception $e) {
      View::render(
        "master/jurusan/tambah",
        [
          'title' => "Tambah Jurusan",
          'error' => $e->getMessage(),
          'form' => [
            'id_jurusan' => $id_jurusan
          ]
        ]
      );
    }
  }

  function hapus($id)
  {
    $this->jurusanRepository->deleteById($id);

    View::redirect('master/jurusan');
  }
  function edit($id)
  {
    $jurusan = $this->jurusanRepository->findById($id);

    if ($jurusan == null) {
      View::render("error/404", [
        'title' => "Not Found",
      ]);
    } else {
      View::render("master/jurusan/edit", [
        'title' => "Edit Jurusan",
        'form' => [
          'id_jurusan' => $jurusan->getIdJurusan(),
          'nama_jurusan' => $jurusan->getNamaJurusan(),
        ]
      ]);
    }
  }

  function postEdit($id)
  {
    $jurusan = new Jurusan();
    $jurusan->setIdJurusan($_POST['id']);
    $jurusan->setNamaJurusan($_POST['nama']);

    try {
      $this->jurusanService->update($jurusan);
      View::redirect('master/jurusan');
    } catch (\Exception $e) {
      View::render(
        "master/jurusan/edit",
        [
          'title' => "Edit Jurusan",
          'error' => $e->getMessage(),
          'form' => [
            'id_jurusan' => $jurusan->getIdJurusan(),
            'nama_jurusan' => $jurusan->getNamaJurusan()
          ]
        ]

      );
    }
  }
}
