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
         <form action="<?= base_url('informasi/blt/add') ?>" method="post">
            <div class="mb-3">
               <label for="penduduk_id" class="form-label">Penduduk</label>
               <select name="penduduk_id" id="penduduk_id" class="form-control" required>
                  <option value="">--Pilih Penduduk--</option>
                  <?php foreach ($penduduk as $data) :  ?>
                     <option value="<?= $data['id'] ?>" <?= set_select('id', $data['id'], (!empty($_POST['id']) && $_POST['id'] == $data['id'])); ?>><?= $data['fullname'] . ' - ' . $data['nik'] . ' - ' . $data['n_dusun'] ?></option>
                  <?php endforeach; ?>

               </select>
               <?= form_error('penduduk_id', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>