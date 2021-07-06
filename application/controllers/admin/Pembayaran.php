<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('admin_m');

        if ($this->session->userdata('logged_in') == FALSE && !$this->session->userdata('role') == 99) {
            redirect('login');
        }
    }

    public function index()
    {
        $id = $this->session->userdata('id');

        $data = [
            'content' => 'admin/pages/pembayaran',
            'header' => 'Pembayaran',
            'profile' => $this->admin_m->profile($id)

        ];

        $this->load->view('admin/layouts/wrapper', $data, FALSE);
    }

    public function refund()
    {
        $id = $this->session->userdata('id');

        $data = [
            'content' => 'admin/pages/refund',
            'header' => 'Refund',
            'profile' => $this->admin_m->profile($id)

        ];

        $this->load->view('admin/layouts/wrapper', $data, FALSE);
    }
}

/* End of file Pembayaran.php */
