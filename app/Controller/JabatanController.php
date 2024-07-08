<?php

namespace App\Controller;

use App\Config\Database;
use App\Entity\Jabatan;
use App\Helper\Generete;
use App\Helper\View;
use App\Model\JabatanInputRequest;
use App\Repository\JabatanRepository;
use App\Service\JabatanService;

class JabatanController
{

  private JabatanRepository $jabatanRepository;
  private JabatanService $jabatanService;
  function __construct()
  {
    $this->jabatanRepository = new JabatanRepository(Database::getConnection());
    $this->jabatanService = new JabatanService($this->jabatanRepository);
  }
  public function index()
  {

    $dataJabatan = $this->jabatanRepository->findAll();

    View::render('master/jabatan/index', [
      'title' => 'Table Jabatan ',
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
      'data' => $dataJabatan
    ]);
  }

  function tambahJabatan()
  {
    $maxId = $this->jabatanRepository->findMaxId();
    $newId = Generete::Id("JAB", $maxId);
    View::render("master/jabatan/tambah", [
      'title' => "Tambah Jabatan",
      'form' => [
        "id_jabatan" => $newId
      ]
    ]);
  }

  function postTambahJabatan()
  {
    $id_jabatan = $_POST['id'];
    $nama_jabatan = $_POST['nama'];

    try {
      $jabatan = new JabatanInputRequest();
      $jabatan->setNamaJabatan($nama_jabatan);

      $this->jabatanService->input($jabatan);
      View::redirect('master/jabatan');
    } catch (\Exception $e) {
      View::render(
        "master/jabatan/tambah",
        [
          'title' => "Tambah Jabatan",
          'error' => $e->getMessage(),
          'form' => [
            'id_jabatan' => $id_jabatan
          ]
        ]
      );
    }
  }

  function hapus($id)
  {
    $this->jabatanRepository->deleteById($id);

    View::redirect('master/jabatan');
  }

  function edit($id)
  {
    $jabatan = $this->jabatanRepository->findById($id);

    if ($jabatan == null) {
      View::render("error/404", [
        'title' => "Not Found",
      ]);
    } else {
      View::render("master/jabatan/edit", [
        'title' => "Edit Jabatan",
        'form' => [
          'id_jabatan' => $jabatan->getIdJabatan(),
          'nama_jabatan' => $jabatan->getNamaJabatan(),
        ]
      ]);
    }
  }

  function postEdit($id)
  {
    $jabatan = new Jabatan();
    $jabatan->setIdJabatan($_POST['id']);
    $jabatan->setNamaJabatan($_POST['nama']);

    try {
      $this->jabatanService->update($jabatan);
      View::redirect('master/jabatan');
    } catch (\Exception $e) {
      View::render(
        "master/jabatan/edit",
        [
          'title' => "Edit jabatan",
          'error' => $e->getMessage(),
          'form' => [
            'id_jabatan' => $jabatan->getIdJabatan(),
            'nama_jabatan' => $jabatan->getNamaJabatan()
          ]
        ]

      );
    }
  }
}
