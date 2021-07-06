<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
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
            'content' => 'admin/pages/siswa',
            'header' => 'Siswa',
            'profile' => $this->admin_m->profile($id)

        ];

        $this->load->view('admin/layouts/wrapper', $data, FALSE);
    }

    public function siswa_add_page()
    {
        $id = $this->session->userdata('id');

        $data = [
            'content' => 'admin/pages/add_siswa',
            'header' => 'Tambah Siswa',
            'profile' => $this->admin_m->profile($id)

        ];

        $this->load->view('admin/layouts/wrapper', $data, FALSE);
    }

    public function add_siswa()
    {
        $input = $this->input->post();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if (!$this->form_validation->run()) {
            $this->siswa_add_page();
        } else {
            $password = $this->hash($input['username']);
            $data = [
                'nama' => $input['nama'],
                'username' => $input['username'],
                'password' => $password,
                'email' => $input['email'],
                'role' => 77
            ];
            $this->admin_m->add_siswa($data);
            $this->index();
        }
    }

    public function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
    }

    public function getSiswa()
    {
        $data = $this->admin_m->dataSiswa();
        $siswa = [];
        foreach ($data as $benVal) {
            // $explode = explode('-', $benVal->tanggal_lahir);
            // $tgl = $explode[2] . '-' . $explode[1] . '-' . $explode[0];
            $temp = [];
            $temp[] = '

        <a href="' . site_url('0/hapus/siswa/') . $benVal->id . '" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus" target="">
            <i class="fas fa-trash"></i>
        </a>';

            $temp[] = htmlspecialchars($benVal->nama, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($benVal->username, ENT_QUOTES, 'UTF-8');
            // $temp[] = htmlspecialchars($benVal->rolename, ENT_QUOTES, 'UTF-8');
            // $temp[] = htmlspecialchars($benVal->created_at, ENT_QUOTES, 'UTF-8');
            // $temp[] = htmlspecialchars($benVal->updated_at, ENT_QUOTES, 'UTF-8');

            $siswa[] = $temp;
        }

        $output['draw'] = intval($this->input->get('draw'));
        $output['recordsTotal'] = $this->admin_m->countAllSiswa();
        $output['recordsFiltered'] = $this->admin_m->filteredSiswa();
        $output['data'] = $siswa;

        echo json_encode($output);
    }

    public function hapus($id)
    {
        $this->admin_m->hapusPengajar($id);
        $this->index();
    }
}

/* End of file Siswa.php */
