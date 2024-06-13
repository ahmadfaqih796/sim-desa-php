<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0">Tambah <?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('data/acara') ?>" class="btn btn-danger ms-3">
                  Kembali
               </a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
         <?= $this->session->flashdata('message'); ?>
         <form action="<?= base_url('data/acara/tamu/' . $this->uri->segment(4)) ?>" method="post">
            <div class="mb-3">
               <label for="n_tamu" class="form-label">Nama Tamu</label>
               <input type="text" class="form-control <?= form_error('n_tamu') ? 'is-invalid' : '' ?>" id="n_tamu" name="n_tamu" value="<?= set_value('n_tamu') ?>">
               <?= form_error('n_tamu') ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>