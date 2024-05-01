<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0">Tambah <?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('management/surat') ?>" class="btn btn-danger ms-3">
                  Kembali
               </a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <form action="<?= base_url('management/surat/add') ?>" method="post">
            <div class="mb-3">
               <label for="n_surat" class="form-label">Nama Surat</label>
               <input type="text" class="form-control <?= form_error('n_surat') ? 'is-invalid' : '' ?>" id="n_surat" name="n_surat" value="<?= set_value('n_surat') ?>">
               <?= form_error('n_surat') ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>