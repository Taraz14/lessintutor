<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
        $this->load->model(array('Login_m', 'admin_m'));
    }

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->Login_m->login($username, $password)) {
            if ($this->session->userdata('role') == 99) {
                redirect('profile');
            } else if ($this->session->userdata('role') == 88) {
                redirect('1/konfirmasi');
            } else if ($this->session->userdata('role') == 77) {
                redirect('2/pengajar');
            }
        } else {
            $this->session->set_flashdata('failed', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="alert-message">
                    <strong>Kesalahan!</strong> Username atau Password <strong>tidak</strong> sesuai!
                </div>
            </div>');
            redirect('login');
        }
    }

    public function registrasi_page()
    {
        $this->load->view('auth/registrasi', FALSE);
    }

    public function registrasi()
    {
        $input = $this->input->post();
        //rules
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            return $this->registrasi_page();
        } else {
            $password = $this->hash($input['password']);
            $data = [
                'nama' => $input['nama'],
                'username' => $input['username'],
                'password' => $password,
                'email' => $input['email'],
                'role' => 77
            ];
            $this->admin_m->add_pengajar($data);
            $this->index();
        }
    }

    public function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
    }

    public function logout()
    {
        $var = [
            'username' => ''
        ];
        $this->session->unset_userdata($var);
        $this->session->sess_destroy();
        redirect('login');
    }
}

/* End of file Login.php */
