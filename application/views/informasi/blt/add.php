<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0">Tambah <?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('informasi/blt') ?>" class="btn btn-danger ms-3">
                  Kembali
               </a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <form action="<?= base_url('informasi/blt/add') ?>" method="post">
            <!-- <div class="mb-3">
               <label for="penduduk_id" class="form-label">Penduduk</label>
               <select name="penduduk_id" id="penduduk_id" class="form-control" required>
                  <option value="">--Pilih Penduduk--</option>
                  <?php foreach ($penduduk as $data) :  ?>
                     <option value="<?= $data['id'] ?>" <?= set_select('id', $data['id'], (!empty($_POST['id']) && $_POST['id'] == $data['id'])); ?>><?= $data['fullname'] . ' - ' . $data['nik'] . ' - ' . $data['desa'] ?></option>
                  <?php endforeach; ?>
               </select>
               <?= form_error('penduduk_id', '<small class="text-danger pl-3">', '</small>'); ?>
            </div> -->
            <div class="mb-3">
               <label for="nik" class="form-label">NIK</label>
               <input type="text" class="form-control <?= form_error('nik') ? 'is-invalid' : '' ?>" id="nik" name="nik" value="<?= set_value('nik') ?>">
               <?= form_error('nik') ?>
            </div>
            <div class="mb-3">
               <label for="n_blt" class="form-label">Nama Penerima BLT</label>
               <input type="text" class="form-control <?= form_error('n_blt') ? 'is-invalid' : '' ?>" id="n_blt" name="n_blt" value="<?= set_value('n_blt') ?>">
               <?= form_error('n_blt') ?>
            </div>
            <div class="mb-3">
               <label for="alamat" class="form-label">Alamat</label>
               <input type="text" class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat" name="alamat" value="<?= set_value('alamat') ?>">
               <?= form_error('alamat') ?>
            </div>
            <div class="mb-3">
               <label for="batch" class="form-label">Batch</label>
               <input type="text" class="form-control <?= form_error('batch') ? 'is-invalid' : '' ?>" id="batch" name="batch" value="<?= set_value('batch') ?>">
               <?= form_error('batch') ?>
            </div>
            <div class="mb-3">
               <label for="desa" class="form-label">Nama Desa</label>
               <input type="text" class="form-control <?= form_error('desa') ? 'is-invalid' : '' ?>" id="desa" name="desa" value="<?= set_value('desa') ?>">
               <?= form_error('desa') ?>
            </div>
            <div class="mb-3">
               <label for="kecamatan" class="form-label">Nama Kecamatan</label>
               <input type="text" class="form-control <?= form_error('kecamatan') ? 'is-invalid' : '' ?>" id="kecamatan" name="kecamatan" value="<?= set_value('kecamatan') ?>">
               <?= form_error('kecamatan') ?>
            </div>
            <div class="mb-3">
               <label for="kabupaten" class="form-label">Nama Kabupaten</label>
               <input type="text" class="form-control <?= form_error('kabupaten') ? 'is-invalid' : '' ?>" id="kabupaten" name="kabupaten" value="<?= set_value('kabupaten') ?>">
               <?= form_error('kabupaten') ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>