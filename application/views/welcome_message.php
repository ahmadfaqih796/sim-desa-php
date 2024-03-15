<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<h5 class="card-title fw-semibold mb-4">Sample Page</h5>
			<p class="mb-0">This is a sample page sas</p>
			<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">
				<i class="fas fa-plus"></i> Tambah
			</button>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalLabel">Add Posyandu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('management/posyandu') ?>" method="post">
				<div class="modal-body">
					<input type="hidden" name="user_id" id="user_id" value="<?= $this->session->userdata('user_id'); ?>">
					<input type="hidden" name="addData" id="addData" value="true">
					<div class="form-group">
						<label for="n_posyandu">Nama Posyandu</label>
						<input type="text" class="form-control" name="n_posyandu" id="n_posyandu" value="<?= set_value('n_posyandu'); ?>">
						<?= form_error('n_posyandu', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" name="alamat" id="alamat" value="<?= set_value('alamat'); ?>">
						<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= set_value('keterangan'); ?>">
						<?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>