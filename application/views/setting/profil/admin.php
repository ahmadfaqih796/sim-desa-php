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
                  <img src="<?= base_url('assets/images/profil/' . $data['photo']) ?>" alt="" width="150" height="150" class="rounded-circle" style="object-fit: cover;">
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
               </table>
            </div>
         </div>
      </div>

   </div>

</div>