<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
   <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
         <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
               <div class="card mb-0">
                  <div class="card-body">
                     <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                        <h1>SIM DESA</h1>
                        <!-- <img src="<?= base_url('assets/') ?>images/logos/dark-logo.svg" width="180" alt=""> -->
                     </a>
                     <p class="text-center">Login User</p>
                     <?= $this->session->flashdata('message'); ?>
                     <form action="<?= base_url('auth'); ?>" method="post">
                        <div class="mb-3">
                           <label for="nik" class="form-label">NIK</label>
                           <input type="text" class="form-control" name="nik" id="nik" value="<?= set_value('nik'); ?>">
                           <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="mb-4">
                           <label for="password" class="form-label">Password</label>
                           <input type="password" class="form-control" name="password" id="password" value="<?= set_value('password'); ?>">
                           <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <!-- <div class="d-flex align-items-center justify-content-between mb-4">
                           <div class="form-check">
                              <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                              <label class="form-check-label text-dark" for="flexCheckChecked">
                                 Remeber this Device
                              </label>
                           </div>
                           <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a>
                        </div> -->
                        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                        <!-- <div class="d-flex align-items-center justify-content-center">
                           <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                           <a class="text-primary fw-bold ms-2" href="./authentication-register.html">Create an account</a>
                        </div> -->
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>