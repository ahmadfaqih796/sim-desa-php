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
                  <img src="<?= base_url('assets/') ?>/images/profile/user-1.jpg" alt="" width="150" height="150" class="rounded-circle">
               </div>
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