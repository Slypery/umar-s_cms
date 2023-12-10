<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerUser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('login_data'))) {
            redirect('admin/auth');
        } else if ($this->session->userdata('login_data')['level'] != 'contributor') {
            redirect();
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
        $this->load->view('user/_header.php');
        $this->load->view('user/dashboard.php');
        $this->load->view('user/_footer.php');
    }

    public function content()
    {
        $this->load->view('user/_header.php');
        $this->load->view('user/content_page.php', array('content_data' => $this->db->select('*')->from('tb_content')->join('tb_category', 'tb_category.category_id = tb_content.category_id')->where('creator', $this->session->userdata('login_data')['username'])->get()->result_array()));
        $this->load->view('user/_footer.php');
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
        $this->load->view('user/_header');
        $this->load->view('user/content_page_add_content', array('category' => $this->db->get('tb_category')->result_array()));
        $this->load->view('user/_footer.php');
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
            $this->load->view('user/_header');
            $this->load->view('user/content_page_add_content', array('category' => $this->db->get('tb_category')->result_array()));
            $this->load->view('user/_footer.php');
            // var_dump($this->form_validation->error_array());
        } else {
            $data = array(
                'title' => $this->input->post('title'),
                'category_id' => $this->input->post('category'),
                'content' => $this->input->post('content'),
                'date' => date('y-m-d'),
                'creator' => $this->session->userdata('login_data')['username'],
                'picture' => $this->upload->data('file_name')
            );
            $this->db->insert('tb_content', $data);
            redirect('user/content');
        }
    }

    public function content_page_edit_content()
    {
        $data = array(
            'content_data' => $this->db->select('*')->from('tb_content')->where('content_id', $this->input->post('content_id'))->get()->result_array()[0],
            'category' => $this->db->get('tb_category')->result_array()
        );
        if ($data['content_data']['creator'] == $this->session->userdata('login_data')['username']) {
            $this->session->set_userdata('content_id_edit', $this->input->post('content_id'));
            $this->load->view('user/_header');
            $this->load->view('user/content_page_edit_content', $data);
            $this->load->view('user/_footer.php');
        } else {
            echo 'not your content';
        }
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
        if ($data_content['creator'] != $this->session->userdata('login_data')['username']) {
            echo 'not your content';
        } else {
            if ($this->form_validation->run() == false) {
                $data = array(
                    'content_data' => $data_content,
                    'category' => $this->db->get('tb_category')->result_array()
                );
                $this->load->view('user/_header');
                $this->load->view('user/content_page_edit_content', $data);
                $this->load->view('user/_footer.php');
            } else {
                $data_content['title'] = $this->input->post('title');
                $data_content['content'] = $this->input->post('content');
                $data_content['category_id'] = $this->input->post('category');
                if ($this->upload->do_upload('content_picture')) {
                    $image_path = './assets/img/content/' . $data_content['picture'];
                    unlink($image_path);

                    $data_content['picture'] = $this->upload->data('file_name');

                    $this->db->replace('tb_content', $data_content);

                    redirect('user/content');
                } else {
                    $this->db->replace('tb_content', $data_content);
                    redirect('user/content');
                }
            }
        }
    }

    public function content_page_delete_content()
	{
        if($this->db->select('creator')->from('tb_content')->where('content_id', $this->input->post('content_id'))->get()->result_array()[0]['creator'] == $this->session->userdata('login_data')['username']){
            $this->db->delete('tb_content', ['content_id' => $this->input->post('content_id')]);
            $image_path = './assets/img/content/' . $this->input->post('picture');
            unlink($image_path);
            redirect('user/content');
        } else {
            echo 'not your content';
        }
	}
    public function feedback_page(){
		$this->load->view('user/_header.php');
		$this->load->view('user/feedback_page.php', array(
			'feedback_data' => $this->db->select('*')->from('tb_feedback')->get()->result_array()
		));
		$this->load->view('user/_footer.php');
	}
}
