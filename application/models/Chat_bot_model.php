<?php 
/**
 * Model chat bot
 */
class Chat_bot_model extends CI_Model
{
	
	public function get_all_chat_bot()
	{
		return $this->db->get('chat_bot')->result();
	}

	public function add()
	{
		$pertanyaan = $this->input->post('pertanyaan');
		$jawabanan = $this->input->post('jawaban');

		$cek = $this->db->get_where('chat_bot', ['tanya' => $pertanyaan])->num_rows();

		if ($cek == 0) :
			$params = ['tanya' => $pertanyaan, 'jawab' => $jawabanan];
			$this->db->insert('chat_bot', $params);
			return $this->db->affected_rows();

		else:
			return false;
		endif;
		
	}

	public function edit($chat_bot_id)
	{
		return $this->db->get_where('chat_bot', ['chat_bot_id' => $chat_bot_id])->row();
	}

	public function save_edit()
	{
		$pertanyaan = $this->input->post('pertanyaan');
		$jawabanan = $this->input->post('jawaban');
		$chat_bot_id = $this->input->post('chat_bot_id');

		$params = ['tanya' => $pertanyaan, 'jawab' => $jawabanan];

		$this->db->update('chat_bot', $params, ['chat_bot_id' => $chat_bot_id]);
		return $this->db->affected_rows();
	}

	public function delete($chat_bot_id)
	{
		$this->db->delete('chat_bot', ['chat_bot_id' => $chat_bot_id]);
		return $this->db->affected_rows();
	}	

	public function chat($chat)
	{
		$this->similarity_text($chat);

		$result = $this->db->select('chat_bot.jawab')->from('chat_bot')->join('temporary', 'temporary.chat_bot_id=chat_bot.chat_bot_id')->order_by('temporary.score', 'desc')->get()->row();
		if (!empty($result)) {
			return ['jawab' => $result->jawab];;
		}else{
			return ['jawab' => 'Mohon maaf, kami tidak dapat membalas pesan anda. Silahkan gunakan kata-kata yang lebih umum'];
		}
	}

	public function similarity_text($chat)
	{
		$this->db->from('temporary');
		$this->db->truncate();

		$chat = strtolower(trim($chat));
		$result = $this->db->select('chat_bot_id, tanya')->get('chat_bot')->result();
		foreach ($result as $key => $value) {
			$jawab = strtolower(trim($value->tanya));
			similar_text($chat, $jawab, $score);
			if ($score > 50.0) 
			{
				$this->db->insert('temporary', ['chat_bot_id' => $value->chat_bot_id, 'score' => $score]);	
			}
		}
	}
}