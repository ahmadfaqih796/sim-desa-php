<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $title ?></title>
   <style>
      /* Styling for header */
      .header {
         width: 100%;
         padding: 10px;
         text-align: center;
         border-bottom: 1px solid black;
      }

      p {
         font-size: 12px;
      }

      .logo {
         width: 100px;
      }

      .table {
         border-collapse: collapse;
         width: 100%;
         font-size: 12px;
         text-align: left;
      }

      .table1 {
         width: 100%;
         font-size: 12px;
         text-align: left;
      }

      .table tr td,
      .table tr th {
         font-size: 12px;
         padding: 5px;
         vertical-align: top;
         /* border: 1px solid black; */
      }

      .table tr td:nth-child(1),
      .table tr th:nth-child(1) {
         width: 200px;
      }

      .table tr td:nth-child(2),
      .table tr th:nth-child(2) {
         width: 10px;
      }

      h1 {
         font-size: 20px;
         text-align: center;
      }
   </style>
</head>

<body>
   <table class="header">
      <tr>
         <td>
            <img src="<?= $_SERVER['DOCUMENT_ROOT']; ?>/assets/images/logos/<?= $desa['photo'] ?>" width="100 " border="0" alt="Logo" class="logo">
         </td>
         <td>
            <h1>PEMERINTAH KABUPATEN MEDAN</h1>
            <h1>KECAMATAN KOTA BANGUN</h1>
            <h1>Kepala Desa <?= $desa['n_desa'] ?></h1>
            <br>
            <p><?= $desa['alamat'] ?></p>
            <!-- <p>MEDAN</p> -->
         </td>
      </tr>
   </table>
   <h1 style="text-decoration: underline;">
      <!-- <?= $detail['layanan'] ?> -->
      SURAT KETERANGAN TIDAK MAMPU
   </h1>
   <h1>Nomor : ...../..../.../<?= date('Y') ?></h1>
   <br>
   <p>
      Kepala Desa Ulumamis Situnggaling Kecamatan Saipar Dolok Hole Kabupaten Tapanuli Selatan menerangkan bahwa :
   </p>
   <table class="table" width="100%" cellspacing="0">
      <thead>
         <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?= $detail['fullname'] ?></td>
         </tr>
         <tr>
            <td>Tempat Tgl. Lahir</td>
            <td>:</td>
            <td><?= $detail['tempat_lahir'] . ', ' . $detail['tgl_lahir'] ?></td>
         </tr>
      </thead>
   </table>
   <p>
      Adalah benar anak kandung dari:
   </p>
   <table class="table" width="100%" cellspacing="0">
      <thead>
         <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?= $detail['fullname'] ?></td>
         </tr>
         <tr>
            <td>Tempat Tgl. Lahir</td>
            <td>:</td>
            <td><?= $detail['tempat_lahir'] . ', ' . $detail['tgl_lahir'] ?></td>
         </tr>
         <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?= ($detail['jk'] == 'L' ? 'Laki-laki' : 'Perempuan') ?></td>
         </tr>
         <tr>
            <td>Agama</td>
            <td>:</td>
            <td><?= $detail['n_dusun'] ?></td>
         </tr>
         <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td><?= $detail['pekerjaan'] ?></td>
         </tr>
         <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $detail['pekerjaan'] ?></td>
         </tr>
      </thead>
   </table>
   <p>
      Benar nama yang tercantum di atas adalah warga Desa Ulumamis Situnggaling Kecamatan Saipar Dolok Hole Kabupaten Tapanuli Selatan.. dengan sepengetahuan kami dan sesuai dengan data yang ada di kantor kepala desa Ulumamis Situnggaling . orang tersebut di atas adalah keluarga kurang mampu <b>(KELUARGA BERPENGHASILAN RENDAH)</b>
   </p>
   <p>
      Demikian surat keterangan ini dibuat dengan sebenarnya agar dapat dipergunakan seperlunya.
   </p>
   <div style="width: 50%;float: right;">
      <p>Dibuat di : <?= $desa['n_desa'] ?></p>
      <p>Pada Tanggal : <?= date('d-m-Y') ?></p>
   </div>
   <div style="width: 100%;">
      <div class="ttd" align="left" style="width: 50%;float: left;">
         <!-- <p>Tanda Tangan Pemegang</p>
         <br>
         <br>
         <br>
         <br>
         <p>(<?= $detail['fullname'] ?>)</p> -->
      </div>
      <div class="ttd" align="right" style="width: 50%;float: right;">
         <p style="text-align: center;">Kepala Desa <?= $desa['n_desa'] ?></p>
         <br style="margin-top: -10cm; margin-bottom: -20cm;">
         <br>
         <br>
         <br>
         <p style="text-align: center;"><?= $desa['n_kepala_desa'] ?></p>
      </div>
   </div>
</body>

</html>