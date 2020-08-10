<h3 class="text-success"><?=(isset($title) ) ? $title : ''?></h3>

<div class="content">
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  	<?php 
  	$result = $this->produk->get_all_produk();
  	 ?>
  	 <?php foreach ($result as $key => $value): ?>	 	
	    <div class="carousel-item <?=($key == 0) ? 'active' : '' ?>">
	      <img src="<?=base_url('uploads/'.str_replace(" ", "_", $value->gambar))?>" class="d-block w-100" alt="..." style="height: 90vh;">
	    </div>
  	 <?php endforeach ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>