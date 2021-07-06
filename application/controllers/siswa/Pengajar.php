<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('admin_m');

        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
            // && !$this->session->userdata('role') == 88
        }
    }

    public function index()
    {
        $id = $this->session->userdata('id');

        $data = [
            'content' => 'siswa/pages/pengajar',
            'header' => 'Pengajar',
            'profile' => $this->admin_m->profile($id)
        ];

        $this->load->view('admin/layouts/wrapper', $data, FALSE);
    }

    public function getPengajar()
    {
        $data = $this->admin_m->dataPengajar();
        $pengajar = [];
        foreach ($data as $benVal) {
            // $explode = explode('-', $benVal->tanggal_lahir);
            // $tgl = $explode[2] . '-' . $explode[1] . '-' . $explode[0];
            $temp = [];
            $temp[] = '

        <a href="' . site_url('2/bayar/pengajar/') . $benVal->id . '" class="btn btn-success btn-sm" data-toggle="tooltip" title="Cash" target="">
            <i class="fas fa-cash-register"></i> Lakukan Pembayaran
        </a>';

            $temp[] = htmlspecialchars($benVal->nama, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($benVal->username, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($benVal->rolename, ENT_QUOTES, 'UTF-8');
            // $temp[] = htmlspecialchars($benVal->created_at, ENT_QUOTES, 'UTF-8');
            // $temp[] = htmlspecialchars($benVal->updated_at, ENT_QUOTES, 'UTF-8');

            $pengajar[] = $temp;
        }

        $output['draw'] = intval($this->input->get('draw'));
        $output['recordsTotal'] = $this->admin_m->countAll();
        $output['recordsFiltered'] = $this->admin_m->filtered();
        $output['data'] = $pengajar;

        echo json_encode($output);
    }

    public function bayar()
    {
        $id = $this->session->userdata('id');

        $data = [
            'content' => 'siswa/pages/bayar',
            'header' => 'Pembayaran',
            'profile' => $this->admin_m->profile($id)

        ];

        $this->load->view('admin/layouts/wrapper', $data, FALSE);
    }
}

/* End of file Dashboard.php */
