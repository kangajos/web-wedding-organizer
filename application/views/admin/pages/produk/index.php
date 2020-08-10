<h3 class="text-success"><?=(isset($title) ) ? $title : ''?></h3>
<div class="form-group">
	<button class="btn btn-primary" data-target="#tambah-produk" data-toggle="modal"><i class="mdi mdi-plus"></i> Tambah Produk Baru</button>
</div>
<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Jenis Produk</th>
				<!-- <th>Deskripsi Produk</th> -->
				<th>Harga & Deskirpsi</th>
				<th>Foto Produk</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($produk as $key => $value): ?>		
			<tr>
				<td><?=$key+1?></td>
				<td><?=$value->jenis?></td>
				<td width="300" class="text-center">
					<span class="bg-success text-white p-1">Rp <?=number_format($value->harga)?></span>
					<hr>
					<span class="text-center"><?=$value->deskripsi?></span>
				</td>
				<td class="text-center">
					<img style="border-radius: 1px!important; height: 200px; width: 200px;" src="<?=base_url('uploads/'.str_replace(" ", "_", $value->gambar))?>">
				</td>
				<td>
					<a href="<?=base_url('admin/Produk/edit_produk/'.$value->produk_id)?>" class="btn btn-info btn-md">Edit</a>
					<a onclick="return confirm('Yakin ?')" href="<?=base_url('admin/Produk/delete_produk/'.$value->produk_id)?>" class="btn btn-danger btn-md">Hapus</a>
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
					Tambah Produk Baru
				</h4> <button class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?=base_url('admin/produk/save_produk')?>" method="post" enctype="multipart/form-data">				
				<div class="modal-body" style="background: white !important">
					<div class="form-group">
						<label>Jenis Produk</label>
						<input type="text" name="jenis_produk" class="form-control" placeholder="Masukkan jenis produk" required>
					</div>
					<div class="form-group">
						<label>Harga Produk (Rp)</label>
						<input type="number" name="harga_produk" class="form-control" placeholder="Masukkan harga produk" required>
					</div>
					<div class="form-group">
						<label>Foto Produk</label>
						<input type="file" name="foto_produk" class="form-control" placeholder="Masukkan harga produk" required>
					</div>
					<div class="form-group">
						<label>Deskripsi Produk</label>
						<textarea name="deskripsi_produk" class="form-control" rows="3" cols="3" placeholder="Masukkan deskripsi produk"required></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<div class="form-group">
						<button class="btn btn-info" type="submit">Save</button>
						<button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>