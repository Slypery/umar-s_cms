<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAdmin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('login_data'))) {
			redirect('auth/login_page');
		} else if($this->session->userdata('login_data')['level'] != 'admin'){
			redirect('user');
		}
	}

	public function text_validation($str)
	{
		if (preg_match('/^[A-Z a-z 0-9 + \/ = . , ? ! ( ) \- < > & # : ; \\ " \']+$/', $str)) {
			return true;
		} else {
			return false;
		}
	}

	public function index()
	{
		$this->load->view('admin/_header.php');
		$this->load->view('admin/dashboard.php');
		$this->load->view('admin/_footer.php');
	}

	// CAROUSEL_PAGE
	public function carousel_page()
	{
		$this->load->view('admin/_header.php');
		$this->load->view('admin/carousel_page.php', array('carousel_data' => $this->db->get('tb_carousel')->result_array()));
		$this->load->view('admin/_footer.php');
	}

	public function carousel_page_add_carousel()
	{
		$this->load->view('admin/_header.php');
		$this->load->view('admin/carousel_page_add_carousel.php');
		$this->load->view('admin/_footer.php');
	}

	public function carousel_page_do_add_carousel()
	{
		// upload config
		$config = array(
			'upload_path' => './assets/img/carousel',
			'allowed_types' => 'jpg|png',
			'encrypt_name' => true
		);
		$this->load->library('upload', $config);

		// form rules
		$rules = array(
			array(
				'field' => 'title',
				'label' => 'Title',
				'rules' => 'required|min_length[10]|callback_text_validation',
				'errors' => array(
					'min_length' => '*title cannot be shorter than 10 char',
					'text_validation' => '*title can only contain [A-Z] [a-z] [0-9] [+ \ / = . , : ; ? ( )]'
				)
			),
			array(
				'field' => 'subtitle',
				'label' => 'Subtitle',
				'rules' => 'required|callback_text_validation',
				'errors' => array(
					'text_validation' => '*subtitle can only contain [A-Z] [a-z] [0-9] [+ \ / = . , : ; ? ( )]'
				)
			)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($rules);

		if (!$this->upload->do_upload('carousel_picture') || !$this->form_validation->run()) {
			$image_path = './assets/img/carousel/' . $this->upload->data('file_name');
			if (file_exists($image_path)) {
				unlink($image_path);
			}
			$this->load->view('admin/_header.php');
			$this->load->view('admin/carousel_page_add_carousel.php');
			$this->load->view('admin/_footer.php');
		} else {
			$data = array(
				'title' => $this->input->post('title'),
				'subtitle' => $this->input->post('subtitle'),
				'picture' => $this->upload->data()['file_name']
			);
			$this->db->insert('tb_carousel', $data);
			redirect('admin/carousel');
		}
	}

	public function carousel_page_edit_carousel()
	{
		$data = array(
			'carousel_data' => $this->db->select('*')->from('tb_carousel')->where('carousel_id', $this->input->post('carousel_id'))->get()->result_array()[0]
		);
		$this->session->set_userdata('carousel_id_edit', $this->input->post('carousel_id'));
		$this->load->view('admin/_header.php');
		$this->load->view('admin/carousel_page_edit_carousel.php', $data);
		$this->load->view('admin/_footer.php');
	}

	public function carousel_page_do_edit_carousel()
	{
		$data = $this->db->select('*')->from('tb_carousel')->where('carousel_id', $this->session->userdata('carousel_id_edit'))->get()->result_array();

		// upload config
		$config = array(
			'upload_path' => './assets/img/carousel',
			'allowed_types' => 'jpg|png',
			'encrypt_name' => true
		);
		$this->load->library('upload', $config);

		// form rules
		$rules = array(
			array(
				'field' => 'title',
				'label' => 'Title',
				'rules' => 'required|min_length[10]|callback_text_validation',
				'errors' => array(
					'min_length' => '*title cannot be shorter than 10 char',
					'text_validation' => '*title can only contain [A-Z] [a-z] [0-9] [+ \ / = . , : ; ? ( )]'
				)
			),
			array(
				'field' => 'subtitle',
				'label' => 'Subtitle',
				'rules' => 'required|callback_text_validation',
				'errors' => array(
					'text_validation' => '*subtitle can only contain [A-Z] [a-z] [0-9] [+ \ / = . , : ; ? ( )]'
				)
			)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($rules);

		$data_carousel = $this->db->select('*')->from('tb_carousel')->where('carousel_id', $this->session->userdata('carousel_id_edit'))->get()->result_array()[0];
		if ($this->form_validation->run() == false) {
			$data = array(
				'carousel_data' => $data_carousel
			);
			$this->load->view('admin/_header.php');
			$this->load->view('admin/carousel_page_edit_carousel.php', $data);
			$this->load->view('admin/_footer.php');
		} else {
			$data_carousel['title'] = $this->input->post('title');
			$data_carousel['subtitle'] = $this->input->post('subtitle');
			if ($this->upload->do_upload('carousel_picture')) {
				$image_path = './assets/img/carousel/' . $data_carousel['picture'];
				unlink($image_path);

				$data_carousel['picture'] = $this->upload->data()['file_name'];

				$this->db->replace('tb_carousel', $data_carousel);

				redirect('admin/carousel');
			} else {
				$this->db->replace('tb_carousel', $data_carousel);
				redirect('admin/carousel');
			}
		}
	}

	public function carousel_page_delete_carousel()
	{
		$this->db->delete('tb_carousel', ['carousel_id' => $this->input->post('carousel_id')]);
		$image_path = './assets/img/carousel/' . $this->input->post('picture');
		unlink($image_path);
		redirect('admin/carousel');
	}
	// // CAROUSEL_PAGE



	// CONTENT_CATEGORY_PAGE
	public function content_category_page()
	{
		$this->load->view('admin/_header.php');
		$this->load->view('admin/content_category_page.php', array('category_data' => $this->db->get('tb_category')->result_array()));
		$this->load->view('admin/_footer.php');
	}

	public function content_category_page_delete_category()
	{
		$this->db->delete('tb_category', ['category_id' => $this->input->post('category_id')]);
		$this->db->delete('tb_content', ['category_id' => $this->input->post('category_id')]);
		$this->session->set_flashdata('alert', '
			<script>
				Swal.fire({
					title: "Success!",
					text: "Category ' . "'" . $this->input->post('category') . "'" . ' has been deleted!",
					icon: "success"
				});
			</script>
		');
		redirect('admin/content_category');
	}

	public function content_category_page_add_category()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('category', 'Category', 'required|is_unique[tb_category.category]');
		if ($this->form_validation->run()) {
			$this->db->insert('tb_category', ['category' => $this->input->post('category')]);
			$this->session->set_flashdata('alert', '
			<script>
				Swal.fire({
					title: "Success!",
					text: "Category ' . "'" . $this->input->post('category') . "'" . ' is saved!",
					icon: "success"
				});
			</script>
			');
		} else {
			$this->session->set_flashdata('alert', '
			<script>
				Swal.fire({
					title: "Failed!",
					text: "Category ' . "'" . $this->input->post('category') . "'" . ' aleready exist!",
					icon: "error"
				});
			</script>
			');
		}
		redirect('admin/content_category');
	}
	// // CONTENT_CATEGORY_PAGE


	// CONTENT_PAGE
	public function content_page()
	{
		$this->load->view('admin/_header.php');
		$this->load->view('admin/content_page.php', array('content_data' => $this->db->select('*')->from('tb_content')->join('tb_category', 'tb_category.category_id = tb_content.category_id')->get()->result_array()));
		$this->load->view('admin/_footer.php');
	}

	public function content_page_detail()
	{
		$content_id = $this->input->get('content_id');
		$content_data = $this->db->select('*')->from('tb_content')->where('content_id', $content_id)->get()->result_array()[0];
		$this->load->view('_header.php');
		$this->load->view('content/content_detail.php', array('content_data' => $content_data));
		$this->load->view('_footer.php');
	}

	public function content_page_add_content()
	{
		$this->load->view('admin/_header');
		$this->load->view('admin/content_page_add_content', array('category' => $this->db->get('tb_category')->result_array()));
		$this->load->view('admin/_footer.php');
	}

	public function content_page_do_add_content()
	{
		// upload config
		$config = array(
			'upload_path' => './assets/img/content',
			'allowed_types' => 'jpg|png',
			'encrypt_name' => true
		);
		$this->load->library('upload', $config);


		// form rules
		$rules = array(
			array(
				'field' => 'title',
				'label' => 'Title',
				'rules' => 'required|min_length[10]|callback_text_validation',
				'errors' => array(
					'min_length' => '*title cannot be shorter than 10 char',
					'text_validation' => '*title can only contain [A-Z] [a-z] [0-9] [+ \ / = . , : ; ? ( )]'
				)
			),
			array(
				'field' => 'category',
				'label' => 'Category',
				'rules' => 'required'
			),
			array(
				'field' => 'content',
				'label' => 'Content',
				'rules' => 'required|callback_text_validation',
				'errors' => array(
					'text_validation' => '*content can only contain [A-Z] [a-z] [0-9] [+ \ / = . , : ; ? ( )]'
				)
			)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($rules);

		if (!$this->upload->do_upload('content_picture') || !$this->form_validation->run()) {
			$image_path = './assets/img/content/' . $this->upload->data('file_name');
			if (file_exists($image_path)) {
				unlink($image_path);
			}
			$this->load->view('admin/_header');
			$this->load->view('admin/content_page_add_content', array('category' => $this->db->get('tb_category')->result_array()));
			$this->load->view('admin/_footer.php');
		} else {
			$data = array(
				'title' => $this->input->post('title'),
				'category_id' => $this->input->post('category'),
				'content' => $this->input->post('content'),
				'date' => date('y-m-d'),
				'creator' => $this->session->userdata('login_data')['name'],
				'picture' => $this->upload->data('file_name')
			);
			$this->db->insert('tb_content', $data);
			redirect('admin/content');
		}
	}

	public function content_page_delete_content()
	{
		$this->db->delete('tb_content', ['content_id' => $this->input->post('content_id')]);
		$image_path = './assets/img/content/' . $this->input->post('picture');
		unlink($image_path);
		redirect('admin/content');
	}

	public function content_page_edit_content()
	{
		$data = array(
			'content_data' => $this->db->select('*')->from('tb_content')->where('content_id', $this->input->post('content_id'))->get()->result_array()[0],
			'category' => $this->db->get('tb_category')->result_array()
		);
		$this->session->set_userdata('content_id_edit', $this->input->post('content_id'));
		$this->load->view('admin/_header');
		$this->load->view('admin/content_page_edit_content', $data);
		$this->load->view('admin/_footer.php');
	}

	public function content_page_do_edit_content()
	{
		// upload config
		$config = array(
			'upload_path' => './assets/img/content',
			'allowed_types' => 'jpg|png',
			'encrypt_name' => true
		);
		$this->load->library('upload', $config);


		// form rules
		$rules = array(
			array(
				'field' => 'title',
				'label' => 'Title',
				'rules' => 'required|min_length[10]|callback_text_validation',
				'errors' => array(
					'min_length' => '*title cannot be shorter than 10 char',
					'text_validation' => '*title can only contain [A-Z] [a-z] [0-9] [+ \ / = . , : ; ? ( )]'
				)
			),
			array(
				'field' => 'category',
				'label' => 'Category',
				'rules' => 'required'
			),
			array(
				'field' => 'content',
				'label' => 'Content',
				'rules' => 'required|callback_text_validation',
				'errors' => array(
					'text_validation' => '*content can only contain [A-Z] [a-z] [0-9] [+ \ / = . , : ; ? ( )]'
				)
			)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($rules);


		$data_content = $this->db->select('*')->from('tb_content')->where('content_id', $this->session->userdata('content_id_edit'))->get()->result_array()[0];
		if ($this->form_validation->run() == false) {
			$data = array(
				'content_data' => $data_content,
				'category' => $this->db->get('tb_category')->result_array()
			);
			$this->load->view('admin/_header');
			$this->load->view('admin/content_page_edit_content', $data);
			$this->load->view('admin/_footer.php');
		} else {
			$data_content['title'] = $this->input->post('title');
			$data_content['content'] = $this->input->post('content');
			$data_content['category_id'] = $this->input->post('category');

			if ($this->upload->do_upload('content_picture')) {
				$image_path = './assets/img/content/' . $data_content['picture'];
				unlink($image_path);

				$data_content['picture'] = $this->upload->data('file_name');

				$this->db->replace('tb_content', $data_content);

				redirect('admin/content');
			} else {
				$this->db->replace('tb_content', $data_content);
				redirect('admin/content');
			}
		}
	}
	// // CONTENT_PAGE


	// USER_PAGE
	public function user_page()
	{
		$this->load->view('admin/_header.php');
		$this->load->view('admin/user_page.php', array(
			'user_table' => $this->db->get('tb_user')->result_array()
		));
		$this->load->view('admin/_footer.php');
	}

	public function user_page_add_user()
	{
		$this->load->view('admin/_header.php');
		$this->load->view('admin/user_page_add_user.php');
		$this->load->view('admin/_footer.php');
	}

	public function user_page_do_add_user()
	{
		$this->load->library('form_validation');
		$rules = array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required|min_length[5]',
				'errors' => array(
					'min_length' => '*name cannot be shorter than 5 char'
				)
			),
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|is_unique[tb_user.username]|min_length[5]',
				'errors' => array(
					'is_unique' => 'username already exists',
					'min_length' => '*username cannot be shorter than 5 char'
				)
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			),
			array(
				'field' => 'pass',
				'label' => 'password',
				'rules' => 'required|min_length[8]',
				'errors' => array(
					'min_length' => '*password must contain more than 8 char'
				)
			),
			array(
				'field' => 'user_lvl',
				'label' => 'user_lvl',
				'rules' => 'required'
			)
		);
		$this->form_validation->set_rules($rules);

		if (!$this->form_validation->run()) {
			$this->load->view('admin/_header.php');
			$this->load->view('admin/user_page_add_user.php');
			$this->load->view('admin/_footer.php');
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'pass' => password_hash($this->input->post('pass'), PASSWORD_BCRYPT),
				'level' => $this->input->post('user_lvl')
			);
			$this->db->insert('tb_user', $data);
			redirect('admin/user');
		}
	}

	public function user_page_edit_user()
	{
		$this->session->set_userdata('user_id_edit', $this->input->post('user_id'));
		$this->load->view('admin/_header.php');
		$this->load->view('admin/user_page_edit_user.php', array(
			'user_data' => $this->db->select('name, email')->from('tb_user')->where('user_id', $this->input->post('user_id'))->get()->result_array()[0]
		));
		$this->load->view('admin/_footer.php');
	}

	public function user_page_do_edit_user()
	{
		$this->load->library('form_validation');
		$rules = array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required|min_length[5]',
				'errors' => array(
					'min_length' => '*name cannot be shorter than 5 char'
				)
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|is_unique[tb_user.email]',
				'errors' => array(
					'min_length' => '*name cannot be shorter than 5 char'
				)
			),
		);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/_header.php');
			$this->load->view('admin/user_page_edit_user.php', array(
				'user_data' => $this->db->select('name, email')->from('tb_user')->where('user_id', $this->session->userdata('user_id_edit'))->get()->result_array()[0]
			));
			$this->load->view('admin/_footer.php');
		} else {
			$userdata = $this->db->select('*')->from('tb_user')->where('user_id', $this->session->userdata('user_id_edit'))->get()->result_array()[0];
			// $data = array(
			// 	'user_id' => $this->session->userdata('user_id_edit'),
			// 	'username' => $userdata['username'],
			// 	'pass' => $userdata['pass'],
			// 	'name'  => $this->input->post('name'),
			// 	'level'  => $userdata['level']
			// );
			$userdata['name'] = $this->input->post('name');
			$userdata['email'] = $this->input->post('email');

			$this->db->replace('tb_user', $userdata);
			redirect('admin/user');
		}
	}

	public function user_page_delete_user()
	{
		$this->db->delete('tb_user', ['user_id' => $this->input->post('user_id')]);
		redirect('admin/user');
	}
	// // USER_PAGE


	// CONFIG_PAGE
	public function config_page()
	{
		$this->load->view('admin/_header.php');
		$this->load->view('admin/config_page.php', array(
			'config_data' => $this->db->select('*')->from('tb_configuration')->where('config_id', 1)->get()->result_array()[0]
		));
		$this->load->view('admin/_footer.php');
	}

	public function config_page_do_edit_config()
	{
		$data = $this->input->post();
		$data['config_id'] = 1;
		$this->db->replace('tb_configuration', $data);
		redirect('admin/configuration');
	}
	// // CONFIG_PAGE

	// FEEDBACK PAGE

	public function feedback_page(){
		$this->load->view('admin/_header.php');
		$this->load->view('admin/feedback_page.php', array(
			'feedback_data' => $this->db->select('*')->from('tb_feedback')->get()->result_array()
		));
		$this->load->view('admin/_footer.php');
	}

	public function feedback_page_delete_feedback(){
		$this->db->delete('tb_feedback', ['feedback_id' => $this->input->post('feedback_id')]);
		redirect('admin/feedback');
	}

	public function feedback_page_delete_batch(){
		foreach($this->input->post('delete_batch') as $key => $value){
			$this->db->delete('tb_feedback', ['feedback_id' => $value]);
		}
		redirect('admin/feedback');
	}

	// // FEEDBACK PAGE
}
