<div class="form-group">
	<button class="btn btn-info" data-toggle="modal" data-target="#tambah-chat-bot">Tambah Chat Bot Baru</button>
</div>
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Pertanyaan</th>
				<th>Jawaban</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($chat_bot as $key => $value): ?>			
			<tr>
				<td><?=$key+1?></td>
				<td><?=$value->tanya?></td>
				<td><?=$value->jawab?></td>
				<td>
					<a href="<?=base_url('admin/Chat_bot/edit/'.$value->chat_bot_id)?>" class="btn btn-primary">Edit</a>
					<a onclick="return confirm('Yakin ?')" href="<?=base_url('admin/Chat_bot/delete/'.$value->chat_bot_id)?>" class="btn btn-danger">Hapus</a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

<div class="modal fade" id="tambah-chat-bot" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Chat Bot Baru</h4>
				<button class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?=base_url('admin/Chat_bot/add')?>" method="post">
				<div class="modal-body" style="background: white !important">					
					<div class="form-group">
						<label for="">Pertanyaan</label>
						<input type="text" class="form-control" name="pertanyaan" required autofocus placeholder="Massukan pertanyaan">
					</div>
						<div class="form-group">
						<label for="">Jawaban</label>
						<input type="text" class="form-control" name="jawaban" required placeholder="Massukan jawabannya">
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-info" type="submit">Save</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>