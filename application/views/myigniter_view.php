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
		<div class="col-md-4">
			

	<div class="bs-example bs-example-tabs">
	    <ul id="myTab" class="nav nav-tabs" role="tablist">
	      <li class="active"><a href="#home" role="tab" data-toggle="tab">Auto</a></li>
	      <li class=""><a href="#profile" role="tab" data-toggle="tab">Manual</a></li>
	    </ul>

	    <div id="myTabContent" class="tab-content">
	        <div class="tab-pane fade active in" id="home">
		      	<form id="form" action="<?= site_url('myigniter/keranjang') ?>" method="POST" role="form">
					<div class="form-group">
						<label>Kode</label>
						<input id="kode" type="text" name="kode" autocomplete="off" autofocus="autofocus" class="form-control" placeholder="Kode" required="required">
					</div>
					<div align="right">		
					</div>
				</form>
		    </div>
		    <div class="tab-pane fade " id="profile">
		    	<form action="<?= site_url('myigniter/keranjang') ?>" method="POST" role="form">
					<div class="form-group">
						<label>Kode</label>
						<input type="text" name="kode" autocomplete="off" autofocus="autofocus" class="form-control" placeholder="Kode" required="required">
					</div>
					<div align="right">		
						<button type="submit" class="btn btn-primary tabs"> Tambah</button>
					</div>
				</form>
	        </div>
	    </div>
	</div>

		</div>
		<div class="col-md-4 harga">
			  <h1><small>Total Rp.</small></h1>
		</div>
		<div class="col-md-4 harga">
			<div align="right">
			  <h1><?= $this->cart->total() ?>,-</h1>
				<a href="<?= site_url('myigniter/delete') ?> " class="btn btn-default">Hapus Semua</a>
				<a href="<?= site_url('myigniter/selesai') ?> " class="btn btn-success"> Selesai</a>		
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
							<th>Hapus</th>
						</tr>
					</thead>
					<tbody>
						<?php if(empty($this->cart->contents())){
							echo "<tr><td colspan='6' class='text-center'>Data Kosong</td></tr>";
						} ?>
						<?php foreach ($this->cart->contents() as $items): ?>
							<tr>
							  <td><?= $items['id'] ?></td>
							  <td><?= $items['name'] ?></td>
							  <td><?= $items['qty'] ?></td>
							  <td><?= $items['price'] ?></td>
							  <td><?php echo $total = $items['price']*$items['qty']; ?></td>
							  <td><a href="<?= site_url('myigniter/deleterow/'.$items['rowid']) ?>">Hapus</a> </td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</section>