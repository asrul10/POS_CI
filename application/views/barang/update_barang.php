<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('inventory/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit Barang</legend>
					<?php foreach ($update->result() as $val): ?>
						
					<div class="form-group">
						<label for="">Id</label>
						<input type="text" class="form-control" value="<?= $val->id ?>" name="id" placeholder="Input Id" disabled="disabled">
						<input type="text" value="<?= $val->id ?>" name="id"  hidden="hidden">
					</div>
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" class="form-control" value="<?= $val->nama ?>" name="nama" placeholder="Input Nama">
					</div>
					<div class="form-group">
						<label for="">Harga Beli</label>
						<input type="text" class="form-control" value="<?= $val->harga_beli ?>" name="hargabeli" placeholder="Input Harga Beli">
					</div>
					<div class="form-group">
						<label for="">Harga Jual</label>
						<input type="text" class="form-control" value="<?= $val->harga_jual ?>" name="hargajual" placeholder="Input Harga Jual">
					</div>
					<div class="form-group">
						<label for="">Stok</label>
						<input type="text" class="form-control" value="<?= $val->stok ?>" name="stok" placeholder="Input Stok">
					</div>				
					<a class="btn btn-default" href="<?= site_url('inventory') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
