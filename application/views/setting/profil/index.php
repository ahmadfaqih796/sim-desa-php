<?php
$base_image_url = base_url('assets/images/profile/user-1.jpg');
if ($data['photo']) {
   $base_image_url = base_url('assets/images/profil/') . $data['photo'];
}
?>
<div class="container-fluid">
   <div class="row">
      <div class="col-md-3 col-xs-12">
         <div class="card">
            <div class="card-header">
               <div class="row align-items-center">
                  <h5 class="card-title mb-0">Foto</h5>
               </div>
            </div>
            <div class="card-body">
               <div class="text-center">
                  <img src="<?= $base_image_url ?>" alt="" width="150" height="150" class="rounded-circle" style="object-fit: cover;">
               </div>
               <div class="mt-3">
                  <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
                  <?= $this->session->flashdata('message'); ?>
               </div>
               <form action="<?= base_url('setting/profil/edit/' . $data['id']) ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="old_gambar" value="<?= $data['photo'] ?>">
                  <div class="mb-3">
                     <input type="file" class="form-control <?= form_error('gambar') ? 'is-invalid' : '' ?>" id="gambar" name="gambar">
                     <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>
            </div>
         </div>
      </div>

      <div class="col-md-9 col-xs-12">
         <div class="card">
            <div class="card-header">
               <div class="row align-items-center">
                  <h5 class="card-title mb-0">Profil</h5>
               </div>
            </div>
            <div class="card-body">
               <table class="table">
                  <tr>
                     <td>Nama</td>
                     <td>:</td>
                     <td><?= $data['fullname'] ?></td>
                  </tr>
                  <tr>
                     <td>NIK</td>
                     <td>:</td>
                     <td><?= $data['nik'] ?></td>
                  </tr>
                  <tr>
                     <td>Tempat Tanggal Lahir</td>
                     <td>:</td>
                     <td><?= $data['tempat_lahir'] . ', ' . $data['tgl_lahir'] ?></td>
                  </tr>
                  <tr>
                     <td>Dusun</td>
                     <td>:</td>
                     <td><?= $data['n_dusun'] ?></td>
                  </tr>
                  <tr>
                     <td>Agama</td>
                     <td>:</td>
                     <td><?= $data['agama'] ?></td>
                  </tr>
                  <tr>
                     <td>Status Nikah</td>
                     <td>:</td>
                     <td><?= $data['s_nikah'] ?></td>
                  </tr>
                  <tr>
                     <td>Status Hubungan</td>
                     <td>:</td>
                     <td><?= $data['s_hubungan'] ?></td>
                  </tr>
                  <tr>
                     <td>Pendidikan</td>
                     <td>:</td>
                     <td><?= $data['pendidikan'] ?></td>
                  </tr>
                  <tr>
                     <td>Pekerjaan</td>
                     <td>:</td>
                     <td><?= $data['pekerjaan'] ?></td>
                  </tr>
               </table>
            </div>
         </div>
      </div>

   </div>

</div>