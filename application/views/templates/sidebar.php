<?php
$sidebarMenu = array(
   array(
      "text" => "Home",
      "role" => array(1, 2),
      "submenu" => array(
         array(
            "url" => "home/dashboard",
            "text" => "Dashboard",
            "icon" => "ti ti-layout-dashboard",
            "role" => array(1, 2),
         ),
      )
   ),
   array(
      "text" => "Management",
      "role" => array(1),
      "submenu" => array(
         array(
            "url" => "management/dusun",
            "text" => "Dusun",
            "icon" => "ti ti-home",
            "role" => array(1),
         ),
         array(
            "url" => "management/penduduk",
            "text" => "Penduduk",
            "icon" => "ti ti-user",
            "role" => array(1),
         ),
         array(
            "url" => "management/surat",
            "text" => "Surat",
            "icon" => "ti ti-news",
            "role" => array(1),
         ),
         array(
            "url" => "management/berita",
            "text" => "Berita",
            "icon" => "ti ti-news",
            "role" => array(1),
         ),
      )
   ),
   array(
      "text" => "Data",
      "role" => array(1, 2),
      "submenu" => array(
         array(
            "url" => "data/pengajuan",
            "text" => "Pengajuan",
            "icon" => "ti ti-file",
            "role" => array(1, 2),
         ),
         array(
            "url" => "data/laporan",
            "text" => "Laporan",
            "icon" => "ti ti-file",
            "role" => array(1),
         ),
         array(
            "url" => "data/pengaduan",
            "text" => "Pengaduan",
            "icon" => "ti ti-file",
            "role" => array(1, 2),
         ),
      )
   ),
   array(
      "text" => "Informasi",
      "role" => array(1),
      "submenu" => array(
         array(
            "url" => "informasi/blt",
            "text" => "Penerimaan BLT",
            "icon" => "ti ti-file",
            "role" => array(1),
         ),
         array(
            "url" => "informasi/schedule",
            "text" => "Jadwal Wirid Akbar",
            "icon" => "ti ti-file",
            "role" => array(1),
         ),
      )
   ),
   array(
      "text" => "Pengaturan",
      "role" => array(1, 2),
      "submenu" => array(
         array(
            "url" => "setting/profil",
            "text" => "Profil",
            "icon" => "ti ti-user",
            "role" => array(1, 2),
         ),
         array(
            "url" => "setting/desa",
            "text" => "Desa",
            "icon" => "ti ti-home",
            "role" => array(1),
         ),
      )
   ),
);

$userRole = $this->session->userdata('role_id');
if (!$userRole) {
   $this->notification->notify_error('auth', 'Sessi anda telah habis, silahkan login kembali');
}
$filteredMenu = array();

// foreach ($sidebarMenu as $menu) {
//    if (in_array($userRole, $menu['role'])) {
//       $filteredMenu[] = $menu;
//    }
// }

foreach ($sidebarMenu as $menu) {
   $filteredSubmenu = array();

   foreach ($menu['submenu'] as $submenu) {
      if (in_array($userRole, $submenu['role'])) {
         $filteredSubmenu[] = $submenu;
      }
   }

   if (!empty($filteredSubmenu)) {
      $menu['submenu'] = $filteredSubmenu;
      $filteredMenu[] = $menu;
   }
}

?>

<!-- Sidebar Color-->
<aside class="left-sidebar" id="sidebar">
   <!-- Sidebar scroll-->
   <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
         <a href="./index.html" class="text-nowrap logo-img">
            <!-- <i class="ti ti-home"></i> -->
            <h4 class="text-center" style="font-size: 16px;">Desa Ulumamis Situnggaling</h4>

            <!-- <img src="<?= base_url('assets/') ?>/images/logos/dark-logo.svg" width="180" alt="" /> -->
         </a>
         <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
         </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
         <ul id="sidebarnav">
            <?php foreach ($filteredMenu as $menuItem) : ?>
               <?php $isActiveMenu = ''; ?>
               <?php if (isset($menuItem['submenu'])) : ?>
                  <li class="nav-small-cap">
                     <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu"><?= $menuItem['text'] ?></span>
                  </li>
                  <?php foreach ($menuItem['submenu'] as $subMenuItem) :

                     $url = $_SERVER['REQUEST_URI'];
                     $parsed_url = parse_url($url);
                     $path = $parsed_url['path'];
                     $path_parts = explode('/', trim($path, '/'));
                     $desired_url = '/' . $path_parts[0];

                     // echo $_SERVER['REQUEST_URI'];
                     // echo '<br>';
                     // echo strpos($url, $subMenuItem['url']);
                     // echo '<br>';
                     // echo $subMenuItem['url'];
                     // echo '<br>';
                     // echo $desired_url;


                     $isActive = (isset($_SERVER['REQUEST_URI']) && strpos($desired_url, $subMenuItem['url']) != false) ? 'active' : '';
                  ?>
                     <li class="sidebar-item <?= $isActive ?>">
                        <a class="sidebar-link" href="<?= base_url($subMenuItem['url']) ?>" aria-expanded="false">
                           <span>
                              <i class="<?= $subMenuItem['icon'] ?>"></i>
                           </span>
                           <span class="hide-menu"><?= $subMenuItem['text'] ?></span>
                        </a>
                     </li>
                  <?php endforeach; ?>
                  <!-- <?php else : ?>
                  <?php $isActive = (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], $menuItem['url']) !== false) ? 'active' : ''; ?>
                  <li class="sidebar-item <?= $isActive ?>">
                     <a class="sidebar-link" href="<?= base_url($menuItem['url']) ?>" aria-expanded="false">
                        <span>
                           <i class="<?= $menuItem['icon'] ?>"></i>
                        </span>
                        <span class="hide-menu"><?= $menuItem['text'] ?></span>
                     </a>
                  </li>
               <?php endif; ?> -->
               <?php endforeach; ?>
         </ul>
      </nav>
      <!-- End Sidebar navigation -->
   </div>
   <!-- End Sidebar scroll-->
</aside>