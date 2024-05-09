<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0">Edit <?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('setting/desa') ?>" class="btn btn-danger ms-3">
                  Kembali
               </a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <form action="<?= base_url('setting/desa/edit/' . $detail['id']) ?>" method="post">
            <div class="mb-3">
               <div class="form-group">
                  <label for="n_desa" class="form-label">Nama Desa</label>
                  <input type="text" class="form-control <?= form_error('n_desa') ? 'is-invalid' : '' ?>" id="n_desa" name="n_desa" value="<?= $detail['n_desa'] ?>">
                  <?= form_error('n_desa') ?>
               </div>
            </div>
            <div class="mb-3">
               <div class="form-group">
                  <label for="n_kepala_desa" class="form-label">Nama Kepala Desa</label>
                  <input type="text" class="form-control <?= form_error('n_kepala_desa') ? 'is-invalid' : '' ?>" id="n_kepala_desa" name="n_kepala_desa" value="<?= $detail['n_kepala_desa'] ?>">
                  <?= form_error('n_kepala_desa') ?>
               </div>
            </div>
            <div class="mb-3">
               <div class="form-group">
                  <label for="alamat" class="form-label">Alamat</label>
                  <input type="text" class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat" name="alamat" value="<?= $detail['alamat'] ?>">
                  <?= form_error('alamat') ?>
               </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>