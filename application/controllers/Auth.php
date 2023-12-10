<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login_page()
    {
        if (!$this->input->post()) {
            $this->load->view('_header.php');
            $this->load->view('_login_page.php');
            $this->load->view('_footer.php');
        } else {
            $userdata = 0;
            if($this->db->select('*')->from('tb_user')->where("username = '" . $this->input->post('username') . "' OR email ='" . $this->input->post('username') . "'")->get()->result_array()){
                $userdata = $this->db->select('*')->from('tb_user')->where("username = '" . $this->input->post('username') . "' OR email ='" . $this->input->post('username') . "'")->get()->result_array()[0];
            }
            if (!$userdata) {
                $this->load->view('_header.php');
                $this->load->view('_login_page.php');
                $this->load->view('_footer.php');
            } else {
                if (password_verify($this->input->post('pass'), $userdata['pass'])) {
                    $userdata['recent_login'] = date('y-m-d');
                    $this->session->set_userdata('login_data', $userdata);
                    $this->db->replace('tb_user', $userdata);
                    var_dump($userdata);
                    if ($this->session->userdata('login_data')['level'] == 'admin') {
                        redirect('admin');
                    } else if ($this->session->userdata('login_data')['level'] == 'contributor') {
                        redirect('user');
                    }
                } else {
                    $this->load->view('_header.php');
                    $this->load->view('_login_page.php');
                    $this->load->view('_footer.php');
                }
            }
        }
    }

    public function sign_up()
    {
        if ($this->input->post('resend')) {
            $this->session->unset_userdata('sign_up_data');
        }
        if (!$this->session->userdata('sign_up_data')) {
            $this->load->view('_header.php');
            $this->load->view('_sign_up_page.php');
            $this->load->view('_footer.php');
        } else {
            redirect('auth/sign_up_step_2');
        }
    }

    public function sign_up_step_2()
    {
        if ($this->input->post('email')) {
            if ($this->db->select('*')->from('tb_user')->where('email', $this->input->post('email'))->get()->result_array()) {
                redirect('auth/sign_up');
            } else {
                $sender = $this->db->select('email')->from('tb_configuration')->get()->result_array()[0]['email'];
                $otp = random_int(100000, 999999);
                $this->load->library('email');
                $this->email->from($sender, 'UHHH')->to($this->input->post('email'))->subject('Email verification code');
                $this->session->set_userdata('sign_up_data', array('cooldown' => time(), 'email' => $this->input->post('email'), 'otp' => $otp));

                $this->email->message("
                <div style='" . 'font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";' . "'>
                    <h1>Hi!</h1>
                    <p>Someone is trying to use your email to signup to UHHH.<br>
                    If that's not you, you can just safely ignore this message.<br>
                    But if it is you, here is your verification code:</p>
                    <h1>" . $otp . "</h1>
                    <p>Cheers,<br>UHHH developer team</p>
                </div>");


                if ($this->email->send()) {
                    var_dump($this->session->userdata('sign_up_data'));
                    redirect('auth/sign_up_step_2');
                } else {
                    echo 'somthin wong';
                }
            }
        } else if ($this->session->userdata('sign_up_data')) {
            $this->load->view('_header.php');
            $this->load->view('_sign_up_verf_page.php', array('sign_up_data' => $this->session->userdata('sign_up_data')));
            $this->load->view('_footer.php');
        }
    }

    public function sign_up_step_3()
    {
        if ($this->input->post('otp') == $this->session->userdata('sign_up_data')['otp']) {
            $this->load->view('_header.php');
            $this->load->view('_sign_up_create_page.php');
            $this->load->view('_footer.php');
        } else {
            $data = $this->session->userdata('sign_up_data');
            $data['wrong_code'] = 1;
            $this->session->set_userdata('sign_up_data', $data);
            redirect('auth/sign_up_step_2');
        }
    }

    public function sign_up_step_4()
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
                'field' => 'confirm_pass',
                'label' => 'Confirm_password',
                'rules' => 'required'
            ),
            array(
                'field' => 'pass',
                'label' => 'password',
                'rules' => 'required|min_length[8]|matches[confirm_pass]',
                'errors' => array(
                    'min_length' => '*password must contain more than 8 char',
                    'matches' => "*password and confirmation password doesn't match"
                )
            )
        );
        $this->form_validation->set_rules($rules);

        if ((!$this->form_validation->run())) {
            // $this->load->view('_header.php');
            // $this->load->view('_sign_up_create_page.php');
            // $this->load->view('_footer.php');
            var_dump($this->form_validation->error_array());
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'name' => $this->input->post('name'),
                'pass' => password_hash($this->input->post('pass'), PASSWORD_BCRYPT),
                'email' => $this->session->userdata('sign_up_data')['email'],
                'level' => 'contributor'
            );
            var_dump($data);
            $this->db->insert('tb_user', $data);
            redirect('auth/sign_up_success');
        }
    }

    public function sign_up_success()
    {
        $this->load->view('_header.php');
        $this->load->view('_sign_up_success_page.php');
        $this->load->view('_footer.php');
    }

    public function forgot_password()
    {
        if ($this->input->post('resend')) {
            $this->session->unset_userdata('forgot_password_data');
        }
        if (!$this->session->userdata('forgot_password_data')) {
            $this->load->view('_header.php');
            $this->load->view('_forgot_password_page.php');
            $this->load->view('_footer.php');
        } else {
            redirect('auth/forgot_password_step_2');
        }
    }

    public function forgot_password_step_2()
    {
        $sender = $this->db->select('email')->from('tb_configuration')->get()->result_array()[0]['email'];
        if ($this->input->post('username')) {
            $email = $this->db->select('email')->from('tb_user')->where("username = '" . $this->input->post('username') . "' OR email ='" . $this->input->post('username') . "'")->get()->result_array()[0]['email'];
            $otp = random_int(100000, 999999);
            $this->load->library('email');
            $this->email->from($sender, 'UHHH')->to($email)->subject('Password reset');
            $this->session->set_userdata('forgot_password_data', array('cooldown' => time(), 'email' => $email, 'otp' => $otp));
            $this->email->message("
            <div style='" . 'font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";' . "'>
                <h1>Hi!</h1>
                <p>Someone is trying to reset your UHHH account password.<br>
                If that's not you, you can just safely ignore this message.<br>
                But if it is you, here is your verification code:</p>
                <h1>" . $otp . "</h1>
                <p>Cheers,<br>UHHH developer team</p>
            </div>");


            if ($this->email->send()) {
                var_dump($this->session->userdata('forgot_password_data'));
                redirect('auth/forgot_password_step_2');
            } else {
                echo 'somthin wong';
            }
        } else if ($this->session->userdata('forgot_password_data')) {
            $this->load->view('_header.php');
            $this->load->view('_forgot_password_verf_page.php', array('forgot_password_data' => $this->session->userdata('forgot_password_data')));
            $this->load->view('_footer.php');
        }
    }

    public function forgot_password_step_3()
    {
        if ($this->input->post('otp') == $this->session->userdata('forgot_password_data')['otp']) {
            $this->load->view('_header.php');
            $this->load->view('_forgot_password_reset_page.php');
            $this->load->view('_footer.php');
        } else {
            $data = $this->session->userdata('forgot_password_data');
            $data['wrong_code'] = 1;
            $this->session->set_userdata('forgot_password_data', $data);
            redirect('auth/forgot_password_step_2');
        }
    }

    public function forgot_password_step_4()
    {
        $this->load->library('form_validation');
        $rules = array(
            array(
                'field' => 'confirm_pass',
                'label' => 'confirmation_pass',
                'rules' => 'required'
            ),
            array(
                'field' => 'pass',
                'label' => 'password',
                'rules' => 'required|min_length[8]|matches[confirm_pass]',
                'errors' => array(
                    'min_length' => '*password must contain more than 8 char',
                    'matches' => "*password and confirmation password doesn't match"
                )
            )
        );
        $this->form_validation->set_rules($rules);

        if ((!$this->form_validation->run())) {
            $this->load->view('_header.php');
            $this->load->view('_forgot_password_reset_page.php');
            $this->load->view('_footer.php');
        } else {
            $data = $this->db->select('*')->from('tb_user')->where('email', $this->session->userdata('forgot_password_data')['email'])->get()->result_array()[0];
            $data['pass'] = password_hash($this->input->post('pass'), PASSWORD_BCRYPT);
            var_dump($data);
            $this->db->replace('tb_user', $data);
            redirect('auth/reset_password_success');
        }
    }

    public function reset_password_success()
    {
        $this->session->unset_userdata('forgot_password_data');
        $this->load->view('_header.php');
        $this->load->view('_reset_password_success_page.php');
        $this->load->view('_footer.php');
    }

    public function logout()
    {
        $this->load->library('session');

        $exclude_variables = array('viewed_content_id');
        $all_variables = $this->session->all_userdata();

        foreach ($all_variables as $key => $value) {
            if (!in_array($key, $exclude_variables)) {
                $this->session->unset_userdata($key);
            }
        }

        redirect();
    }

    public function absolute_logout()
    {
        $this->session->sess_destroy();
        redirect();
    }
}
