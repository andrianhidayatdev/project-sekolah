<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Master Warna</b></h1>
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
              <a href="\master\warna\tambah" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Tambah Warna</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Warna</th>
                    <th>Nama Warna</th>
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
                        <td><?= $row->getIdWarna() ?></td>
                        <td><?= $row->getNamaWarna() ?></td>
                        <td>
                          <a href="/master/warna/hapus/<?= $row->getIdWarna(); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          <a href="/master/warna/edit/<?= $row->getIdWarna(); ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        </td>
                      </tr>
                  <?php $number++;
                    }
                  } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Id Warna</th>
                    <th>Nama Warna</th>
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