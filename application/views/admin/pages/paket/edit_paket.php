<div class="form-group">
    <h3 class="text-primary text-center">Edit Paket</h3>
</div>
<form action="<?= base_url('admin/produk/update_paket') ?>" method="post">
    <div class="form-group">
        <label>Jenis Paket</label>
        <input type="text" name="jenis_paket" class="form-control" value="<?=$content_data->nama?>" placeholder="Masukkan jenis produk" required>
        <input type="hidden" name="paket_id" value="<?=$content_data->paket_id?>" required>
    </div>
    <div class="form-group">
        <label>Harga Paket (Rp)</label>
        <input type="number" name="harga_paket" class="form-control" value="<?=$content_data->harga?>" placeholder="Masukkan harga produk" required>
    </div>
    <div class="form-group">
        <label>Deskripsi Paket</label>
        <textarea class="form-control" name="deskripsi_paket" rows="3" cols="3"
                  placeholder="Masukkan deskripsi produk required"><?=$content_data->deskripsi?></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-info" type="submit">Save</button>
        <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
    </div>
</form>