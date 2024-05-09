<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0"><?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <?php if ($role == 2) : ?>
                  <a href="<?= base_url('data/pengajuan/add') ?>" class="btn btn-primary ms-3">
                     <i class="fas fa-plus"></i> Tambah
                  </a>
               <?php endif; ?>
            </div>
         </div>
      </div>
      <div class="card-body">
         <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
         <?= $this->session->flashdata('message'); ?>
         <div class="table-responsive">
            <table id="myTable" class="table align-middle mb-0">
               <thead>
                  <tr>
                     <th scope="col">No</th>
                     <th scope="col">Nomor Pengajuan</th>
                     <th scope="col">Nama</th>
                     <th scope="col">Status</th>
                     <th scope="col">Tanggal</th>
                     <th scope="col">Layanan</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i = 1;
                  foreach ($data as $field) :
                     $status = "";
                     $status_class = '';
                     if ($field['tgl_selesai']) {
                        $status = "Selesai";
                        $status_class = 'bg-success'; // Green background for completed status
                     } elseif ($field['tgl_pengambilan']) {
                        $status = "Pengambilan";
                        $status_class = 'bg-primary'; // Blue background for pickup status
                     } else {
                        $status = "Proses";
                        $status_class = 'bg-warning'; // Yellow background for submission status
                     }
                  ?>
                     <tr>
                        <th style="width: 50px; text-align: center;"><?= $i ?></th>
                        <td><?= $field['no_pengajuan'] ?></td>
                        <td><?= $field['fullname'] ?></td>
                        <td>
                           <div class="badge <?= $status_class ?>">
                              <?= $status ?>
                           </div>
                        </td>
                        <td><?= $field['tgl_pengajuan'] ?></td>
                        <td><?= $field['layanan'] ?></td>
                        <td style="width: 100px;">
                           <?php if ($status == "Proses") : ?>
                              <?php if ($role == 1) : ?>
                                 <a href="<?= base_url('data/pengajuan/edit_pengambilan/' . $field['id_table'] . '/' . $field['penduduk_id']) ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                 </a>
                              <?php endif; ?>
                              <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $field['id_table'] ?>)">
                                 <i class="fas fa-trash"></i>
                              </button>
                           <?php endif; ?>
                           <?php if ($status == "Pengambilan") : ?>
                              <a href="<?= base_url('data/pengajuan/edit_selesai/' . $field['id_table']) ?>" class="btn btn-info btn-sm">
                                 <i class="fas fa-edit"></i>
                              </a>
                              <button type="button" class="btn btn-info btn-sm" onclick="confirmUpdateStatus(<?= $field['id_table'] ?>)">
                                 <i class="fas fa-edit"></i>
                              </button>
                              <a href="<?= base_url('data/pengajuan/print/' . $field['id_table'] . '/' . $field['penduduk_id']) ?>" class="btn btn-info btn-sm">
                                 <i class="fas fa-print"></i>
                              </a>
                           <?php endif; ?>
                           <?php if ($status == "Selesai") : ?>
                              <a href="<?= base_url('data/pengajuan/print/' . $field['id_table'] . '/' . $field['penduduk_id']) ?>" class="btn btn-info btn-sm">
                                 <i class="fas fa-print"></i>
                              </a>
                           <?php endif; ?>
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
   function confirmUpdateStatus(id) {
      if (confirm("Apakah Anda yakin ingin mengubah status ?")) {
         window.location.href = "<?= base_url('data/pengajuan/update_status/') ?>" + id;
      }
   }

   function confirmDelete(id) {
      if (confirm("Apakah Anda yakin ingin menghapus data ini ?")) {
         window.location.href = "<?= base_url('data/pengajuan/delete/') ?>" + id;
      }
   }
</script>