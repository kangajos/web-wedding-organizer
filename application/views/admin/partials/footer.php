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
								<p style="margin-left: 6em; font-size:13px!important;color: black;text-align:right; "><span style="background-color:white;border-radius: 10px;padding: 5px;">`+tanya+`</span></p>
								<p style="margin-bottom: 0px !important;width:font-size:12px; color: white"><span class="fa fa-user"></span> Admin</p>
        				<p style="margin-right: 6em; font-size:13px!important;color: white;text-align:left;"><span style="background-color:navy;border-radius: 10px;padding: 5px;">`+result.jawab+`</span></p>`
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