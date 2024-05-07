</div>
</div>
<script src="<?= base_url('assets/') ?>libs/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>js/sidebarmenu.js"></script>
<script src="<?= base_url('assets/') ?>js/app.min.js"></script>
<script src="<?= base_url('assets/') ?>libs/simplebar/dist/simplebar.js"></script>

<!-- DataTables JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
   $(document).ready(function() {
      $('#myTable').DataTable({
         paging: true // Aktifkan pagination
      });
   });
</script>

</body>

</html>