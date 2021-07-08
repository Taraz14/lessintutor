<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loged_in extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_m');

        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        }
    }

    public function index()
    {
        $id = $this->session->userdata('id');
        $data = [
            'content' => 'homepage/index',
            'head' => 'Home',
            'profile' => $this->admin_m->profile($id)

        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }
}

/* End of file Loged_in.php */
