<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelasManage extends CI_Controller
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
            'content' => 'admin/pages/kelas_manage',
            'header' => 'Management Kelas',
            'profile' => $this->admin_m->profile($id),
            'tingkatan' => $this->admin_m->getTingkatan(),
            'pengajar' => $this->admin_m->getAllPengajar(),
            'mapel' => $this->admin_m->getMapel(),
            'getKP' => $this->admin_m->getKelasPengajar()
        ];
        // var_dump($data['pengajar']);
        $this->load->view('admin/layouts/wrapper', $data, FALSE);
    }

    public function getMapelTrigger()
    {

        $id_tingkatan = $this->input->post('id', TRUE);
        $id_tingkatan = html_escape($id_tingkatan);
        $data = $this->admin_m->getMapelTrigger($id_tingkatan);
        echo json_encode($data);
    }

    public function saveKelasAjar()
    {
        $input = $this->input->post();
        $data = [
            'id_user' => $input['pengajar'],
            'id_mapel' => $input['mapel']
        ];

        $this->admin_m->saveKelasAjar($data);
        $this->index();
    }

    public function mapel()
    {
        $id = $this->session->userdata('id');

        $data = [
            'content' => 'admin/pages/mapel',
            'header' => 'Input Mata Pelajaran',
            'profile' => $this->admin_m->profile($id),
            'tingkatan' => $this->admin_m->getTingkatan(),
            'mapel' => $this->admin_m->getMapel()
        ];
        // var_dump($data['pengajar']);
        $this->load->view('admin/layouts/wrapper', $data, FALSE);
    }

    public function insertMapel()
    {
        $input = $this->input->post();
        $data = [
            'id_tingkatan' => $input['tingkat'],
            'mapelname' => $input['mapel']
        ];
        $this->db->insert('mapel', $data);
        $this->mapel();
    }
}

/* End of file KelasManage.php */
