<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0">Tambah <?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('data/pengajuan') ?>" class="btn btn-danger ms-3">
                  Kembali
               </a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <form action="<?= base_url('data/pengajuan/add') ?>" method="post">
            <input type="hidden" value="<?= $this->session->userdata('user_id') ?>" name="penduduk_id">
            <div class="mb-3">
               <label for="tgl_pengajuan" class="form-label">Tanggal Pengajuan</label>
               <input type="date" min="<?= date('Y-m-d') ?>" class="form-control <?= form_error('tgl_pengajuan') ? 'is-invalid' : '' ?>" id="tgl_pengajuan" name="tgl_pengajuan" value="<?= set_value('tgl_pengajuan') ?>">
               <?= form_error('tgl_pengajuan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="mb-3">
               <label for="layanan" class="form-label">Layanan</label>
               <select name="layanan" id="layanan" class="form-control" required>
                  <option value="">--Pilih Layanan--</option>

                  <?php foreach ($layanan as $data) :  ?>
                     <option value="<?= $data['n_surat'] ?>" <?= set_select('n_surat', $data['n_surat'], (!empty($_POST['n_surat']) && $_POST['n_surat'] == $data['n_surat'])); ?>><?= $data['n_surat'] ?></option>
                  <?php endforeach; ?>

               </select>
               <?= form_error('layanan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>