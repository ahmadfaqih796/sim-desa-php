<?php
$date = date("Y-m-d");
?>

<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0">Edit <?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('data/pengajuan') ?>" class="btn btn-danger ms-3">
                  Kembali
               </a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
         <?= $this->session->flashdata('message'); ?>
         <form action="<?= base_url('data/pengajuan/edit_pengambilan/' . $detail['id'] . '/' . $detail['penduduk_id']) ?>" method="post">
            <input type="hidden" class="form-control <?= form_error('tgl_pengambilan') ? 'is-invalid' : '' ?>" id="tgl_pengambilan" name="tgl_pengambilan" value="<?= date("Y-m-d") ?>">
            <div class="mb-3">
               <div class="form-group">
                  <label class="form-label">Nama</label>
                  <input type="text" disabled class="form-control" value="<?= $user['fullname'] ?>">
               </div>
            </div>
            <div class="mb-3">
               <div class="form-group">
                  <label class="form-label">NIK</label>
                  <input type="text" disabled class="form-control" value="<?= $user['nik'] ?>">
               </div>
            </div>
            <div class="mb-3">
               <div class="form-group">
                  <label class="form-label">Dusun</label>
                  <input type="text" disabled class="form-control" value="<?= $user['n_dusun'] ?>">
               </div>
            </div>
            <button type="submit" class="btn btn-primary">Proses</button>
         </form>
      </div>
   </div>