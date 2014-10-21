<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>myIgniter:: Client Kasir 1.0</title>

		<!-- Bootstrap CSS -->
		<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
		<style type="text/css">
			.client{
				font-size:2em;
			}
		</style>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="page-header text-center">
						  <h1>PEMBAYARAN</h1>
						</div>
					</div>
				</div>
			</div>
		</header>

		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-hover client">
								<thead>
									<tr>
										<th>Barang</th>
										<th style="text-align:right">Harga</th>
									</tr>
								</thead>
								<tbody>								
								<?php if(empty($this->cart->contents())){
									echo "<tr><td colspan='5' class='text-center'>Data Kosong</td></tr>";
									}else{ ?>
									<?php foreach ($this->cart->contents() as $items): ?>
									<tr>								
									  <td><?= $items['name'] ?> x<?= $items['qty'] ?></td>
									  <td align="right">Rp <?php echo $total = $items['price']*$items['qty']; ?>,-</td>
									</tr>
								<?php endforeach; ?>
								<tr>
									<td><b>Total</b></td>
									<td align="right"> Rp <?= $this->cart->total() ?>,-</td>
								</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- jQuery -->
		<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js') ?>"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	</body>
</html>