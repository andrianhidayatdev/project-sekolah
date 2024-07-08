<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Master Pelajaran</b></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-end">
              <a href="\master\pelajaran\tambah" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Tambah Pelajaran</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Pelajaran</th>
                    <th>Nama Pelajaran</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php if (isset($model['data'])) {
                    $number = 1;
                    foreach ($model['data'] as $row) {
                  ?>
                      <tr>
                        <td><?= $number ?></td>
                        <td><?= $row->getIdPelajaran() ?></td>
                        <td><?= $row->getNamaPelajaran() ?></td>
                        <td>
                          <a href="/master/pelajaran/hapus/<?= $row->getIdPelajaran(); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          <a href="/master/pelajaran/edit/<?= $row->getIdPelajaran(); ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        </td>
                      </tr>
                  <?php $number++;
                    }
                  } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Id Pelajaran</th>
                    <th>Nama Pelajaran</th>
                    <th>Action</th>

                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->