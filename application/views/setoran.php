<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('inventory/setoranSubmit') ?>" method="POST" role="form">
					<legend>Setoran</legend>

					<div class="form-group">
						<label for="">Penyetor</label>
						<input type="text" class="form-control" name="nama"  disabled="disabled">						
						<input type="text" name="nama"  hidden="hidden">						
					</div>
					<div class="form-group">
						<label for="">Tanggal Jual</label>
						<select name="" id="input" class="form-control" required="required">
							<?php foreach ($setoran->result() as $row): ?>
								<option value="<?= $row->tgl ?>"><?= $row->tgl ?></option>
							<?php endforeach ?>
						</select>					
					</div>
					<div class="form-group">
						<label for="">Setoran</label>
						<input type="text" class="form-control" name="setor" required="required">
					</div>				
					<a class="btn btn-default" href="<?= site_url('inventory') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
