<div class="form-group">
    <h3 class="text-primary text-center">Edit Produk</h3>
</div>
<form action="<?= base_url('admin/produk/update_produk') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Jenis Produk</label>
        <input type="text" name="jenis_produk" class="form-control" value="<?=$content_data->jenis?>" placeholder="Masukkan jenis produk" required>
        <input type="hidden" name="produk_id" value="<?=$content_data->produk_id?>" required>
    </div>
    <div class="form-group">
        <label>Harga Produk (Rp)</label>
        <input type="number" name="harga_produk" class="form-control" value="<?=$content_data->harga?>" placeholder="Masukkan harga produk" required>
    </div>
    <div class="form-group">
        <img src="<?=base_url("uploads/".str_replace(' ','_',$content_data->gambar))?>" width="400px" alt=""><br>
        <label>Foto Produk</label>
        <input type="file" name="foto_produk" class="form-control" placeholder="Masukkan harga produk">
    </div>
    <div class="form-group">
        <label>Deskripsi Produk</label>
        <textarea name="deskripsi_produk" class="form-control" rows="3" cols="3" placeholder="Masukkan deskripsi produk"
                  required><?=$content_data->deskripsi?></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-info" type="submit">Save</button>
        <a href="<?=base_url("admin/produk")?>" class="btn btn-warning">Cencel</a>
    </div>
</form>
