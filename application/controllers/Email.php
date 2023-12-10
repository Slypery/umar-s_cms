<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{

    public function index()
    {
        $this->load->library('email');
        $this->email->from('ibnuumar634@gmail.com', 'umar');
        $this->email->to('uibnu180@gmail.com');
        $this->email->subject('this is a test');
        $this->email->message('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente dolores natus, voluptatibus provident maxime dicta totam ipsam labore, magni deserunt cum perspiciatis corrupti eos cupiditate laboriosam, iste id dolorem iusto.');
        $this->email->send();
    }
}
