<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('admin_m');
        $this->load->helper('string');

        if ($this->session->userdata('logged_in') == FALSE && !$this->session->userdata('role') == 99) {
            redirect('login');
        }
    }

    public function index()
    {
        $id = $this->session->userdata('id');

        $data = [
            'content' => 'admin/pages/pengajar',
            'header' => 'Pengajar',
            'profile' => $this->admin_m->profile($id)

        ];

        $this->load->view('admin/layouts/wrapper', $data, FALSE);
    }

    public function pengajar_add_page()
    {
        $id = $this->session->userdata('id');

        $data = [
            'content' => 'admin/pages/add_pengajar',
            'header' => 'Tambah Pengajar',
            'profile' => $this->admin_m->profile($id)

        ];

        $this->load->view('admin/layouts/wrapper', $data, FALSE);
    }

    public function add_pengajar()
    {
        $input = $this->input->post();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if (!$this->form_validation->run()) {
            echo validation_errors();
            $this->pengajar_add_page();
        } else {
            $password = $this->hash($input['username']);
            $data = [
                'nama' => $input['nama'],
                'username' => $input['username'],
                'password' => $password,
                'email' => $input['email'],
                'role' => 88
            ];
            $this->admin_m->add_pengajar($data);
            $this->index();
        }
    }

    public function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
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

        <a href="' . site_url('0/hapus/pengajar/') . $benVal->id . '" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus" target="">
            <i class="fas fa-trash"></i>
        </a>';

            $temp[] = htmlspecialchars($benVal->nama, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($benVal->username, ENT_QUOTES, 'UTF-8');
            // $temp[] = htmlspecialchars($benVal->rolename, ENT_QUOTES, 'UTF-8');
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

    public function hapus($id)
    {
        // $id = $this->uri->segment(4);

        $this->admin_m->hapusPengajar($id);
        $this->index();
    }
}

/* End of file Pengajar.php */
