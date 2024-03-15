<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0">Dusun</h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="javascript:void(0)" class="btn btn-success">
                  <i class="fas fa-print"></i> Cetak</a>
               <a href="<?= base_url('management/dusun/add') ?>" class="btn btn-primary ms-3">
                  <i class="fas fa-plus"></i> Tambah
               </a>

            </div>
         </div>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th scope="col">No</th>
                     <th scope="col">Dusun</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i = 1;
                  foreach ($data as $field) : ?>
                     <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $field['n_dusun'] ?></td>
                        <td>
                           <a href="<?= base_url('management/dusun/edit/' . $field['id']) ?>" class="btn btn-success btn-sm">
                              <i class="fas fa-edit"></i>
                           </a>
                           <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?= $field['id'] ?>">
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