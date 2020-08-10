<h4 class="text-muted" style="border-bottom: 2px solid green; padding-bottom: 3px ">
	Produk
	<span class="pull-right">
		<a href="" style="color: orange; font-size: 18px">Semua Produk 
		<span class="fa fa-chevron-right"></span></a>
	</span>
</h4>

<div class="row mb-3 mt-3" style="background-color: white;padding-top: 15px">
<?php foreach ($produk as $key => $value): ?>
	<div class="col-md-4 mb-3">	
		<div class="card" style="border: 1px solid lightgreen !important">
		  <img class="card-img-top" style="height: 300px !important" src="<?=base_url('uploads/'.str_replace(" ", "_", $value->gambar))?>" alt="Card image cap">
		  <div class="card-body">
		    <h5 class="card-title text-center" style="color: green"><?=mb_strtoupper($value->jenis)?></h5>
		    <!-- <p class="card-text text-muted text-center"><?=substr($value->deskripsi, 0,150)?>...</p> -->
		    <h6 style="padding: 5px" class="text-center">
		    	<b style="padding: 5px; border: 2px solid orange; color: orange; font-family: cursive;width: auto;border-radius: 5px">Rp. <?=number_format($value->harga)?></b>
		    </h6>
		    <a href="<?=base_url("home/pesan_produk/$value->produk_id")?>" class="btn btn-primary btn-md btn-block" style="background: green !important"><i class="fa fa-shopping-cart"></i> PESAN SEKARANG</a>
		  </div>
		</div>
	</div>
<?php endforeach ?>
</div>

<h4 class="text-muted" style="border-bottom: 2px solid green; padding-bottom: 3px ">
	Paket
	<span class="pull-right">
		<a href="" style="color: orange; font-size: 18px">Semua Paket 
		<span class="fa fa-chevron-right"></span></a>
	</span>
</h4>
<div class="row mb-3 mt-3" style="background-color: white;padding-top: 15px">
	<?php foreach ($paket as $key => $value): ?>	
	<div class="col-md-4">
		<ul class="list-group text-center">
		  <li class="list-group-item" style="border: 1px solid lightgreen"><h3 style="color: green"><?=$value->nama?></h3></li>
		  <li class="list-group-item" style="border: 1px solid lightgreen"><?=$value->deskripsi?></li>
		  <li class="list-group-item" style="border: 1px solid lightgreen">
		  	<span style="padding: 5px; border: 2px solid orange; color: orange; font-family: cursive;width: auto;border-radius: 5px; font-size: 18px; font-weight: bold">Rp <?=number_format($value->harga)?></span>
		  </li>
		  <li class="list-group-item" style="border: 1px solid lightgreen">
		  	<a href="<?=base_url("home/pesan_paket/$value->paket_id")?>" class="btn btn-primary btn-sm btn-block" style="background: green !important"><i class="fa fa-shopping-cart"></i> PESAN SEKARANG</a>
		  </li>
		</ul>
	</div>
	<?php endforeach ?>
</div>