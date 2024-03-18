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

<!-- Quill for editor content -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
   var quill = new Quill('#editor', {
      theme: 'snow',
      modules: {
         toolbar: [
            [{
               header: [1, 2, 3, 4, 5, 6, false]
            }],
            // [{
            //    font: []
            // }],
            ["bold", "italic"],
            // ["link", "blockquote", "code-block", "image"],
            [{
               list: "ordered"
            }, {
               list: "bullet"
            }, {
               align: []
            }],
            // [{
            //    script: "sub"
            // }, {
            //    script: "super"
            // }],
            [{
               color: []
            }, {
               background: []
            }],
         ]
      },
   });
   quill.on('text-change', function(delta, oldDelta, source) {
      document.querySelector("input[name='deskripsi']").value = quill.root.innerHTML;
   });
</script>
</body>

</html>