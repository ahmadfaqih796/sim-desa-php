<div class="container-fluid">
   <div class="row">

      <div class="col-md-9 col-xs-12">
         <div class="card">
            <div class="card-body text-center">
               <h5 class="card-title mb-0">Berita</h5>
               <br>
               <div class="row">
                  <?php foreach ($berita as $b) :
                     $deskripsi = htmlspecialchars_decode($b['deskripsi']);
                  ?>
                     <div class="col-md-4 col-xs-12">
                        <div class="card border border-success shadow">
                           <div class="card-body">
                              <h5 class="card-title mb-3"><?= $b['judul'] ?></h5>
                              <img src="<?= base_url('assets/images/berita/') . $b['gambar'] ?>" alt="" class="card-img-top" width="100%" height="160" style="object-fit:contain">
                              <p>
                                 <?= strlen($deskripsi) > 100 ? substr($deskripsi, 0, 100) . '...' : $deskripsi; ?>
                              </p>
                              <a href="<?= base_url('home/dashboard/berita/') . $b['id'] ?>" class="btn btn-primary mt-3">Lihat Detail</a>
                           </div>
                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>
            </div>
         </div>
      </div>

      <div class="col-md-3 col-xs-12">
         <div class="card">
            <div class="card-body text-center">
               <h5 class="card-title mb-0">Jadwal Wirid Akbar</h5>
               <br>
               <?php foreach ($schedule as $s) : ?>
                  <div class="card border border-success shadow">
                     <div class="card-body">
                        <h5 class="card-title mb-3"><?= $s['n_jadwal'] ?></h5>
                        <i class="fas fa-map-marker-alt"></i>
                        <p class="card-text"><?= $s['lokasi'] ?></p>
                        <i class="fas fa-clock"></i>
                        <p class="card-text"><?= date('j F Y', strtotime($s['tanggal'])) . ', ' .  $s['pukul'] ?></p>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
      </div>

   </div>