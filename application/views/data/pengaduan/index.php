<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0"><?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <?php if ($role == 2) : ?>
                  <a href="<?= base_url('data/pengaduan/add') ?>" class="btn btn-primary ms-3">
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
                     <th scope="col">Judul</th>
                     <th scope="col">Deskripsi</th>
                     <th scope="col">Status</th>
                     <th scope="col">Created By</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i = 1;
                  foreach ($data as $field) : ?>
                     <tr>
                        <th style="width: 50px; text-align: center;"><?= $i ?></th>
                        <td><?= $field['judul'] ?></td>
                        <td><?= $field['deskripsi'] ?></td>
                        <td><?= $field['status'] ?></td>
                        <td><?= $field['created_by'] ?></td>
                        <td style="width: 80px;">
                           <?php if ($role == 1 && $field['status'] == "pending") : ?>
                              <button type="button" class="btn btn-info btn-sm" onclick="confirmUpdate(<?= $field['id_table'] ?>)">
                                 <i class="fas fa-edit"></i>
                              </button>
                           <?php endif; ?>
                           <?php if ($role == 2 && $field['status'] == "pending") : ?>
                              <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $field['id_table'] ?>)">
                                 <i class="fas fa-trash"></i>
                              </button>
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
   function confirmUpdate(id) {
      if (confirm("Apakah Anda yakin ingin mengubah status data ini?")) {
         window.location.href = "<?= base_url('data/pengaduan/update/') ?>" + id;
      }
   }

   function confirmDelete(id) {
      if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
         window.location.href = "<?= base_url('data/pengaduan/delete/') ?>" + id;
      }
   }
</script>