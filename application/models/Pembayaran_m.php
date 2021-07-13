<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_m extends CI_Model
{

    public function getBayar($id_user)
    {
        return $this->db->get_where('pembayaran', ['id_user' => $id_user]);
    }

    public function getPengajar()
    {
        $id = $this->session->userdata('id');
        $this->db->select('u.id, p.id, id_user, id_pengajar, m.id_mapel, bukti_bayar, u.nama AS namsis, us.nama AS napeng, m.mapelname, is_payed, is_confirmed');
        $this->db->from('pembayaran p');
        $this->db->join('user u', 'p.id_user = u.id');
        $this->db->join('user us', 'p.id_pengajar = us.id');
        $this->db->join('mapel m', 'p.id_mapel = m.id_mapel');
        if ($this->session->userdata('role') == 77) {
            $this->db->where('p.id_user', $id);
        }
        if ($this->session->userdata('role') == 88) {
            $this->db->where('p.id_pengajar', $id);
        }


        if ($this->input->get('search')['value']) {
            $this->db->like('us.nama', $this->input->get('search')['value']);
            $this->db->or_like('m.mapelname', $this->input->get('search')['value']);
        }

        if ($this->input->get('order')) {
            $this->db->order_by(
                $this->input->get('order')['0']['column'],
                $this->input->get('order')['0']['dir']
            );
        } else {
            $this->db->order_by('p.id', 'desc');
        }
    }

    public function dataPengajar()
    {
        self::getPengajar();
        if ($this->input->get('length') !== -1) {
            $this->db->limit($this->input->get('length'), $this->input->get('start'));
        }
        return $this->db->get()->result();
    }

    public function filtered()
    {
        self::getPengajar();
        return $this->db->get()->num_rows();
    }

    public function countAll($id)
    {
        $this->db->from('pembayaran');
        $this->db->where('id_user', $id);
        return $this->db->count_all_results();
    }
}

/* End of file Pembayaran_m.php */
