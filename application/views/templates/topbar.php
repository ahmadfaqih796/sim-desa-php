<?php
$role = $this->session->userdata('role_id');
$result = false;
if ($role === 1) {
   $users = $this->db->get_where('users', ['id' => $this->session->userdata('user_id')])->row_array();
}
if ($role === 2) {
   $users = $this->db->get_where('penduduk', ['id' => $this->session->userdata('user_id')])->row_array();
}
$base_image_url = base_url('assets/images/profile/user-1.jpg');
if ($users['photo']) {
   $base_image_url = base_url('assets/images/profil/') . $users['photo'];
}
?>
<!--  Main wrapper -->
<div class="body-wrapper">
   <!--  Header Start -->
   <header class="app-header" id="navbar">
      <nav class="navbar navbar-expand-lg navbar-light">
         <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
               <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                  <i class="ti ti-menu-2 text-white"></i>
               </a>
            </li>
            <!-- <li class="nav-item">
               <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                  <i class="ti ti-bell-ringing"></i>
                  <div class="notification bg-primary rounded-circle"></div>
               </a>
            </li> -->
         </ul>
         <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
               <li class="nav-item dropdown">
                  <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                     <img src="<?= $base_image_url ?>" alt="" width="35" height="35" class="rounded-circle">
                     <p class="fs-3 mb-0 text-white ms-2"><?= $this->session->userdata('fullname') ?></p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                     <div class="message-body">
                        <a href="<?= base_url('setting/profil') ?>" class="d-flex align-items-center gap-2 dropdown-item">
                           <i class="ti ti-user fs-6"></i>
                           <p class="mb-0 fs-3">My Profile</p>
                        </a>
                        <a href="<?= base_url('auth/logout') ?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </nav>
   </header>
   <!--  Header End -->