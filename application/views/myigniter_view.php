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
		      	<form id="form" action="" method="POST" role="form">
					<div class="form-group">
						<label>Kode</label>
						<input id="kode" type="text" name="kode" autocomplete="off" autofocus="autofocus" class="form-control" placeholder="Kode" required="required">
					</div>
					<div align="right">		
					</div>
				</form>
		    </div>
		    <div class="tab-pane fade " id="profile">
		    	<form action="" method="POST" role="form">
					<div class="form-group">
						<label>Kode</label>
						<input id="manual" type="text" name="kode" autocomplete="off" autofocus="autofocus" class="form-control" placeholder="Kode" required="required">
					</div>
					<div align="right">		
						<button type="button" class="btn btn-primary tabs" id="tombol"> Tambah</button>
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
			  <h1 id="total"></h1>
				<button onclick="hapusSemua()" class="btn btn-default">Hapus Semua</button>
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
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</section>
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
<script>
$(function() {
	var availableTags = [
	  <?php foreach ($cari->result() as $row): ?>
	  	"<?= $row->id ?>",
	  <?php endforeach ?>
	];
	$( "#manual" ).autocomplete({
	  source: availableTags
	});

	$('#myTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	})

	$('#kode').keyup(function() {
	    konfirmasi();
	});

	$('#tombol').click(function() {
		konfirmasi();
	});

	kolom();
	total();
});


function kolom()
{
  site_url = '<?=site_url()?>';
  $.get(site_url+'/myigniter/daftarkeranjang', function(data) {
    $("tbody").html(data);
  });
}

function total()
{
  site_url = '<?=site_url()?>';
  $.get(site_url+'/myigniter/total', function(data) {
    $("#total").html(data)
  });
}

function konfirmasi()
{
    setTimeout(function(){
   	  site_url = '<?=site_url()?>';
   	  var cek = $("#kode").val();

      if (cek == '') {
	      var id = $("#manual").val();
      }else{
	      var id = $("#kode").val();
      }

      $.get(site_url+'/myigniter/keranjang/'+id, function() {
        /*optional stuff to do after success */
        $("#kode").val('');
        $("#manual").val('');
        kolom();
        total();
      });
      //$('#form').submit();
    }, 700);
}

function hapusSemua()
{
	site_url = '<?=site_url()?>';
	$.get(site_url+'/myigniter/delete', function() {
		/*optional stuff to do after success */
		kolom();
        total();	
	});
}
</script>