<?php if (!empty($produk) || !empty($paket)): ?>
    <style type="text/css">
        table {
            font-size: 14px !important;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <?php if ($this->session->flashdata('msg')): ?>
                <h4 class="alert alert-success"><?= $this->session->flashdata('msg') ?></h4>
            <?php endif ?>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                       aria-controls="home" aria-selected="true">Pesanan Produk Member</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                       aria-controls="profile" aria-selected="false">Pesanan Paket Member</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent" style="background: white !important">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h4 class="text-right" style="color: orange; padding: 10px">Kalender : <?= date('l, Y-m-d') ?></h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="font-family: 'arial', sans-serif;">
                            <thead class="my-bg">
                            <tr>
                                <th>Detail Produk</th>
                                <th>Gambar Produk</th>
                                <th>Detail Pemesanan</th>
                                <th>Status Pemesanan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (!empty($produk)) {
                                foreach ($produk as $key => $value):
                                    $produk = $this->pemesanan->get_produk(['produk_id' => $value->produk_id]);
                                    $harga = $produk->harga;
                                    $gambar = str_replace(' ', '_', $produk->gambar);
                                    ?>
                                    <tr>
                                        <td width="350px">
                                            Kode Produk : <b class="text-success"><?= $value->kode_pemesanan ?></b>
                                            <hr>
                                            Harga Produk : Rp <b class="text-success"><?= number_format($harga) ?></b>
                                            <hr>
                                            Nama Produk : <b class="text-success"><?= $produk->jenis ?></b>
                                            <hr>
                                            Deskripasi Produk : <b
                                                    class="text-success text-justify"><?= $produk->deskripsi ?></b>
                                        </td>
                                        <td>

                                            <img src="<?= base_url("uploads/$gambar") ?>" alt=""
                                                 style="height: 300px; width: 300px">
                                        </td>
                                        <td>
                                            <b>
                                                Tgl pesan : <br><span
                                                        class="text-success"><?= $value->tanggal_pemesanan ?></span>
                                                <hr>
                                                Tgl mulai - selesai : <br><span
                                                        class="text-success"><?= $value->tanggal_mulai ?> - <?= $value->tanggal_selesai ?></span>
                                                <hr>
                                                Pesan saya :<br>
                                                <span class="text-justify text-success"><?= $value->pesan ?></span>
                                                <hr>
                                                Jumlah Pesanan : <span
                                                        class="text-danger"><?= $value->jumlah_sewa ?></span> produk
                                                <br>
                                                Tagihan : Rp <span
                                                        style="color:green; font-size: 24px"><?= number_format($value->jumlah_sewa * $harga) ?></span>
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
                                            <a onclick="return confirm('Yakin ingin batalkan pesanan ini ?')"
                                               href="<?= base_url("cart/cancel/$value->pemesanan_id") ?>"
                                               class="btn btn-danger btn-sm">Tolak Pesanan ?</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h4 class="text-right" style="color: orange; padding: 10px">Kalender : <?= date('l, Y-m-d') ?></h4>
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
                            if (!empty($paket)) {
                                foreach ($paket as $key => $value):
                                    $paket = $this->pemesanan->get_paket(['paket_id' => $value->paket_id]);
                                    $harga = $paket->harga; ?>
                                    <tr>
                                        <td width="350px">
                                            Kode paket : <b class="text-success"><?= $value->kode_pemesanan ?></b>
                                            <hr>
                                            Harga Paket : Rp <b class="text-success"><?= number_format($harga) ?></b>
                                            <hr>
                                            Nama Paket : <b class="text-success"><?= $paket->nama ?></b>
                                            <hr>
                                            Deskripasi Paket : <b
                                                    class="text-success text-justify"><?= $paket->deskripsi ?></b>
                                        </td>
                                        <td>
                                            <b>
                                                Tgl pesan : <span
                                                        class="text-success"><?= $value->tanggal_pemesanan ?></span>
                                                <hr>
                                                Tgl mulai - selesai : <br><span
                                                        class="text-success"><?= $value->tanggal_mulai ?> - <?= $value->tanggal_selesai ?></span>
                                                <hr>
                                                Pesan saya :<br>
                                                <span class="text-justify text-success"><?= $value->pesan ?></span>
                                                <hr>
                                                Jumlah Pesanan : <span
                                                        class="text-danger"><?= $value->jumlah_sewa ?></span> Paket <br>
                                                Tagihan : Rp <span
                                                        style="color:green; font-size: 24px"><?= number_format($value->jumlah_sewa * $harga) ?></span>
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
                                            <a onclick="return confirm('Yakin ingin batalkan pesanan ini ?')"
                                               href="<?= base_url("cart/cancel/$value->pemesanan_id") ?>"
                                               class="btn btn-danger btn-sm">Tolak Pesanan ?</a>
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

<?php endif ?>