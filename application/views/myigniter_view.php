<!-- Form -->
<section class="section1">
	<div class="container">
	<div class="row">
	<div class="col-md-4">
			

	<div class="bs-example bs-example-tabs">
		<div>
		    <ul id="myTab" class="nav nav-tabs" role="tablist">
		      <li class="active"><a href="#home" role="tab" data-toggle="tab"><i class="fa fa-gear"></i> Auto</a></li>
		      <li class=""><a href="#profile" role="tab" data-toggle="tab"><i class="fa fa-gear"></i> Manual</a></li>
		    </ul>
	    </div>
	    <div id="myTabContent" class="tab-content">
	        <div class="tab-pane fade active in " id="home">
		      	<form id="form" action="" method="POST" role="form">
					<div class="input-group">
						<input id="kode" type="text" name="kode" autocomplete="off" autofocus="autofocus" class="form-control" placeholder="Kode" required="required">
					</div>
					<div align="right">		
					</div>
				</form>
		    </div>
		    <div class="tab-pane fade " id="profile">
		    	<form action="" method="POST" role="form">
		    		<div class="input-group">
						<input id="manual" type="text" name="kode" autocomplete="off" autofocus="autofocus" class="form-control" placeholder="Kode" required="required">
				      <span class="input-group-btn">
						<button type="button" class="btn btn-default tabs" id="tombol" > Add</button>
				      </span>
				    </div>
				</form>
	        </div>
	    </div>
	</div>

	</div>
	<div class="col-md-4 harga">
		<!--empty-->
	</div>
	<div class="col-md-4 harga">
		<a data-toggle="modal" href='#modal-id' class="kusus">
		<div class="kotak-harga">
			<div class="garis">
			  <span>BAYAR</span>
			  <h3 id="total" ></h3>
			</div>
		</div>
		</a>
	</div>
	</div>
	</div>
</section>
<!-- List Barang -->
<section>
	<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="table-responsive keranjang">
			</div>
		</div>
	</div>
	</div>
</section>
<!--Modal-->
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="tutup" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
				<h4 class="modal-title">KALKULATOR</h4>
			</div>
			<div class="modal-body text-center">
				<h4 class="totalan" ></h4>
				<form>
				<center >
				<input type="text" id="bayare" name="" class="form-control" required="required" placeholder="Bayar">
				</center>
				<div id="ganti">
				</div>
			</div>
			<div class="modal-footer">
					<button type="button" id="kembalian" class="btn btn-primary">KEMBALIAN</button>
					<a class="btn btn-success" href="<?=site_url("myigniter/selesai")?>">SLESAI</a>
				<form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.price_format.2.0.min.js') ?>"></script>
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
		$(this).addClass('disabled');
		konfirmasi();
	});

	kolom();
	total();

	var rupiah ={prefix: 'Rp. ', thousandsSeparator: '.', centsLimit: 0};
	$('#bayare').priceFormat(rupiah);
	$('#ganti');

	$('#kembalian').click(function() {
		site_url = '<?=site_url()?>';
		$.get(site_url+'/myigniter/total', function(data) {
			tot = data;
			bayare = $('#bayare').unmask();
			kembali = bayare - tot;
			$('#ganti').html('<h4 class="totalan">'+kembali+'</h4>');
			$('.totalan').priceFormat({prefix: 'Rp. ', thousandsSeparator: '.', centsLimit: 0});
	    });
	});

	$('.tutup').click(function() {
		/* Act on the event */

	});
});


function kolom()
{
  site_url = '<?=site_url()?>';
  $.get(site_url+'/myigniter/daftarkeranjang', function(data) {
    $(".keranjang").html(data);
  });
}

function total()
{
  site_url = '<?=site_url()?>';
  $.get(site_url+'/myigniter/total', function(data) {
    $("#total, .totalan").html(data).priceFormat({
		prefix: 'Rp. ',
	    thousandsSeparator: '.',
	    centsLimit: 0
    });
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
      }).done(function() {
		$("#tombol").removeClass('disabled');
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