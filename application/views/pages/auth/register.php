<form action="<?=base_url('auth/save_register')?>" method="post">
	<h4 class="text-muted text-center mt-2">FORM REGISTER</h4>
<div class="row mt-5">
		<div class="col-md-4 offset-md-2">
				<div class="form-group">
					<label for="">Username</label>
					<input type="email" name="username" class="form-control" placeholder="Email (gunakan email aktif.)" required>
					<!-- <p class="text-danger">Untuk username gunakan E-mail Anda.</p> -->
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password" class="form-control" placeholder="Password" required>
				</div>
				<div class="form-group">
					<label for="">Nama Lengkap</label>
					<input type="text" name="nama" class="form-control" placeholder="Nama lengkap Anda." required>
				</div>
				<div class="form-group">
					<label for="">No HP</label>
					<input type="text" name="no_hp" class="form-control" placeholder="Nomer Hp Anda." required>
				</div>
		</div>

		<div class="col-md-4">
				<div class="form-group">
					<label for="">Alamat</label>
					<input type="alamat" name="alamat" class="form-control" placeholder="Masukkan alamat Anda." required>
				</div>
				<div class="form-group">
					<label for="">Kelurahan</label>
					<input type="text" name="keluarahan" class="form-control" placeholder="Masukkan nama keluarahan Anda." required>
				</div>
				<div class="form-group">
					<label for="">Kecamatan</label>
					<input type="text" name="kecamatan" class="form-control" placeholder="Masukkan nama kecamatan Anda." required>
				</div>
				<div class="form-group">
					<label for="">Kabupaten</label>
					<input type="text" name="kabupaten" class="form-control" placeholder="Masukkan nama kabupaten Anda." required>
				</div>
		</div>
		<div class="col-md-6 offset-md-3">
			<div class="form-group text-center">
				<button onclick="return confirm('Yakin data yang Anda masukkan sudah benar ?')" class="btn btn-success btn-block" type="submit">Register Now !</button>
				<a href="<?=base_url('auth/login')?>" class="text-primary text-center"> I have account ?</a>
			</div>
		</div>
</div>
</form>