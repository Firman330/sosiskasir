<div class="col-md-12">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title"><?= $subjudul ?></h3>
          <div class="card-tools">
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add-data"><i class="fas fa-plus"></i> Tambah
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="flash" data-flash="<?= session()->getFlashdata('pesan'); ?>"></div>
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr class="text-center">
                  <th width="100px">Action</th>
                  <th width="50px">No</th>
                  <th>Satuan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($satuan as $key => $value) { ?>
                  <tr>
                    <td class="text-center">
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-data<?= $value['id_satuan'] ?>"><i class="fas fa-pencil-alt"></i></button>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-data<?= $value['id_satuan'] ?>"><i class="fas fa-trash"></i></button>
                    </td>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?= $value['nama_satuan'] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

    <!-- Modal Add Data -->
    <div class="modal fade" id="add-data">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h4 class="modal-title">Add Data <?= $subjudul ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php echo form_open('Satuan/Create') ?>
          <div class="modal-body">
            <div class="form-group">
              <label for="">Nama Satuan</label>
              <input name="nama_satuan" class="form-control" placeholder="Satuan" required autocomplete="off">
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
          <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <!-- Modal Edit Data -->
    <?php foreach ($satuan as $key => $value) { ?>
      <div class="modal fade" id="edit-data<?= $value['id_satuan'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Satuan/UpdateData/' . $value['id_satuan']) ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Nama Satuan</label>
                <input name="nama_satuan" value="<?= $value['nama_satuan'] ?>" class="form-control" placeholder="Satuan" required autocomplete="off">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    <?php } ?>


    <!-- Modal Delete Data -->
    <?php foreach ($satuan as $key => $value) { ?>
      <div class="modal fade" id="delete-data<?= $value['id_satuan'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Apakah anda yakin menghapus <b><?= $value['nama_satuan'] ?></b> ..?
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              <a href="<?= base_url('Satuan/DeleteData/' . $value['id_satuan']) ?>" class="btn btn-success">Simpan</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- Modal Import Data Excel -->
      <div class="modal fade" id="modal-import">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Import Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= site_url('Satuan/import') ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <label>File Excel</label>
                <div class="custom-file">
                  <?= csrf_field() ?>
                  <input type="file" name="file_excel" class="custom-file-input" id="file_excel" required>
                  <label for="file_excel" class="custom-file-label">Pilih File</label>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
            </form>
          </div>

        </div>

      </div>

    <?php } ?>
    <script>
      var flash = $('#flash').data('flash');
      if (flash) {
        Swal.fire({
          icon: 'success',
          title: flash,
        })
      }
    </script>
    <script>
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "paging": true,
          "lengthChange": true,
          "info": true,
          "ordering": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      });
    </script>