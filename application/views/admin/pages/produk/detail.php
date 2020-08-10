<form action="<?= base_url('admin/produk/save_produk') ?>" method="post" enctype="multipart/form-data">
    <div class="form-grup">
        <label>Jenis Produk</label>
        <input type="text" name="jenis_produk" class="form-control" placeholder="Masukkan jenis produk" required>
    </div>
    <div class="form-grup">
        <label>Harga Produk (Rp)</label>
        <input type="number" name="harga_produk" class="form-control" placeholder="Masukkan harga produk" required>
    </div>
    <div class="form-grup">
        <label>Foto Produk</label>
        <input type="file" name="foto_produk" class="form-control" placeholder="Masukkan harga produk" required>
    </div>
    <div class="form-grup">
        <label>Deskripsi Produk</label>
        <textarea name="deskripsi_produk" class="form-control" rows="3" cols="3" placeholder="Masukkan deskripsi produk"
                  required></textarea>
    </div>
    <div class="form-grup">
        <button class="btn btn-info" type="submit">Save</button>
        <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
    </div>
</form>