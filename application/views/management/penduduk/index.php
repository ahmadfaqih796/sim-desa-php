<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0"><?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('management/penduduk/add') ?>" class="btn btn-primary ms-3">
                  <i class="fas fa-plus"></i> Tambah
               </a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table id="myTable" class="table align-middle mb-0">
               <thead>
                  <tr>
                     <th scope="col">No</th>
                     <th scope="col">Nama</th>
                     <th scope="col">NIK</th>
                     <th scope="col">Dusun</th>
                     <th scope="col">TTL</th>
                     <th scope="col">Agama</th>
                     <th scope="col">Status Perkawinan</th>
                     <th scope="col">Pekerjaan</th>
                     <th scope="col">Pendidikan</th>
                     <th scope="col">KK</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i = 1;
                  foreach ($data as $field) : ?>
                     <tr>
                        <th style="width: 50px; text-align: center;"><?= $i ?></th>
                        <td><?= $field['nama'] ?></td>
                        <td><?= $field['nik'] ?></td>
                        <td><?= $field['n_dusun'] ?></td>
                        <td><?= $field['tempat_lahir'] . ', ' . $field['tgl_lahir'] ?></td>
                        <td><?= $field['agama'] ?></td>
                        <td><?= $field['s_nikah'] ?></td>
                        <td><?= $field['pekerjaan'] ?></td>
                        <td><?= $field['pendidikan'] ?></td>
                        <td><?= $field['kk'] ?></td>
                        <td style="width: 80px;">
                           <a href="<?= base_url('management/penduduk/edit/' . $field['id']) ?>" class="btn btn-success btn-sm">
                              <i class="fas fa-edit"></i>
                           </a>
                           <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $field['id'] ?>)">
                              <i class="fas fa-trash"></i>
                           </button>
                        </td>
                     </tr>
                  <?php $i++;
                  endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

<script>
   function confirmDelete(id) {
      if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
         window.location.href = "<?= base_url('management/penduduk/delete/') ?>" + id;
      }
   }
</script>