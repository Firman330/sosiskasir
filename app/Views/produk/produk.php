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
      <?php
      $errors = session()->getFlashdata('errors');
      if (!empty($errors)) { ?>
        <div class="alert alert-danger alert-dismissible">
          <h4>Periksa Lagi Entry Form !!</h4>
          <ul>
            <?php foreach ($errors as $key => $error) { ?>
              <li><?= esc($error) ?></li>
            <?php } ?>
          </ul>
        </div>
      <?php } ?>
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr class="text-center">
              <th width="100px">Action</th>
              <th width="50px">No</th>
              <th>Kode Produk</th>
              <th>Nama Produk</th>
              <th>Kategori</th>
              <th>Satuan</th>
              <th>Harga Beli</th>
              <th>Harga Jual</th>
              <th>Stok</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($produk as $key => $value) { ?>
              <tr>
                <td class="text-center">
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-data<?= $value['id_produk'] ?>"><i class="fas fa-pencil-alt"></i></button>
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-data<?= $value['id_produk'] ?>"><i class="fas fa-trash"></i></button>
                </td>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center"><?= $value['kode_produk'] ?></td>
                <td class="text-center"><?= $value['nama_produk'] ?></td>
                <td class="text-center"><?= $value['nama_kategori'] ?></td>
                <td class="text-center"><?= $value['nama_satuan'] ?></td>
                <td class="text-center">Rp. <?= number_format($value['harga_beli'], 0, ",", ".") ?></td>
                <td class="text-center">Rp. <?= number_format($value['harga_jual'], 0, ",", ".") ?></td>
                <td class="text-center"><?= $value['stok'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>


      <!-- <div class="overlay invisible" id="overlay_paging">
        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
      </div> -->

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
      <?php echo form_open('Produk/Create') ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Kode Produk</label>
          <input name="kode_produk" class="form-control" value="<?= old('kode_produk') ?>" placeholder="Kode Produk" required autocomplete="off">
        </div>
        <div class="form-group">
          <label for="">Nama Produk</label>
          <input name="nama_produk" class="form-control" value="<?= old('nama_produk') ?>" placeholder="Nama Produk" required autocomplete="off">
        </div>
        <div class="form-group">
          <label for="">Kategori</label>
          <select name="id_kategori" class="form-control">
            <option value="">--Pilih Kategori--</option>
            <?php foreach ($kategori as $key => $value) { ?>
              <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="">Satuan</label>
          <select name="id_satuan" id="" class="form-control">
            <option value="">--Pilih Satuan--</option>
            <?php foreach ($satuan as $key => $value) { ?>
              <option value="<?= $value['id_satuan'] ?>"><?= $value['nama_satuan'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="">Harga Beli</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Rp.</span>
            </div>
            <input name="harga_beli" id="harga_beli" value="<?= old('harga_beli') ?>" class="form-control" placeholder="Harga Beli" required autocomplete="off">
          </div>
        </div>
        <div class="form-group">
          <label for=""> Harga Jual</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Rp.</span>
            </div>
            <input name="harga_jual" id="harga_jual" value="<?= old('harga_jual') ?>" class="form-control" placeholder="Harga Jual" required autocomplete="off">
          </div>
        </div>
        <div class="form-group">
          <label for="">Stok</label>
          <input name="stok" type="number" value="<?= old('stok') ?>" class="form-control" placeholder="Stok" required>
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


<?php $no = 1;
foreach ($produk as $key => $value) { ?>
  <!-- Modal Edit Data -->
  <div class="modal fade" id="edit-data<?= $value['id_produk'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php echo form_open('Produk/UpdateData/' . $value['id_produk']) ?>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Kode Produk</label>
            <input name="kode_produk" class="form-control" value="<?= $value['kode_produk'] ?>" placeholder="Kode Produk" readonly autocomplete="off">
          </div>
          <div class="form-group">
            <label for="">Nama Produk</label>
            <input name="nama_produk" class="form-control" value="<?= $value['nama_produk'] ?>" placeholder="Nama Produk" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="">Kategori</label>
            <select name="id_kategori" class="form-control">
              <option value="">--Pilih Kategori--</option>
              <?php foreach ($kategori as $key => $k) { ?>
                <option value="<?= $k['id_kategori'] ?>" <?= $value['id_kategori'] == $k['id_kategori'] ? 'Selected' : '' ?>><?= $k['nama_kategori'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Satuan</label>
            <select name="id_satuan" id="" class="form-control">
              <option value="">--Pilih Satuan--</option>
              <?php foreach ($satuan as $key => $s) { ?>
                <option value="<?= $s['id_satuan'] ?>" <?= $value['id_satuan'] == $s['id_satuan'] ? 'Selected' : '' ?>><?= $s['nama_satuan'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Harga Beli</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
              </div>
              <input name="harga_beli" id="harga_beli<?= $value['id_produk'] ?>" value="<?= $value['harga_beli'] ?>" class="form-control" placeholder="Harga Beli" required>
            </div>
          </div>
          <div class="form-group">
            <label for=""> Harga Jual</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
              </div>
              <input name="harga_jual" id="harga_jual<?= $value['id_produk'] ?>" value="<?= $value['harga_jual'] ?>" class="form-control" placeholder="Harga Jual" required>
            </div>
          </div>
          <div class="form-group">
            <label for="">Stok</label>
            <input name="stok" type="number" value="<?= $value['stok'] ?>" class="form-control" placeholder="Stok" readonly>
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
<?php foreach ($produk as $key => $value) { ?>
  <div class="modal fade" id="delete-data<?= $value['id_produk'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah anda yakin menghapus <b><?= $value['nama_produk'] ?></b> ..?
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <a href="<?= base_url('Produk/DeleteData/' . $value['id_produk']) ?>" class="btn btn-success">Simpan</a>
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
        <form action="<?= site_url('Produk/import') ?>" method="post" enctype="multipart/form-data">
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
      text: flash
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

  new AutoNumeric('#harga_jual', {
    digitGroupSeparator: ',',
    decimalPlaces: 0,
  });
  new AutoNumeric('#harga_beli', {
    digitGroupSeparatorf: ',',
    decimalPlaces: 0,
  });

  <?php foreach ($produk as $key => $value) { ?>
    new AutoNumeric('#harga_jual<?= $value['id_produk'] ?>', {
      digitGroupSeparator: ',',
      decimalPlaces: 0
    });
    new AutoNumeric('#harga_beli<?= $value['id_produk'] ?>', {
      digitGroupSeparatorf: ',',
      decimalPlaces: 0,
    });
  <?php } ?>
</script>