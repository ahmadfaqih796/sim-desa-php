<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0"><?= $title ?></h5>
            </div>
            <?php if ($role == 1) : ?>
               <div class="col-md-6 col-xs-12 d-flex justify-content-end">
                  <a href="<?= base_url('informasi/blt/upload') ?>" class="btn btn-success ms-3">
                     <i class="fas fa-file-excel"></i> Upload
                  </a>
                  <a href="<?= base_url('informasi/blt/add') ?>" class="btn btn-primary ms-3">
                     <i class="fas fa-plus"></i> Tambah
                  </a>
               </div>
            <?php endif ?>
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
                     <!-- <th scope="col">NIK</th> -->
                     <th scope="col">Nama</th>
                     <th scope="col">Alamat</th>
                     <th scope="col">Batch</th>
                     <th scope="col">Desa</th>
                     <th scope="col">Kecamatan</th>
                     <th scope="col">Kabupaten</th>
                     <?php if ($role == 1) : ?>
                        <th scope="col">Action</th>
                     <?php endif ?>
                  </tr>
               </thead>
               <tbody>
                  <?php $i = 1;
                  foreach ($data as $field) : ?>
                     <tr>
                        <th style="width: 50px; text-align: center;"><?= $i ?></th>
                        <!-- <td><?= $field['nik'] ?></td> -->
                        <td><?= $field['n_blt'] ?></td>
                        <td><?= $field['alamat'] ?></td>
                        <td><?= $field['batch'] ?></td>
                        <td><?= $field['desa'] ?></td>
                        <td><?= $field['kecamatan'] ?></td>
                        <td><?= $field['kabupaten'] ?></td>
                        <?php if ($role == 1) : ?>
                           <td style="width: 80px;">
                              <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $field['id'] ?>)">
                                 <i class="fas fa-trash"></i>
                              </button>
                           </td>
                        <?php endif ?>
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
      if (confirm("Apakah Anda yakin ingin menghapus data penerimaan BLT ini?")) {
         window.location.href = "<?= base_url('informasi/blt/delete/') ?>" + id;
      }
   }
</script>