<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_m extends CI_Model
{
    public function profile($id)
    {
        $this->db->join('role', 'user.role = role.id', 'left');
        return $this->db->get_where('user', ['user.id' => $id])->row();
    }

    public function add_pengajar($data)
    {
        return $this->db->insert('user', $data);
    }

    public function add_siswa($data)
    {
        return $this->db->insert('user', $data);
    }

    public function getPengajar()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('role', 'user.role = role.id', 'left');
        $this->db->where('user.role', 88);

        if ($this->input->get('search')['value']) {
            $this->db->like('nama', $this->input->get('search')['value']);
            $this->db->or_like('username', $this->input->get('search')['value']);
        }

        if ($this->input->get('order')) {
            $this->db->order_by(
                $this->input->get('order')['0']['column'],
                $this->input->get('order')['0']['dir']
            );
        } else {
            $this->db->order_by('user.nama', 'desc');
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

    public function countAll()
    {
        $this->db->from('user');
        $this->db->where('role', 88);
        return $this->db->count_all_results();
    }

    public function getSiswa()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role', 77);

        if ($this->input->get('search')['value']) {
            $this->db->like('nama', $this->input->get('search')['value']);
            $this->db->or_like('username', $this->input->get('search')['value']);
        }

        if ($this->input->get('order')) {
            $this->db->order_by(
                $this->input->get('order')['0']['column'],
                $this->input->get('order')['0']['dir']
            );
        } else {
            $this->db->order_by('nama', 'desc');
        }
    }

    public function dataSiswa()
    {
        self::getSiswa();
        if ($this->input->get('length') !== -1) {
            $this->db->limit($this->input->get('length'), $this->input->get('start'));
        }
        return $this->db->get()->result();
    }

    public function filteredSiswa()
    {
        self::getSiswa();
        return $this->db->get()->num_rows();
    }

    public function countAllSiswa()
    {
        $this->db->from('user');
        $this->db->where('role', 77);
        return $this->db->count_all_results();
    }

    public function hapusPengajar($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}

/* End of file Admin_m.php */