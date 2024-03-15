<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0">Tambah Dusun</h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('management/dusun/add') ?>" class="btn btn-danger ms-3">
                  Kembali
               </a>

            </div>
         </div>
      </div>
      <div class="card-body">
         <form action="<?= base_url('management/dusun/add') ?>" method="post">
            <div class="mb-3">
               <label for="n_dusun" class="form-label">Nama Dusun</label>
               <input type="text" class="form-control <?= form_error('n_dusun') ? 'is-invalid' : '' ?>" id="n_dusun" name="n_dusun" value="<?= set_value('n_dusun') ?>">
               <?= form_error('n_dusun') ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>