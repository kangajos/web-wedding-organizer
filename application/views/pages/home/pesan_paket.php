<div class="row mb-5" style="background:white">
	<div class="col-md-12 mt-3">	
			<h4 class="text-center" style="color: green">DETAIL PAKET</h4>
	</div>
	<div class="col-md-10 offset-md-1 mb-5">
		<ul class="list-group text-center">
		  <li class="list-group-item" style="border: 1px solid lightgreen"><h3 style="color: green"><?=$paket->nama?></h3></li>
		  <li class="list-group-item" style="border: 1px solid lightgreen"><?=$paket->deskripsi?></li>
		  <li class="list-group-item" style="border: 1px solid lightgreen">
		  	<span style="padding: 5px; border: 2px solid orange; color: orange; font-family: cursive;width: auto;border-radius: 5px; font-size: 18px; font-weight: bold">Rp <?=number_format($paket->harga)?></span>
		  </li>
		  <li class="list-group-item">
		  	<form method="post" action="<?=base_url("home/proses_transaksi")?>">
		  		<div class="form-group row">
		  			<?php 
		  			$stop_date = new DateTime();
						$stop_date->format('Y-m-d'); 
						$stop_date->modify('+3 day');
						 ?>
		  			<div class="col-md-4">
		  				<input type="hidden" name="harga" value="<?=$paket->harga?>">
		  				<input type="hidden" name="paket_id" value="<?=$paket->paket_id?>">
		  				<input type="hidden" name="produk_id" value="0">
		  				<input type="hidden" name="jenis_pemesanan" value="paket">
		  				<label for="tanggal_mulai">Tanggal Mulai Acara</label>
			  			<input type="date" name="tanggal_mulai" class="form-control" value="<?=$stop_date->format('Y-m-d')?>" required>
			  			<label for="tanggal_selesai">Tanggal Selesai Acara</label>
			  			<?php $stop_date->modify('+1 day'); ?>
			  			<input type="date" name="tanggal_selesai" class="form-control" value="<?=$stop_date->format('Y-m-d')?>" required>
			  		</div>
		  			<div class="col-md-4">  				
			  			<label for="">Satuan Pesanan <sup>(minimal 1)</sup></label>
			  			<input type="number" name="qty" class="form-control" min="1" value="1" required>
			  			<span class="total text-danger"></span>
			  			<label for="">Pesan Untuk ADMIN</label>
			  			<textarea name="pesan" class="form-control" placeholder="Ketik pesan untuk admin.. (opsional)"></textarea>
		  			</div>
		  			<div class="col-md-4">
		  				<p><b>Peringatan !</b> <br></!br>Minimal pemesanan online di lakukan H-3 sebelum acara di berlangsung.</p>
		  				<button class="btn btn-success" type="submit">Kirim Pesanan</button>
		  			</div>
		  		</div>
		  	</form>
		  </li>
		</ul>
	</div>
</div>