<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0">Tambah <?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('data/pengaduan') ?>" class="btn btn-danger ms-3">
                  Kembali
               </a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
         <?= $this->session->flashdata('message'); ?>
         <form action="<?= base_url('data/pengaduan/add') ?>" method="post">
            <div class="mb-3">
               <label for="judul" class="form-label">Judul</label>
               <input type="text" class="form-control <?= form_error('judul') ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= set_value('judul') ?>">
               <?= form_error('judul') ?>
            </div>
            <div class="mb-3">
               <label for="deskripsi" class="form-label">Deskripsi</label>
               <input type="text" class="form-control <?= form_error('deskripsi') ? 'is-invalid' : '' ?>" id="deskripsi" name="deskripsi" value="<?= set_value('deskripsi') ?>">
               <?= form_error('deskripsi') ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>