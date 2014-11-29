<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('myigniter/setoranSubmit') ?>" method="POST" role="form">
					<div class="form-group">
						<label for="">Penyetor</label>
						<input type="text" class="form-control" name="nama" required="required">						
					</div>
					<div class="form-group">
						<label for="">Tanggal Jual</label>
						<select name="tgljual" class="form-control" required="required">
							<?php foreach ($setoran->result() as $row): ?>
								<option value="<?= $row->tgl ?>"><?= $row->tgl ?></option>
							<?php endforeach ?>
						</select>					
					</div>
					<div class="form-group">
						<label for="">Setoran</label>
						<input type="text" class="form-control" name="setor" required="required">
					</div>				
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
