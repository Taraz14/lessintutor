<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sma extends CI_Controller
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
            'content' => 'homepage/sma/sma',
            'head'  => 'SMA',
            'getKelasSma' => $this->home_m->getKelasSma(),
            'profile' => $this->admin_m->profile($id)

        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }

    public function mapel($id_mapel)
    {
        $id = $this->session->userdata('id');

        $data = [
            'content' => 'homepage/sma/mapel',
            'head'  => 'Mata Pelajaran SMA',
            'pengajar' => $this->home_m->getPengajar($id_mapel),
            'profile' => $this->admin_m->profile($id)

        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }

    public function bing()
    {
        $data = [
            'content' => 'homepage/sma/bing',
            'head'  => 'SMA | Bahasa Inggris'
        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }
    public function biologi()
    {
        $data = [
            'content' => 'homepage/sma/biologi',
            'head'  => 'SMA | Biologi'
        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }
    public function fisika()
    {
        $data = [
            'content' => 'homepage/sma/fisika',
            'head'  => 'SMA | Fisika'
        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }
    public function kimia()
    {
        $data = [
            'content' => 'homepage/sma/kimia',
            'head'  => 'SMA | Kimia'
        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }
    public function mtk()
    {
        $data = [
            'content' => 'homepage/sma/mtk',
            'head'  => 'SMA | Matematika'
        ];
        $this->load->view('homepage/layouts/wrapper', $data, FALSE);
    }
}

/* End of file Sma.php */
