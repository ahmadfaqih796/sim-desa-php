<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0">Edit <?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('management/dusun') ?>" class="btn btn-danger ms-3">
                  Kembali
               </a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <form action="<?= base_url('informasi/schedule/edit/' . $detail['id']) ?>" method="post">
            <div class="mb-3">
               <label for="n_jadwal" class="form-label">Nama Jadwal</label>
               <input type="text" class="form-control <?= form_error('n_jadwal') ? 'is-invalid' : '' ?>" id="n_jadwal" name="n_jadwal" value="<?= $detail['n_jadwal'] ?>">
               <?= form_error('n_jadwal') ?>
            </div>
            <div class="mb-3">
               <label for="lokasi" class="form-label">Lokasi</label>
               <input type="text" class="form-control <?= form_error('lokasi') ? 'is-invalid' : '' ?>" id="lokasi" name="lokasi" value="<?= $detail['lokasi'] ?>">
               <?= form_error('lokasi') ?>
            </div>
            <div class="mb-3">
               <label for="tanggal" class="form-label">Tanggal</label>
               <input type="date" min="<?= date('Y-m-d') ?>" class="form-control <?= form_error('tanggal') ? 'is-invalid' : '' ?>" id="tanggal" name="tanggal" value="<?= $detail['tanggal'] ?>">
               <?= form_error('tanggal') ?>
            </div>
            <div class="mb-3">
               <label for="pukul" class="form-label">Pukul</label>
               <input type="time" class="form-control <?= form_error('pukul') ? 'is-invalid' : '' ?>" id="pukul" name="pukul" value="<?= $detail['pukul'] ?>">
               <?= form_error('pukul') ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>