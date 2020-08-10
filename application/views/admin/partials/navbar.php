<!-- <nav style="background: white; padding: 10px; font-family: cursive;">
  <div class="container text-center" style="color: green; font-family: cursive;">
    <style type="text/css">
      .text-style{ border:1px solid green; padding: 2px; border-radius: 5px; margin: auto; width: 30px; text-align: center; }
    </style>
    <span class="fa fa-whatsapp text-style"></span> +62812356776 &emsp;
    <span class="fa fa-instagram text-style"> </span> Wedding-organizer &emsp;
    <span class="fa fa-facebook text-style"> </span> Wedding-organizer &emsp;
    <span class="fa fa-envelope text-style"> </span> Wedding-organizer
  </div>
</nav> -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background:#0d2d6c !important; border-bottom: 5px solid orange; border-top: 3px solid lightgreen">
    <div class="container">            
      <a class="navbar-brand" href="<?=base_url('admin')?>">WEDDING ORGANIZER</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          
         <!--  <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
        <style type="text/css">
          /*.modif{
            border: 1px solid lightblue !important;
            margin: 3px;
            border-radius: 5px;
            padding: 5px !important;
          }
          .modif:hover{
            background: lightblue;
          }*/
        </style>
        <ul class="navbar-nav ">   
            <li class="nav-item active">
                <a class="nav-link modif" href="<?=base_url('admin/pemesanan')?>"><i class="fa fa-shopping-cart"></i> Pemesanan</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link modif" href="<?=base_url('admin/produk')?>"><i class="fa fa-shopping-cart"></i> Porduk</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link modif" href="<?=base_url('admin/produk/paket')?>"><i class="fa fa-shopping-cart"></i> Paket</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link modif" href="<?=base_url('admin/chat_bot')?>"><i class="fa fa-envelope"></i> Chat Bot</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link modif" href="<?=base_url('admin/member')?>"><i class="fa fa-user"></i> Member</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link modif" onclick="return confirm('Anda yakin ?')" href="<?=base_url('Auth/out')?>"><i class="fa fa-power-off"></i> LOG-OUT</a>
            </li>
        </ul>
      </div>
    </div>
</nav>