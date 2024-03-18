<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0">Tambah <?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('management/penduduk') ?>" class="btn btn-danger ms-3">
                  Kembali
               </a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <form action="<?= base_url('management/penduduk/add') ?>" method="post">
            <input type="hidden" name="pasword" value="1234" class="form-control">
            <div class="mb-3">
               <label for="fullname" class="form-label">Nama</label>
               <input type="text" class="form-control <?= form_error('fullname') ? 'is-invalid' : '' ?>" id="fullname" name="fullname" value="<?= set_value('fullname') ?>">
               <?= form_error('fullname') ?>
            </div>
            <div class="mb-3">
               <label for="dusun_id">Dusun</label>
               <select name="dusun_id" id="dusun_id" class="form-control" required>
                  <option value="">--Pilih Dusun--</option>
                  <?php foreach ($dusun as $d) : ?>
                     <option value="<?= $d['id'] ?>" <?= set_select('dusun_id', $d['id'], (!empty($_POST['dusun_id']) && $_POST['dusun_id'] == $d['id'])); ?>><?= $d['n_dusun'] ?></option>
                  <?php endforeach; ?>
               </select>
               <?= form_error('dusun_id', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="mb-3">
               <label for="nik" class="form-label">NIK</label>
               <input type="text" class="form-control <?= form_error('nik') ? 'is-invalid' : '' ?>" id="nik" name="nik" value="<?= set_value('nik') ?>">
               <?= form_error('nik') ?>
            </div>
            <div class="mb-3">
               <label for="tempat_lahir" class="form-label">tempat_lahir</label>
               <input type="text" class="form-control <?= form_error('tempat_lahir') ? 'is-invalid' : '' ?>" id="tempat_lahir" name="tempat_lahir" value="<?= set_value('tempat_lahir') ?>">
               <?= form_error('tempat_lahir') ?>
            </div>
            <div class="mb-3">
               <label for="tgl_lahir" class="form-label">tgl_lahir</label>
               <input type="date" class="form-control <?= form_error('tgl_lahir') ? 'is-invalid' : '' ?>" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir') ?>">
               <?= form_error('tgl_lahir') ?>
            </div>
            <div class="mb-3">
               <label for="agama" class="form-label">Agama</label>
               <select name="agama" id="agama" class="form-control" required>
                  <option value="">--Pilih Agama--</option>
                  <option value="Islam" <?= set_select('agama', 'Islam', (!empty($_POST['agama']) && $_POST['agama'] == "Islam")); ?>>Islam</option>
                  <option value="Kristen" <?= set_select('agama', 'Kristen', (!empty($_POST['agama']) && $_POST['agama'] == "Kristen")); ?>>Kristen</option>
                  <option value="Katolik" <?= set_select('agama', 'Katolik', (!empty($_POST['agama']) && $_POST['agama'] == "Katolik")); ?>>Katolik</option>
                  <option value="Hindu" <?= set_select('agama', 'Hindu', (!empty($_POST['agama']) && $_POST['agama'] == "Hindu")); ?>>Hindu</option>
                  <option value="Budha" <?= set_select('agama', 'Budha', (!empty($_POST['agama']) && $_POST['agama'] == "Budha")); ?>>Budha</option>
                  <option value="Konghucu" <?= set_select('agama', 'Konghucu', (!empty($_POST['agama']) && $_POST['agama'] == "Konghucu")); ?>>Konghucu</option>
               </select>
               <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="mb-3">
               <label for="s_nikah" class="form-label">Status Perkawinan</label>
               <select name="s_nikah" id="s_nikah" class="form-control" required>
                  <option value="">--Pilih Status Perkawinan--</option>
                  <option value="Belum Kawin" <?= set_select('s_nikah', 'Belum Kawin', (!empty($_POST['s_nikah']) && $_POST['s_nikah'] == "Belum Kawin")); ?>>Belum Kawin</option>
                  <option value="Kawin Tercatat" <?= set_select('s_nikah', 'Kawin Tercatat', (!empty($_POST['s_nikah']) && $_POST['s_nikah'] == "Kawin Tercatat")); ?>>Kawin Tercatat</option>
                  <option value="Kawin Belum Tercatat" <?= set_select('s_nikah', 'Kawin Belum Tercatat', (!empty($_POST['s_nikah']) && $_POST['s_nikah'] == "Kawin Belum Tercatat")); ?>>Kawin Belum Tercatat</option>
                  <option value="Cerai Hidup" <?= set_select('s_nikah', 'Cerai Hidup', (!empty($_POST['s_nikah']) && $_POST['s_nikah'] == "Cerai Hidup")); ?>>Cerai Hidup</option>
                  <option value="Cerai Mati" <?= set_select('s_nikah', 'Cerai Mati', (!empty($_POST['s_nikah']) && $_POST['s_nikah'] == "Cerai Mati")); ?>>Cerai Mati</option>
               </select>
               <?= form_error('s_nikah', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="mb-3">
               <label for="s_hubungan" class="form-label">Status Hubungan Dalam Keluarga</label>
               <select name="s_hubungan" id="s_hubungan" class="form-control" required>
                  <option value="">--Pilih Status Hubungan Dalam Keluarga--</option>
                  <option value="Kepala Keluarga" <?= set_select('s_hubungan', 'Kepala Keluarga', (!empty($_POST['s_hubungan']) && $_POST['s_hubungan'] == "Kepala Keluarga")); ?>>Kepala Keluarga</option>
                  <option value="Suami" <?= set_select('s_hubungan', 'Suami', (!empty($_POST['s_hubungan']) && $_POST['s_hubungan'] == "Suami")); ?>>Suami</option>
                  <option value="Istri" <?= set_select('s_hubungan', 'Istri', (!empty($_POST['s_hubungan']) && $_POST['s_hubungan'] == "Istri")); ?>>Istri</option>
                  <option value="Anak" <?= set_select('s_hubungan', 'Anak', (!empty($_POST['s_hubungan']) && $_POST['s_hubungan'] == "Anak")); ?>>Anak</option>
                  <option value="Orang Tua" <?= set_select('s_hubungan', 'Orang Tua', (!empty($_POST['s_hubungan']) && $_POST['s_hubungan'] == "Orang Tua")); ?>>Orang Tua</option>
                  <option value="Menantu" <?= set_select('s_hubungan', 'Menantu', (!empty($_POST['s_hubungan']) && $_POST['s_hubungan'] == "Menantu")); ?>>Menantu</option>
                  <option value="Mertua" <?= set_select('s_hubungan', 'Mertua', (!empty($_POST['s_hubungan']) && $_POST['s_hubungan'] == "Mertua")); ?>>Mertua</option>
                  <option value="Keponakan" <?= set_select('s_hubungan', 'Keponakan', (!empty($_POST['s_hubungan']) && $_POST['s_hubungan'] == "Keponakan")); ?>>Keponakan</option>
                  <option value="Cucu" <?= set_select('s_hubungan', 'Cucu', (!empty($_POST['s_hubungan']) && $_POST['s_hubungan'] == "Cucu")); ?>>Cucu</option>
               </select>
               <?= form_error('s_hubungan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="mb-3">
               <label for="pekerjaan" class="form-label">pekerjaan</label>
               <input type="text" class="form-control <?= form_error('pekerjaan') ? 'is-invalid' : '' ?>" id="pekerjaan" name="pekerjaan" value="<?= set_value('pekerjaan') ?>">
               <?= form_error('pekerjaan') ?>
            </div>
            <div class="mb-3">
               <label for="pendidikan" class="form-label">Pendidikan</label>
               <select name="pendidikan" id="pendidikan" class="form-control" required>
                  <option value="">--Pilih Pendidikan--</option>
                  <option value="SD" <?= set_select('pendidikan', 'SD', (!empty($_POST['pendidikan']) && $_POST['pendidikan'] == "SD")); ?>>SD</option>
                  <option value="SMP" <?= set_select('pendidikan', 'SMP', (!empty($_POST['pendidikan']) && $_POST['pendidikan'] == "SMP")); ?>>SMP</option>
                  <option value="SMA" <?= set_select('pendidikan', 'SMA', (!empty($_POST['pendidikan']) && $_POST['pendidikan'] == "SMA")); ?>>SMA</option>
                  <option value="D3" <?= set_select('pendidikan', 'D3', (!empty($_POST['pendidikan']) && $_POST['pendidikan'] == "D3")); ?>>D3</option>
                  <option value="S1" <?= set_select('pendidikan', 'S1', (!empty($_POST['pendidikan']) && $_POST['pendidikan'] == "S1")); ?>>S1</option>
                  <option value="S2" <?= set_select('pendidikan', 'S2', (!empty($_POST['pendidikan']) && $_POST['pendidikan'] == "S2")); ?>>S2</option>
                  <option value="S3" <?= set_select('pendidikan', 'S3', (!empty($_POST['pendidikan']) && $_POST['pendidikan'] == "S3")); ?>>S3</option>
               </select>
               <?= form_error('s_nikah', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="mb-3">
               <label for="kk" class="form-label">kk</label>
               <input type="number" class="form-control <?= form_error('kk') ? 'is-invalid' : '' ?>" id="kk" name="kk" value="<?= set_value('kk') ?>">
               <?= form_error('kk') ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>