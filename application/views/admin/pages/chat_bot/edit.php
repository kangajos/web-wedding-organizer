<h3 class="text-success"><?=(isset($title) ) ? $title : ''?></h3>
<form action="<?=base_url('admin/Chat_bot/save_edit')?>" method="post">				
		<div class="form-group">
			<label for="">Pertanyaan</label>
			<input type="text" class="form-control" name="pertanyaan" value="<?=$result->tanya?>" required autofocus placeholder="Massukan pertanyaan">
		</div>
			<div class="form-group">
			<label for="">Jawaban</label>
			<input type="text" class="form-control" name="jawaban" value="<?=$result->jawab?>"  required placeholder="Massukan jawabannya">
		</div>
		<div class="form-groupm">
			<input type="hidden" class="form-control" name="chat_bot_id" value="<?=$result->chat_bot_id?>" required>
			<button class="btn btn-info" type="submit">Save</button>
			<button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
		</div>
</form>