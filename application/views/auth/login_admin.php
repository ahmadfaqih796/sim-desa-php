<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
   <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
         <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
               <div class="card mb-0">
                  <div class="card-body">
                     <h3 class="text-center">Sistem Informasi Desa Ulumamis Situnggaling</h3>
                     <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                        <!-- <img src="<?= base_url('assets/') ?>images/logos/dark-logo.svg" width="180" alt=""> -->
                     </a>
                     <p class="text-center">Login Admin</p>
                     <?= $this->session->flashdata('message'); ?>
                     <form action="<?= base_url('auth/admin'); ?>" method="post">
                        <div class="mb-3">
                           <label for="username" class="form-label">Username</label>
                           <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username'); ?>">
                           <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="mb-4">
                           <label for="password" class="form-label">Password</label>
                           <input type="password" class="form-control" name="password" id="password" value="<?= set_value('password'); ?>">
                           <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>