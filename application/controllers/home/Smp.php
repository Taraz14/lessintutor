<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Smp extends CI_Controller
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
            'content' => 'homepage/smp/smp',
            'head'  => 'SMP',
            'getKelasSmp' => $this->home_m->getKelasSmp(),
            'profile' => $this->admin_m->profile($id)

        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }

    public function mapel($id_mapel)
    {
        $id = $this->session->userdata('id');


        $data = [
            'content' => 'homepage/smp/mapel',
            'head'  => 'Mata Pelajaran SMP',
            'pengajar' => $this->home_m->getPengajar($id_mapel),
            'profile' => $this->admin_m->profile($id)

        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }

    public function bing()
    {
        $data = [
            'content' => 'homepage/smp/bing',
            'head'  => 'SMP | Bahasa Inggris'
        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }

    public function ipa()
    {
        $data = [
            'content' => 'homepage/smp/ipa',
            'head'  => 'SMP | IPA'
        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }

    public function mandarin()
    {
        $data = [
            'content' => 'homepage/smp/mandarin',
            'head'  => 'SMP | Bahasa Mandarin'
        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }

    public function mtk()
    {
        $data = [
            'content' => 'homepage/smp/mtk',
            'head'  => 'SMP | Matematika'
        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }
}

/* End of file Smp.php */
