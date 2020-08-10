<div class="row mt-5">
    <div class="col-md-4 offset-md-4" style="border: 1px solid #299926;">
        
        <h3 class="text-center text-muted"><span class="fa fa-user fa-3x"></span><br>LOGIN SYTEM</h3>
        <form class="form-horizontal mt-5" action="<?=base_url('Auth/aksi_login')?>" method="post">
            <div class="from-group">
                <?php if ($this->session->flashdata('msg')): ?>
                    <h4 class="alert alert-danger"><?=$this->session->flashdata('msg')?></h4>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required autofocus>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Msukkan Password" required>
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-block" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>