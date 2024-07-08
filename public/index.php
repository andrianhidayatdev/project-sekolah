<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Config\Database;
use App\Controller\HariController;
use App\Controller\HomeController;
use App\Controller\JabatanController;
use App\Controller\JenisController;
use App\Controller\JurusanController;
use App\Controller\MerkController;
use App\Controller\PelajaranController;
use App\Controller\WarnaController;
use App\Helper\Router;

Database::getConnection("prod");
Router::add('GET', '/', HomeController::class, 'index');

//HARI
Router::add('GET', '/master/hari', HariController::class, 'index');
Router::add('GET', '/master/hari/tambah', HariController::class, 'tambahHari');
Router::add('POST', '/master/hari/tambah', HariController::class, 'postTambahHari');
Router::add('GET', '/master/hari/hapus/([0-9A-Z]*)', HariController::class, 'hapus');
Router::add('GET', '/master/hari/edit/([0-9A-Z]*)', HariController::class, 'edit');
Router::add('POST', '/master/hari/edit/([0-9A-Z]*)', HariController::class, 'postEdit');

//JABATAN
Router::add('GET', '/master/jabatan', JabatanController::class, 'index');
Router::add('GET', '/master/jabatan/tambah', JabatanController::class, 'tambahJabatan');
Router::add('POST', '/master/jabatan/tambah', JabatanController::class, 'postTambahJabatan');
Router::add('GET', '/master/jabatan/hapus/([0-9A-Z]*)', JabatanController::class, 'hapus');
Router::add('GET', '/master/jabatan/edit/([0-9A-Z]*)', JabatanController::class, 'edit');
Router::add('POST', '/master/jabatan/edit/([0-9A-Z]*)', JabatanController::class, 'postEdit');

//JENIS
Router::add('GET', '/master/jenis', JenisController::class, 'index');
Router::add('GET', '/master/jenis/tambah', JenisController::class, 'tambahJenis');
Router::add('POST', '/master/jenis/tambah', JenisController::class, 'postTambahJenis');
Router::add('GET', '/master/jenis/hapus/([0-9A-Z]*)', JenisController::class, 'hapus');
Router::add('GET', '/master/jenis/edit/([0-9A-Z]*)', JenisController::class, 'edit');
Router::add('POST', '/master/jenis/edit/([0-9A-Z]*)', JenisController::class, 'postEdit');



//JURUSAN
Router::add('GET', '/master/jurusan', JurusanController::class, 'index');
Router::add('GET', '/master/jurusan/tambah', JurusanController::class, 'tambahJurusan');
Router::add('POST', '/master/jurusan/tambah', JurusanController::class, 'postTambahJurusan');
Router::add('GET', '/master/jurusan/hapus/([0-9A-Z]*)', JurusanController::class, 'hapus');
Router::add('GET', '/master/jurusan/edit/([0-9A-Z]*)', JurusanController::class, 'edit');
Router::add('POST', '/master/jurusan/edit/([0-9A-Z]*)', JurusanController::class, 'postEdit');


//MERK
Router::add('GET', '/master/merk', MerkController::class, 'index');
Router::add('GET', '/master/merk/tambah', MerkController::class, 'tambahMerk');
Router::add('POST', '/master/merk/tambah', MerkController::class, 'postTambahMerk');
Router::add('GET', '/master/merk/hapus/([0-9A-Z]*)', MerkController::class, 'hapus');
Router::add('GET', '/master/merk/edit/([0-9A-Z]*)', MerkController::class, 'edit');
Router::add('POST', '/master/merk/edit/([0-9A-Z]*)', MerkController::class, 'postEdit');



//PELAJARAN
Router::add('GET', '/master/pelajaran', PelajaranController::class, 'index');
Router::add('GET', '/master/pelajaran/tambah', PelajaranController::class, 'tambahPelajaran');
Router::add('POST', '/master/pelajaran/tambah', PelajaranController::class, 'postTambahPelajaran');
Router::add('GET', '/master/pelajaran/hapus/([0-9A-Z]*)', PelajaranController::class, 'hapus');
Router::add('GET', '/master/pelajaran/edit/([0-9A-Z]*)', PelajaranController::class, 'edit');
Router::add('POST', '/master/pelajaran/edit/([0-9A-Z]*)', PelajaranController::class, 'postEdit');

//WARNA
Router::add('GET', '/master/warna', WarnaController::class, 'index');
Router::add('GET', '/master/warna/tambah', WarnaController::class, 'tambahWarna');
Router::add('POST', '/master/warna/tambah', WarnaController::class, 'postTambahWarna');
Router::add('GET', '/master/warna/hapus/([0-9A-Z]*)', WarnaController::class, 'hapus');
Router::add('GET', '/master/warna/edit/([0-9A-Z]*)', WarnaController::class, 'edit');
Router::add('POST', '/master/warna/edit/([0-9A-Z]*)', WarnaController::class, 'postEdit');


Router::run();
