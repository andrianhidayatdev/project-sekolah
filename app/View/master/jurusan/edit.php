  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>Edit Jurusan</b></h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- Form Element sizes -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Jurusan</h3>
              </div>

              <div class="card-body ">
                <?php if (isset($model['error'])) {
                ?>
                  <div class="alert alert-danger" role="alert">
                    <?= $model['error'] ?>
                  </div>
                <?php
                } ?>
                <form method="post" action="/master/jurusan/edit/<?= $model['form']['id_jurusan'] ?>">
                  <label>Id Jurusan</label>
                  <input class="form-control form-control-lg" type="text" readonly name="id" value="<?= $model['form']['id_jurusan'] ?>">
                  <br>
                  <label>Nama Jurusan</label>
                  <input class="form-control form-control-lg" type="text" placeholder="Nama Jurusan" name="nama" value="<?= $model['form']['nama_jurusan'] ?>">
                  <br>
                  <div class=" d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus mr-2"></i>Edit</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
  </div>
  <!--/.col (right) -->
  </div>
  <!-- /.row -->
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->