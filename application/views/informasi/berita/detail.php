<div class="container-fluid">
   <div class="row">

      <div class="col-md-9 col-xs-12">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title text-center mb-4"><?= $detail['judul'] ?></h5>
               <img src="<?= base_url('assets/images/berita/') . $detail['gambar'] ?>" alt="" class="card-img-top" width="100%" height="200" style="object-fit:contain">
               <div class="card-text mt-4" style="text-align: justify;"><?= htmlspecialchars_decode($detail['deskripsi']) ?></div>
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