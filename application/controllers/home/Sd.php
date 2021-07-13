<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(array('home_m', 'admin_m'));
    }

    public function index()
    {
        $id = $this->session->userdata('id');

        $data = [
            'content' => 'homepage/sd/sd',
            'head'  => 'SD',
            'getKelasSd' => $this->home_m->getKelasSd(),
            'profile' => $this->admin_m->profile($id)

        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }

    public function mapel($id_mapel)
    {
        $id = $this->session->userdata('id');

        $data = [
            'content' => 'homepage/sd/mapel',
            'head'  => 'Mata Pelajaran SD',
            'pengajar' => $this->home_m->getPengajar($id_mapel),
            'profile' => $this->admin_m->profile($id)

        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }

    public function getKontrak()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $input = $this->input->post();
            $this->db->insert('pembayaran', $input);
            redirect('2/pengajar');
        } else {
            redirect('login');
        }
    }
}

/* End of file Sd.php */
