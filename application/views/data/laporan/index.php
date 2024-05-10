<div class="container-fluid">
   <div class="row">

      <div class="col-md-3 col-xs-12">
         <div class="card">
            <div class="card-body text-center">
               <h5 class="card-title mb-0">Penduduk</h5>
               <br>
               <h1><?= $total['penduduk'] ?></h1>
            </div>
         </div>
      </div>

      <div class="col-md-3 col-xs-12">
         <div class="card">
            <div class="card-body text-center">
               <h5 class="card-title mb-0">Dusun</h5>
               <br>
               <h1><?= $total['dusun'] ?></h1>
            </div>
         </div>
      </div>

      <div class="col-md-6 col-xs-12">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title mb-0 text-center mb-3">Pengajuan</h5>
               <table class="table align-middle border mb-0 border-dark border-2">
                  <thead>
                     <tr>
                        <th>
                           <h5 class="card-title mb-0">Status</h5>
                        </th>
                        <th>
                           <h5 class="card-title mb-0">Total</h5>
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <h5 class="mb-0">Proses</h5>
                        </td>
                        <td>
                           <h1><?= $total['pengajuan']['proses'] ?></h1>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <h5 class="mb-0">Pengambilan</h5>
                        </td>
                        <td>
                           <h1><?= $total['pengajuan']['pengambilan'] ?></h1>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <h5 class="mb-0">Selesai</h5>
                        </td>
                        <td>
                           <h1><?= $total['pengajuan']['selesai'] ?></h1>
                        </td>
                     </tr>
                  </tbody>
               </table>

            </div>
         </div>
      </div>

   </div>