<div class="row mb-5" style="background:white">
	<div class="col-md-12 mt-3">	
			<h4 class="text-center" style="color: green">DETAIL PRODUK</h4>
	</div>
	<div class="col-md-6 mt-3">
		<img style="width: 100%" src="<?=base_url('uploads/'.str_replace(" ", "_", $produk->gambar))?>" alt="">
	</div>
	<div class="col-md-6 mt-3">
		<div class="table-responsive">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td>Nama Produk</td>
						<td><?=$produk->jenis?></td>
					</tr>
					<tr>
						<td>Harga Produk</td>
						<td><span style="padding: 5px; border-radius: 5px; border: 2px solid orange; font-size: 24px;color: orange">Rp. <?=number_format($produk->harga)?></span></td>
					</tr>
					<tr>
						<td>Keterangan Produk</td>
						<td><?=$produk->deskripsi?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<hr>
		<form method="post" action="<?=base_url("home/proses_transaksi")?>">
  		<div class="row">
  			<?php 
  			$stop_date = new DateTime();
				$stop_date->format('Y-m-d'); 
				$stop_date->modify('+3 day');
				 ?>
  			<div class="col-md-12">
  				<div class="form-group">
	  				<input type="hidden" name="harga" value="<?=$produk->harga?>">
	  				<input type="hidden" name="paket_id" value="0">
	  				<input type="hidden" name="produk_id" value="<?=$produk->produk_id?>">
	  				<input type="hidden" name="jenis_pemesanan" value="produk">
	  				<label for="tanggal_mulai">Tanggal Mulai Acara</label>
		  			<input type="date" name="tanggal_mulai" class="form-control" value="<?=$stop_date->format('Y-m-d')?>" required>
		  			<label for="tanggal_selesai">Tanggal Selesai Acara</label>
		  			<?php $stop_date->modify('+1 day'); ?>
		  			<input type="date" name="tanggal_selesai" class="form-control" value="<?=$stop_date->format('Y-m-d')?>" required>
  				</div>
	  		</div>
  			<div class="col-md-12">  				
  				<div class="form-group">
		  			<label for="">Satuan Pesanan <sup>(minimal 1)</sup></label>
		  			<input type="number" name="qty" class="form-control" min="1" value="1" required>
		  			<span class="total text-danger"></span><br>
		  			<label for="">Pesan Untuk ADMIN</label>
		  			<textarea name="pesan" class="form-control" placeholder="Ketik pesan untuk admin.. (opsional)"></textarea>
  				</div>
  			</div>
  			<div class="col-md-12">
  				<div class="form-group">
	  				<p><b>Peringatan !</b> <br></!br>Minimal pemesanan online di lakukan H-3 sebelum acara di berlangsung.</p>
  					<button class="btn btn-success" type="submit">Kirim Pesanan</button>
  				</div>
  			</div>
  		</div>
  	</form>
	</div>
</div>