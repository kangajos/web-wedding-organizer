<h3 class="text-success"><?=(isset($title) ) ? $title : ''?></h3>
<div class="form-group">
	<button class="btn btn-primary" data-target="#tambah-produk" data-toggle="modal"><i class="mdi mdi-plus"></i> Tambah Paket Baru</button>
</div>
<div class="table responsive">
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Jenis Paket</th>
				<th>Deskripsi Paket</th>
				<th>Harga Paket (Rp)</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($paket as $key => $value): ?>
			<tr>
				<td><?=$key+1?></td>
				<td><?=$value->nama?></td>
				<td><?=$value->deskripsi?></td>
				<td><b style="background: green; padding: 6px; border-radius: 5px; color: white">Rp <?=number_format($value->harga)?></b></td>
				<td>
					<a href="<?=base_url('admin/Produk/edit_paket/'.$value->paket_id)?>" class="btn btn-info btn-md">Edit</a>
					<a onclick="return confirm('Yakin ?')" href="<?=base_url('admin/Produk/delete_paket/'.$value->paket_id)?>" class="btn btn-danger btn-md">Hapus</a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

<div class="modal fade" id="tambah-produk" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="text-info">
					Tambah Paket Baru
				</h4> <button class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?=base_url('admin/produk/save_paket')?>" method="post">				
				<div class="modal-body" style="background: white !important">
					<div class="form-grup">
						<label>Jenis Paket</label>
						<input type="text" name="jenis_paket" class="form-control" placeholder="Masukkan jenis produk" required>
					</div>
					<div class="form-grup">
						<label>Harga Paket (Rp)</label>
						<input type="number" name="harga_paket" class="form-control" placeholder="Masukkan harga produk" required>
					</div>
					<!-- <div class="form-grup">
						<label>Foto Produk</label>
						<input type="file" class="form-control" placeholder="Masukkan harga produk" required>
					</div> -->
					<div class="form-grup">
						<label>Deskripsi Paket</label>
						<textarea class="form-control" name="deskripsi_paket" rows="3" cols="3" placeholder="Masukkan deskripsi produk required"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<div class="form-grup">
						<button class="btn btn-info" type="submit">Save</button>
						<button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>