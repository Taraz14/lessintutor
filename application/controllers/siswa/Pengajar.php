<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(array('admin_m', 'pembayaran_m'));

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
        $id = $this->session->userdata('id');

        $data = $this->pembayaran_m->dataPengajar($id);
        $pengajar = [];
        foreach ($data as $benVal) {
            // $explode = explode('-', $benVal->tanggal_lahir);
            // $tgl = $explode[2] . '-' . $explode[1] . '-' . $explode[0];
            $temp = [];
            if ($benVal->is_payed == 0 && $benVal->bukti_bayar == null && $benVal->is_confirmed == 0) {
                $temp[] = '
        <a href="' . site_url('2/bayar/pengajar/') . $benVal->id . '" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Cash" target="">
            <i class="fas fa-cash-register"></i> Pembayaran
        </a>';
            }
            if ($benVal->is_payed == 1 && !empty($benVal->bukti_bayar) && $benVal->is_confirmed == 0) {
                $temp[] = '
                <a href="' . site_url('2/bayar/pengajar/') . $benVal->id . '" class="btn btn-warning btn-sm disabled" data-toggle="tooltip" title="Cash" target="">
                    <i class="fas fa-cash-register"></i> Menunggu Konfirmasi
                </a>';
            }
            if ($benVal->is_payed == 1 && !empty($benVal->bukti_bayar && $benVal->is_confirmed == 1)) {
                $temp[] = '
                <a href="' . site_url('2/bayar/pengajar/') . $benVal->id . '" class="btn btn-default btn-sm" data-toggle="tooltip" title="Cash" target="">
                    <i class="fas fa-cash-register"></i> Detail Pembayaran
                </a>';
            }


            $temp[] = htmlspecialchars($benVal->napeng, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($benVal->mapelname, ENT_QUOTES, 'UTF-8');
            if ($benVal->is_payed == 0 && $benVal->bukti_bayar == null && $benVal->is_confirmed == 0) {
                $temp[] = '<span class="right badge badge-danger">' . htmlspecialchars('Belum Upload Bukti Pembayaran', ENT_QUOTES, 'UTF-8') . '</span';
            }
            if ($benVal->is_payed == 1 && !empty($benVal->bukti_bayar) && $benVal->is_confirmed == 0) {
                $temp[] = '<span class="right badge badge-warning">' . htmlspecialchars('Menunggu Konfirmasi', ENT_QUOTES, 'UTF-8') . '</span';
            }
            if ($benVal->is_payed == 1 && !empty($benVal->bukti_bayar && $benVal->is_confirmed == 1)) {
                $temp[] = '<span class="right badge badge-success">' . htmlspecialchars('Pembayaran Sudah Diterima', ENT_QUOTES, 'UTF-8') . '</span';
            }
            // $temp[] = htmlspecialchars($benVal->created_at, ENT_QUOTES, 'UTF-8');
            // $temp[] = htmlspecialchars($benVal->updated_at, ENT_QUOTES, 'UTF-8');

            $pengajar[] = $temp;
        }

        $output['draw'] = intval($this->input->get('draw'));
        $output['recordsTotal'] = $this->pembayaran_m->countAll($id);
        $output['recordsFiltered'] = $this->pembayaran_m->filtered();
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
