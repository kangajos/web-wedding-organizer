<div class="col-md-5 offset-md-4" style="position: fixed; bottom: 1px; float: right;right: 0px" class="text-center chart">
    <div class="collapse" id="collapseExample">
      <div class="card card-body" style="border: 2px solid lightgrey !important;overflow-y: scroll !important;max-height: 500px;min-height: 200px;">

      	<div class="content"> 		
	        <h4 class="text-muted">ChatBot</h4><hr>
	        <div class="chat-bot" style="width: 100%">	
	        	<p style="margin-bottom: 0px !important;font-size:12px; color: white;"><span class="fa fa-user"></span> Admin</p>
	        	<p class="text-left"  style="margin-right: 4em; width: auto;font-size:16px!important; background-color: silver;color: black; padding: 5px; border-radius: 10px">Halo kak, ada yang bisa kami bantu ... ?</p>
	        </div>
	        <div class="chat"></div>
      	<!-- </div> -->


        <!-- <div class="row container"> 	 -->
	       <form id="myChat" method="post" style="width: 100%;">
	            <div class="input-group mb-3">
	            	<style type="text/css">
	            		button,input:focus{
	            			box-shadow: none !important;
	            		}
	            	</style>
	              <input type="text" class="form-control border-0" name="chat" style="font-size: 13px !important;border-bottom: 2px solid green !important;" placeholder="Ketik pertanyaan Anda, lalu enter">
	              <div class="input-group-append">
	                <button class="btn btn-success kirim-chat border-0 bg-transparent" type="submit" data-url="<?=base_url('admin/Chat_bot/chat')?>"><span class="fa fa-paper-plane"></span></button>
	              </div>
	            </div>
	        </form>
        </div>

      </div>
    </div>
    <button type="button" class="btn btn-md pull-right" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><span class="fa fa-comments fa-2x"></span> Chat</button>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function(){
		// hitung total
				$('[name="qty"]').on('keyup', function()
		{
			var qty = parseInt($('[name="qty"]').val());
			var harga = parseInt($('[name="harga"]').val());
			var tota = qty*harga;
			if (! isNaN(tota)) {	
				$('.total').html(` Total harus di bayar : Rp `+qty*harga);
			}else{
				$('.total').html(` Total harus di bayar : Rp 0`);
			}
		})

		var qty = parseInt($('[name="qty"]').val());
			var harga = parseInt($('[name="harga"]').val());
			var tota = qty*harga;
			if (! isNaN(tota)) {	
				$('.total').html(` Total harus di bayar : Rp `+qty*harga);
			}else{
				$('.total').html(` Total harus di bayar : Rp 0`);
			}

		// chatbot
		$('.kirim-chat').on('click', function(e){
			e.preventDefault();
			var chat = $('[name="chat"]').val();
			var url = $(this).data('url');
			if (chat.length > 0) {

				$.ajax({
					url : url,
					type : 'post',
					dataType : 'JSON',
					data : $('#myChat').serialize(),
					success : function(result)
					{
						// alert(result);
						console.log(result);
							var tanya = $('[name="chat"]').val();
							$('.chat-bot').append(`
								<p class="text-right text-danger" style="margin-left: 6em; font-size:13px!important;color: black;text-align:right; "><span style="border-radius: 10px;padding: 5px;">`+tanya+`</span></p>
								<p style="margin-bottom: 0px !important;width:font-size:12px; color: white"><span class="fa fa-user"></span> Admin</p>
        				<p class="text-left text-success" style="margin-right: 6em; font-size:13px!important;color: white;text-align:left;"><span style="border-radius: 10px;padding: 5px;">`+result.jawab+`</span></p>`
        				);
						$('[name="chat"]').val('');
						// window.location='<?=base_url()?>#chat';
					}

				});

			}

			// $('#myTab a').on('click', function (e) 
			// {
			//   e.preventDefault()
			//   $(this).tab('show')
			// })
			$('.chat').animate({
				scrollTop : $('.chat').offset().top
			}, 1500);

		});
	});
</script>