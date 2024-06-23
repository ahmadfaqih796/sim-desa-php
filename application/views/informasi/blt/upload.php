<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0">Upload <?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('informasi/blt') ?>" class="btn btn-danger ms-3">
                  Kembali
               </a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
         <?= $this->session->flashdata('message'); ?>
         <form action="<?= base_url('informasi/blt/upload_proses') ?>" enctype="multipart/form-data" method="post">
            <div class="mb-3">
               <label for="file" class="form-label">Upload File</label>
               <input type="file" class="form-control <?= form_error('file') ? 'is-invalid' : '' ?>" id="file" name="file" value="<?= set_value('file') ?>">
               <?= form_error('file') ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>