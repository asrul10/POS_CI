<!-- Header -->
<header>
	<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<div class="page-header">
			  <h1>APLIKASI KASIR</h1>
			</div>
		</div>
	</div>
	</div>
</header>
<!-- Form -->
<section>
	<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<form action="<?= site_url('myigniter/keranjang') ?>" method="POST" role="form">
				<div class="form-group">
					<label>Kode</label>
					<input type="text" name="kode" autocomplete="off" autofocus="autofocus" class="form-control" id="" placeholder="Kode" required="required">
					<label>Quantity</label>
					<input type="text" name="qty"  autocomplete="off" class="form-control" id="" placeholder="Quantity" required="required">
				</div>
				<div align="right">		
					<button type="submit" class="btn btn-primary">Tambah</button>
					<a href="<?= site_url('myigniter/delete') ?> " class="btn btn-danger">Hapus</a>		
					<a href="<?= site_url('myigniter/selesai') ?> " class="btn btn-success">Selesai</a>
				</div>
			</form>
		</div>
		<div class="col-lg-4 harga">
			  <h1><small>Total Rp.</small></h1>
		</div>
		<div class="col-lg-4 harga">
			<div align="right">
			  <h1><?= $this->cart->total() ?>,-</h1>
			</div>					
		</div>
	</div>
	</div>
</section>
<!-- List Barang -->
<section>
	<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="table-responsive">
				<table class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<th>Kode</th>
							<th>Nama</th>
							<th>Quantity</th>
							<th>Harga Satuan</th>
							<th>Harga Total</th>
						</tr>
					</thead>
					<tbody>
						<?php if(empty($this->cart->contents())){
							echo "<tr><td colspan='5' class='text-center'>Data Kosong</td></tr>";
						} ?>
						<?php foreach ($this->cart->contents() as $items): ?>
							<tr>
							  <td><?= $items['id'] ?></td>
							  <td><?= $items['name'] ?></td>
							  <td><?= $items['qty'] ?></td>
							  <td><?= $items['price'] ?></td>
							  <td><?php echo $total = $items['price']*$items['qty']; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</section>