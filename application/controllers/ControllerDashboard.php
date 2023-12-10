<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerDashboard extends CI_Controller
{
	public function index()
	{
		$category_data = $this->db->get('tb_category')->result_array();
		$new_category_data = [];
		foreach ($category_data as $i) {
			$new_category_data[$i['category_id']] = $i['category'];
		}
		$this->load->view('_header.php');
		$this->load->view('content/dashboard.php', array(
			'carousel_data' => $this->db->get('tb_carousel')->result_array(),
			'contents_data' => $this->db->select('content_id, title, category_id, date, creator, picture, view_count')->from('tb_content')->order_by('date', 'DESC')->get()->result_array(),
			'config_data' => $this->db->get('tb_configuration')->result_array()[0],
			'category_data' => $new_category_data
		));
		$this->load->view('_footer.php');
	}

	public function content_detail()
	{
		$content_id = $this->input->get('content_id');
		$content_data = $this->db->select('*')->from('tb_content')->where('content_id', $content_id)->get()->result_array()[0];

		// add view count
		$viewed_content = $this->session->userdata('viewed_content_id');
		($viewed_content == null) ? $viewed_content = [] : null;
		if (!in_array($content_id, $viewed_content)) {
			// add the viewed content to the session
			array_push($viewed_content, $content_id);
			$this->session->set_userdata('viewed_content_id', $viewed_content);

			// the actual view count
			$content_data['view_count'] += 1;

			$this->db->replace('tb_content', $content_data);
		}

		$this->load->view('_header.php');
		$this->load->view('content/content_detail.php', array('content_data' => $content_data));
		$this->load->view('_footer.php');
	}

	public function feedback()
	{
		$cooldown = 0;
		if ($this->session->userdata('feedback_cooldown')) {
			$cooldown = $this->session->userdata('feedback_cooldown') + 600;
		}
		if ($cooldown > time()) {
			$this->load->view('_header.php');
			$this->load->view('_feedback.php', array('btn' => 0));
			$this->load->view('_footer.php');
		} else {
			$this->load->view('_header.php');
			$this->load->view('_feedback.php', array('btn' => 1));
			$this->load->view('_footer.php');
		}
	}

	public function feedback_submit()
	{
		$this->session->set_userdata('feedback_cooldown', time());
		$this->db->insert('tb_feedback', ['feedback' => $this->input->post('feedback')]);
		redirect('feedback/success');
	}

	public function feedback_success()
	{
		$this->load->view('_header.php');
		$this->load->view('_feedback_success.php');
		$this->load->view('_footer.php');
	}
}
