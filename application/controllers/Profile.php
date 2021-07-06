<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('admin_m');

        // if ($this->session->userdata('logged_in') == FALSE) {
        //     redirect('login');
        //     // && !$this->session->userdata('role') == 88
        // }
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
            // && !$this->session->userdata('role') == 88
        }
    }

    public function index()
    {
        $id = $this->session->userdata('id');

        $data = [
            'content' => 'profile',
            'header' => 'Profile',
            'profile' => $this->admin_m->profile($id)
        ];

        $this->load->view('admin/layouts/wrapper', $data, FALSE);
    }
}

/* End of file Dashboard.php */
