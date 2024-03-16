<?php
$sidebarMenu = array(
   array(
      "text" => "Home",
      "role" => array(1, 2, 6),
      "submenu" => array(
         array(
            "url" => "home/dashboard",
            "text" => "Dashboard",
            "icon" => "ti ti-layout-dashboard",
            "role" => array(1),
         ),
      )
   ),
   array(
      "text" => "Management",
      "role" => array(1, 2, 6),
      "submenu" => array(
         array(
            "url" => "management/dusun",
            "text" => "Dusun",
            "icon" => "fas fa-fw fa-user",
            "role" => array(1),
         ),
      )
   ),
);

$userRole = $_SESSION['role_id'];
$filteredMenu = array();

foreach ($sidebarMenu as $menu) {
   if (in_array($userRole, $menu['role'])) {
      $filteredMenu[] = $menu;
   }
}

?>

<aside class="left-sidebar">
   <!-- Sidebar scroll-->
   <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
         <a href="./index.html" class="text-nowrap logo-img">
            <img src="<?= base_url('assets/') ?>/images/logos/dark-logo.svg" width="180" alt="" />
         </a>
         <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
         </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
         <ul id="sidebarnav">
            <?php foreach ($sidebarMenu as $menuItem) : ?>
               <?php $isActiveMenu = ''; ?>
               <?php if (isset($menuItem['submenu'])) : ?>
                  <li class="nav-small-cap">
                     <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu"><?= $menuItem['text'] ?></span>
                  </li>
                  <?php foreach ($menuItem['submenu'] as $subMenuItem) : ?>
                     <?php $isActive = (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], $subMenuItem['url']) !== false) ? 'active' : ''; ?>
                     <li class="sidebar-item <?= $isActive ?>">
                        <a class="sidebar-link" href="<?= base_url($subMenuItem['url']) ?>" aria-expanded="false">
                           <span>
                              <i class="<?= $subMenuItem['icon'] ?>"></i>
                           </span>
                           <span class="hide-menu"><?= $subMenuItem['text'] ?></span>
                        </a>
                     </li>
                  <?php endforeach; ?>
               <?php else : ?>
                  <?php $isActive = (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], $menuItem['url']) !== false) ? 'active' : ''; ?>
                  <li class="sidebar-item <?= $isActive ?>">
                     <a class="sidebar-link" href="<?= base_url($menuItem['url']) ?>" aria-expanded="false">
                        <span>
                           <i class="<?= $menuItem['icon'] ?>"></i>
                        </span>
                        <span class="hide-menu"><?= $menuItem['text'] ?></span>
                     </a>
                  </li>
               <?php endif; ?>
            <?php endforeach; ?>
         </ul>
      </nav>
      <!-- End Sidebar navigation -->
   </div>
   <!-- End Sidebar scroll-->
</aside>