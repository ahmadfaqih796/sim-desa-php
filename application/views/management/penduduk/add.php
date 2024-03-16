<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0">Tambah <?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('management/penduduk') ?>" class="btn btn-danger ms-3">
                  Kembali
               </a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <form action="<?= base_url('management/penduduk/add') ?>" method="post">
            <div class="mb-3">
               <label for="nama" class="form-label">Nama</label>
               <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= set_value('nama') ?>">
               <?= form_error('nama') ?>
            </div>
            <div class="mb-3">
               <label for="nik" class="form-label">NIK</label>
               <input type="text" class="form-control <?= form_error('nik') ? 'is-invalid' : '' ?>" id="nik" name="nik" value="<?= set_value('nik') ?>">
               <?= form_error('nik') ?>
            </div>
            <div class="mb-3">
               <label for="tempat_lahir" class="form-label">tempat_lahir</label>
               <input type="text" class="form-control <?= form_error('tempat_lahir') ? 'is-invalid' : '' ?>" id="tempat_lahir" name="tempat_lahir" value="<?= set_value('tempat_lahir') ?>">
               <?= form_error('tempat_lahir') ?>
            </div>
            <div class="mb-3">
               <label for="tgl_lahir" class="form-label">tgl_lahir</label>
               <input type="date" class="form-control <?= form_error('tgl_lahir') ? 'is-invalid' : '' ?>" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir') ?>">
               <?= form_error('tgl_lahir') ?>
            </div>
            <div class="mb-3">
               <label for="agama" class="form-label">agama</label>
               <input type="text" class="form-control <?= form_error('agama') ? 'is-invalid' : '' ?>" id="agama" name="agama" value="<?= set_value('agama') ?>">
               <?= form_error('agama') ?>
            </div>
            <div class="mb-3">
               <label for="pekerjaan" class="form-label">pekerjaan</label>
               <input type="text" class="form-control <?= form_error('pekerjaan') ? 'is-invalid' : '' ?>" id="pekerjaan" name="pekerjaan" value="<?= set_value('pekerjaan') ?>">
               <?= form_error('pekerjaan') ?>
            </div>
            <div class="mb-3">
               <label for="pendidikan" class="form-label">pendidikan</label>
               <input type="text" class="form-control <?= form_error('pendidikan') ? 'is-invalid' : '' ?>" id="pendidikan" name="pendidikan" value="<?= set_value('pendidikan') ?>">
               <?= form_error('pendidikan') ?>
            </div>
            <div class="mb-3">
               <label for="kk" class="form-label">kk</label>
               <input type="number" class="form-control <?= form_error('kk') ? 'is-invalid' : '' ?>" id="kk" name="kk" value="<?= set_value('kk') ?>">
               <?= form_error('kk') ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>