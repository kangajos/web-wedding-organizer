<?php if ($this->session->userdata('status') === true): ?>
	<?php if (! empty($produk) || ! empty($paket)): ?>
		<div class="row">
			<div class="col-md-12">
				<?php if ($this->session->flashdata('msg')): ?>			
				<h4 class="alert alert-success"><?=$this->session->flashdata('msg')?></h4>
				<?php endif ?>
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pesanan Produk Saya</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Pesanan Paket Saya</a>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent" style="background: white !important">
				  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				  	<h4 class="text-right" style="color: orange; padding: 10px">Kalender : <?=date('l, Y-m-d')?></h4>
				  	<div class="table-responsive">
				  		<table class="table table-striped table-hover" style="font-family: 'arial', sans-serif;">
				  			<thead style="background: green; color: white; ">
				  				<tr>
				  					<th>Detail Produk</th>
				  					<th>Gambar Produk</th>
				  					<th>Detail Pemesanan</th>
				  					<th>Status Pemesanan</th>
				  				</tr>
				  			</thead>
				  			<tbody>
				  				<?php
				  				if (! empty($produk) )
				  				{
				  				foreach ($produk as $key => $value): 
		  						$produk = $this->cart->get_produk(array('produk_id' => $value->produk_id));
		  						$harga =  $produk->harga;
		  						$gambar = str_replace(' ', '_', $produk->gambar);
		  						 ?>	
				  				<tr>
				  					<td width="350px">
				  						Kode Produk : <b class="text-success"><?=$value->kode_pemesanan?></b>
				  						<hr>
				  						Harga Produk : Rp <b class="text-success"><?=number_format($harga)?></b>
				  						<hr>
				  						Nama Produk : <b class="text-success"><?=$produk->jenis?></b>
				  						<hr>
				  						Deskripasi Produk : <b class="text-success text-justify"><?=$produk->deskripsi?></b>
				  					</td>
				  					<td>
				  						
				  						<img src="<?=base_url("uploads/$gambar") ?>" alt="" style="height: 300px; width: 300px">
				  					</td>
				  					<td>
				  						<b>
				  							Tgl pesan : <br><span class="text-success"><?=$value->tanggal_pemesanan?></span>
					  						<hr>
					  						Tgl mulai - selesai : <br><span class="text-success"><?=$value->tanggal_mulai?> - <?=$value->tanggal_selesai?></span>
					  						<hr>
					  						Pesan saya :<br>
					  						<span class="text-justify text-success"><?=$value->pesan?></span>
					  						<hr>
					  						Jumlah Pesanan : <span class="text-danger"><?=$value->jumlah_sewa?></span> produk <br>
					  						Tagihan : Rp <span style="color:green; font-size: 24px"><?=number_format($value->jumlah_sewa * $harga)?></span>
				  						</b>
				  					</td>
				  					<td align="center">
				  						<span style="background-color: green; padding: 5px; border-radius: 5px; color: white">
				  						<?php 
				  						switch ($value->status) {
				  							case 1:
				  								$status = "Pending";
				  								break;
				  							case 2:
				  								$status = "Proses";
				  								break;
				  							default:
				  								$status = "Pemesanan berhasil";
				  								break;
				  						}
				  						echo $status;
				  						 ?></span>
				  						 <hr>
				  						 <a onclick="return confirm('Yakin ingin batalkan pesanan ini ?')" href="<?=base_url("cart/cancel/$value->pemesanan_id")?>" class="btn btn-danger btn-sm">Batalkan Pemesanan ?</a>
				  					</td>
				  				</tr>
				  				<?php endforeach ?>
				  			<?php	} ?>
				  			</tbody>
				  		</table>
				  	</div>
				  </div>
				  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				  	<h4 class="text-right" style="color: orange; padding: 10px">Kalender : <?=date('l, Y-m-d')?></h4>
				  	<div class="table-responsive">
				  		<table class="table table-striped table-hover" style="font-family: 'arial', sans-serif;">
				  			<thead style="background: green; color: white; ">
				  				<tr>
				  					<th>Detail Paket</th>
					  				<th>Detail Pemesanan</th>
					  				<th>Status</th>
					  			</tr>				  				
				  			</thead>
				  			<tbody>
				  				<?php
				  				if (! empty($paket) ) 
				  				{				  				 	
				  				foreach ($paket as $key => $value): 
				  				$paket = $this->cart->get_paket(array('paket_id' => $value->paket_id));
		  						$harga =  $paket->harga; ?>	
				  				<tr>
				  					<td width="350px">
				  						Kode paket : <b class="text-success"><?=$value->kode_pemesanan?></b>
				  						<hr>
				  						Harga Paket : Rp <b class="text-success"><?=number_format($harga)?></b>
				  						<hr>
				  						Nama Paket : <b class="text-success"><?=$paket->nama?></b>
				  						<hr>
				  						Deskripasi Paket : <b class="text-success text-justify"><?=$paket->deskripsi?></b>
				  					</td>
				  					<td>
				  						<b>
				  							Tgl pesan : <span class="text-success"><?=$value->tanggal_pemesanan?></span>
					  						<hr>
					  						Tgl mulai - selesai : <br><span class="text-success"><?=$value->tanggal_mulai?> - <?=$value->tanggal_selesai?></span>
					  						<hr>
					  						Pesan saya :<br>
					  						<span class="text-justify text-success"><?=$value->pesan?></span>
					  						<hr>
					  						Jumlah Pesanan : <span class="text-danger"><?=$value->jumlah_sewa?></span> Paket <br>
					  						Tagihan : Rp <span style="color:green; font-size: 24px"><?=number_format($value->jumlah_sewa * $harga)?></span>
				  						</b>
				  					</td>
				  					<td align="center">
				  						<span style="background-color: green; padding: 5px; border-radius: 5px; color: white">
				  						<?php 
				  						switch ($value->status) {
				  							case 1:
				  								$status = "Pending";
				  								break;
				  							case 2:
				  								$status = "Proses";
				  								break;
				  							default:
				  								$status = "Pemesanan berhasil";
				  								break;
				  						}
				  						echo $status;
				  						 ?></span>
				  						 <hr>
				  						 <a onclick="return confirm('Yakin ingin batalkan pesanan ini ?')" href="<?=base_url("cart/cancel/$value->pemesanan_id")?>" class="btn btn-danger btn-sm">Batalkan Pemesanan ?</a>
				  					</td>
				  				</tr>
				  				<?php endforeach ?>
				  				<?php } ?>
				  			</tbody>
				  		</table>
				  	</div>
				  </div>
				</div>
			</div>
		</div>
	<?php else: ?>
		<div class="row">
			<div class="col-md-6 offset-md-3 text-danger text-center mt-5" style="border: 2px solid salmon; padding: 20px;border-radius: 10px">
					<span class="fa fa-shopping-cart fa-5x"></span>
					<h4 class="text-center mt-3">Keranjang Anda masih kosong.</h4>
					<a href="<?=base_url('Home')?>" class="btn btn-dark mt-3 mb-3">CARI PRODUK SEKARANG!</a>
			</div>
		</div>
	<?php endif ?>
<?php else:  ?>
	<div class="row">
			<div class="col-md-6 offset-md-3 text-danger text-center mt-5" style="border: 2px solid salmon; padding: 20px;border-radius: 10px">
					<span class="fa fa-warning fa-5x"></span>
					<h5 class="text-center mt-3">Silahkan melakukan <b>LOGIN</b> terlebih dahulu untuk membuaka <b>History</b> Keranjang Anda.</h5>
					<a href="<?=base_url('Auth/login')?>" class="btn btn-dark mt-1">LOGIN SEKARANG!</a>
					<h4 class="text-center mt-1">atau Anda belum punya Akun ?</h4>
					<a href="<?=base_url('Auth/register')?>" class="btn btn-dark mt-1 mb-3">DAFTAR AKUN SEKARANG!</a>
			</div>
		</div>
<?php endif ?>