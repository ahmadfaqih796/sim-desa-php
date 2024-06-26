<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
               <h5 class="card-title mb-0">Tambah <?= $title ?></h5>
            </div>
            <div class="col-md-6 col-xs-12 d-flex justify-content-end">
               <a href="<?= base_url('management/berita') ?>" class="btn btn-danger ms-3">
                  Kembali
               </a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
         <?= $this->session->flashdata('message'); ?>
         <form action="<?= base_url('management/berita/add') ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
               <label for="judul" class="form-label">Judul</label>
               <input type="text" class="form-control <?= form_error('judul') ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= set_value('judul') ?>">
               <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <!-- <div class="mb-3">
               <label for="deskripsi" class="form-label">Deskripsi</label>
               <textarea class="form-control <?= form_error('deskripsi') ? 'is-invalid' : '' ?>" id="deskripsi" name="deskripsi" rows="3"><?= set_value('deskripsi') ?></textarea>
               <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div> -->
            <div class="mb-3">
               <label for="deskripsi" class="form-label">Deskripsi</label>
               <textarea name="deskripsi" id="editor" class="form-control <?= form_error('deskripsi') ? 'is-invalid' : '' ?>"><?= set_value('deskripsi') ?></textarea>
               <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="mb-3">
               <label for="gambar" class="form-label">Gambar</label>
               <input type="file" class="form-control <?= form_error('gambar') ? 'is-invalid' : '' ?>" id="gambar" name="gambar" required>
               <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <!-- <div id="editor">This is some sample content.</div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>

   <!-- CKEditor -->
   <script>
      ClassicEditor
         .create(document.querySelector('#editor'))
         .then(editor => {
            console.log(editor);
         })
         .catch(error => {
            console.error(error);
         });
   </script>