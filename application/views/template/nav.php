<nav class="navbar navbar-default" role="navigation">
			<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">KASIR</a>
			</div>
		
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kasir <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?= site_url('myigniter') ?>">Kasir</a></li>
							<li><a href="<?= site_url('myigniter/penjualan') ?>">Penjualan</a></li>
							<li><a href="<?= site_url('myigniter/setoran') ?>">Setoran</a></li>
						</ul>
					</li>
					<li><a href="<?= site_url('inventory') ?>">Inventory</a></li>
					<li><a href="<?= site_url('myigniter/client') ?>" target="_blank">Client</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
			</div>
		</nav>