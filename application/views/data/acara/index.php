<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0"><?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('data/acara/add') ?>" class="btn btn-primary ms-3">
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
                     <th scope="col">Nama Acara</th>
                     <th scope="col">Deskripsi</th>
                     <th scope="col">Tanggal</th>
                     <th scope="col">Tamu</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i = 1;
                  foreach ($data as $field) : ?>
                     <tr>
                        <th style="width: 50px; text-align: center;"><?= $i ?></th>
                        <td><?= $field['n_acara'] ?></td>
                        <td><?= $field['deskripsi'] ?></td>
                        <td><?= $field['tanggal'] ?></td>
                        <td>
                           <?php
                           $tamu = $this->db->get_where('tamu', ['acara_id' => $field['id']])->result_array();
                           foreach ($tamu as $tm) :
                           ?>
                              <li><?= $tm['n_tamu'] ?></li>
                           <?php endforeach; ?>

                        </td>
                        <td style="width: 100px;">
                           <a href="<?= base_url('data/acara/tamu/' . $field['id']) ?>" class="btn btn-info btn-sm">
                              <i class="fas fa-plus"></i>
                           </a>
                           <a href="<?= base_url('data/acara/edit/' . $field['id']) ?>" class="btn btn-success btn-sm">
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
         window.location.href = "<?= base_url('data/acara/delete/') ?>" + id;
      }
   }
</script>