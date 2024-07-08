<?php

namespace Test\Repository;

use App\Config\Database;
use App\Entity\Hari;
use App\Repository\HariRepository;
use PHPUnit\Framework\TestCase;

class HariRepositoryTest extends TestCase
{
  private HariRepository $hariRepository;

  function setUp(): void
  {
    $this->hariRepository = new HariRepository(Database::getConnection());
    $this->hariRepository->deleteAll();
  }

  function testSave()
  {
    $hari = new Hari();
    $hari->setIdHari("H001");
    $hari->setNamaHari("Senin");
    $this->hariRepository->save($hari);

    $result = $this->hariRepository->findById($hari->getIdHari());
    $this->assertEquals($hari->getNamaHari(), $result->getNamaHari());
  }

  function testDeleteById()
  {
    $hari = new Hari();
    $hari->setIdHari("H001");
    $hari->setNamaHari("Senin");
    $this->hariRepository->save($hari);

    $this->hariRepository->deleteById($hari->getIdHari());
    $result = $this->hariRepository->findById($hari->getIdHari());

    $this->assertNull($result);
  }

  function testDeleteAll()
  {
    $hari1 = new Hari();
    $hari1->setIdHari("H001");
    $hari1->setNamaHari("Senin");
    $this->hariRepository->save($hari1);

    $hari2 = new Hari();
    $hari2->setIdHari("H002");
    $hari2->setNamaHari("Selasa");
    $this->hariRepository->save($hari2);

    $this->hariRepository->deleteAll();
    $result = $this->hariRepository->findById($hari1->getIdHari());
    $result = $this->hariRepository->findById($hari2->getIdHari());

    $this->assertNull($result);
  }
  function testFindById()
  {
    $hari = new Hari();
    $hari->setIdHari("H001");
    $hari->setNamaHari("Senin");
    $this->hariRepository->save($hari);

    $result = $this->hariRepository->findById($hari->getIdHari());

    $this->assertNotNull($result);
  }
  function testFindAll()
  {
    $hari = new Hari();
    $hari->setIdHari("H001");
    $hari->setNamaHari("Senin");
    $this->hariRepository->save($hari);

    $hari2 = new Hari();
    $hari2->setIdHari("H002");
    $hari2->setNamaHari("Selasa");
    $this->hariRepository->save($hari2);

    $result = $this->hariRepository->findAll();
    $hari = $result[0];

    $this->assertEquals($hari->getIdHari(), $hari->getIdHari());
  }

  function testUpdate()
  {
    $hari = new Hari();
    $hari->setIdHari("H001");
    $hari->setNamaHari("Senin");
    $this->hariRepository->save($hari);

    $hari2 = new Hari();
    $hari2->setIdHari("H001");
    $hari2->setNamaHari("Selasa");
    $this->hariRepository->update($hari2);

    $result = $this->hariRepository->findById($hari2->getIdHari());

    $this->assertNotEquals($hari->getNamaHari(), $result->getNamaHari());
  }

  function testFindMaxId()
  {
    $hari = new Hari();
    $hari->setIdHari("H001");
    $hari->setNamaHari("Senin");
    $this->hariRepository->save($hari);

    $hari2 = new Hari();
    $hari2->setIdHari("H002");
    $hari2->setNamaHari("Selasa");
    $this->hariRepository->save($hari2);

    $maxId = $this->hariRepository->findMaxId();

    $this->assertEquals($hari2->getIdHari(), $maxId);
  }
}
