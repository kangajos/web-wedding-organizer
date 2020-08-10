<div class="table-responsive">
	<table class="table table-bordered" style="font-family: arial">
		<thead>
			<tr class="my-bg">
				<th>No</th>
				<th>Nama</th>
				<th>No Hp</th>
				<th>email</th>
				<th>Desa</th>
				<th>Kecamatan</th>
				<th>Kabupaten</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($member as $key => $value): ?>			
			<tr>
				<td><?=$key+1?></td>
				<td><?=$value->nama?></td>
				<td><?=$value->no_hp?></td>
				<td><?=$value->email?></td>
				<td><?=$value->desa?></td>
				<td><?=$value->kecamatan?></td>
				<td><?=$value->kabupaten?></td>
				<td><?=($value->status ==1) ? 'Active' : 'Non-Active'?></td>
				<td>
					<?php if ($value->status ==1): ?>
						
					<a onclick="return confirm('Yakin ingin blokir')" href="<?=base_url("admin/member/blokir/$value->member_id")?>" class="btn btn-sm btn-danger">Blokir</a>
					<?php endif ?>
					<?php if ($value->status ==0): ?>
						
					<a onclick="return confirm('Yakin ingin buka blokir')" href="<?=base_url("admin/member/buka_blokir/$value->member_id")?>" class="btn btn-sm btn-danger">Buka Blokir</a>
					<?php endif ?>
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