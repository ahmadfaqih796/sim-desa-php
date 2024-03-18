<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0"><?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('data/pengajuan/add') ?>" class="btn btn-primary ms-3">
                  <i class="fas fa-plus"></i> Tambah
               </a>
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
                     if ($field['tgl_selesai']) {
                        $status = "Selesai";
                     } elseif ($field['tgl_pengambilan']) {
                        $status = "Pengambilan";
                     } else {
                        $status = "Pengajuan";
                     }
                  ?>
                     <tr>
                        <th style="width: 50px; text-align: center;"><?= $i ?></th>
                        <td><?= $field['no_pengajuan'] ?></td>
                        <td><?= $field['fullname'] ?></td>
                        <td><?= $status ?></td>
                        <td><?= $field['tgl_pengajuan'] ?></td>
                        <td><?= $field['layanan'] ?></td>
                        <td style="width: 80px;">
                           <a href="<?= base_url('data/pengajuan/edit/' . $field['id']) ?>" class="btn btn-success btn-sm">
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
         window.location.href = "<?= base_url('data/pengajuan/delete/') ?>" + id;
      }
   }
</script>