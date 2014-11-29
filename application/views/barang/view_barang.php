<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('inventory/tambahbarang') ?>">
					<i class="fa fa-plus"></i> Tambah Barang</a>
				<br>
				<br>
				<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nama</th>
								<th>Harga Beli</th>
								<th>Harga Jual</th>
								<th>Stok</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($barang->result() as $row): ?>
								<tr>
									<td><?= $row->id ?></td>
									<td><?= $row->nama ?></td>
									<td><?= $row->harga_beli ?></td>
									<td><?= $row->harga_jual ?></td>
									<td><?= $row->stok ?></td>
									<td>
										<a href="<?= site_url('inventory/updateBarang/'.$row->id) ?>">Edit</a>
										| <a href="<?= site_url('inventory/delete/barang/'.$row->id) ?>">Delete</a>
									</td>
								</tr>				
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- plugins -->
<script src="<?php echo base_url('assets/js/plugins/dataTables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/dataTables/dataTables.bootstrap.js') ?>"></script>
<script>
$(document).ready(function() {
    $('#dataTables-example').dataTable();
});
</script>