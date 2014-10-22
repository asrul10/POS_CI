<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('inventory/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Barang</legend>

					<div class="form-group">
						<label for="">Id</label>
						<input type="text" class="form-control" name="id" placeholder="Input Id">
					</div>
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" class="form-control" name="nama" placeholder="Input Nama">
					</div>
					<div class="form-group">
						<label for="">Harga Beli</label>
						<input type="text" class="form-control" name="hargabeli" placeholder="Input Harga Beli">
					</div>
					<div class="form-group">
						<label for="">Harga Jual</label>
						<input type="text" class="form-control" name="hargajual" placeholder="Input Harga Jual">
					</div>
					<div class="form-group">
						<label for="">Stok</label>
						<input type="text" class="form-control" name="stok" placeholder="Input Stok">
					</div>				
					<a class="btn btn-default" href="<?= site_url('inventory') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
