<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0">Ubah <?= $title ?></h5>
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
         <form action="<?= base_url('data/acara/edit/' . $detail['id']) ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
               <label for="n_acara" class="form-label">Nama Acara</label>
               <input type="text" class="form-control <?= form_error('n_acara') ? 'is-invalid' : '' ?>" id="n_acara" name="n_acara" value="<?= $detail['n_acara'] ?>">
               <?= form_error('n_acara') ?>
            </div>
            <div class="mb-3">
               <label for="deskripsi" class="form-label">Deskripsi</label>
               <input type="text" class="form-control <?= form_error('deskripsi') ? 'is-invalid' : '' ?>" id="deskripsi" name="deskripsi" value="<?= $detail['deskripsi'] ?>">
               <?= form_error('deskripsi') ?>
            </div>
            <div class="mb-3">
               <label for="tanggal" class="form-label">Tanggal</label>
               <input type="date" class="form-control <?= form_error('tanggal') ? 'is-invalid' : '' ?>" id="tanggal" name="tanggal" value="<?= $detail['tanggal'] ?>">
               <?= form_error('tanggal') ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>