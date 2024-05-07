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
         <form action="<?= base_url('data/pengajuan/edit_selesai/' . $detail['id']) ?>" method="post">
            <div class="mb-3">
               <div class="form-group">
                  <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                  <input type="datetime-local" class="form-control <?= form_error('tgl_selesai') ? 'is-invalid' : '' ?>" id="tgl_selesai" name="tgl_selesai" value="<?= $detail['tgl_selesai'] ?>">
                  <?= form_error('tgl_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <!-- <div class="form-group">
                  <label for="tgl_pengambilan" class="form-label">Upload File</label>
                  <input type="file" class="form-control <?= form_error('tgl_pengambilan') ? 'is-invalid' : '' ?>" id="tgl_pengambilan" name="tgl_pengambilan" value="<?= $detail['tgl_pengambilan'] ?>">
                  <?= form_error('tgl_pengambilan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div> -->
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>