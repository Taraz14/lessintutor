<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_m extends CI_Model
{

    public function getKelasSd()
    {
        $this->db->join('tingkatan', 'mapel.id_tingkatan = tingkatan.id', 'left');
        return $this->db->get_where('mapel', ['id_tingkatan' => 1])->result();
    }

    public function getKelasSmp()
    {
        $this->db->join('tingkatan', 'mapel.id_tingkatan = tingkatan.id', 'left');
        return $this->db->get_where('mapel', ['id_tingkatan' => 2])->result();
    }

    public function getKelasSma()
    {
        $this->db->join('tingkatan', 'mapel.id_tingkatan = tingkatan.id', 'left');
        return $this->db->get_where('mapel', ['id_tingkatan' => 3])->result();
    }

    public function getPengajar($id_mapel)
    {
        $this->db->join('user', 'pengajar.id_user = user.id');
        $this->db->join('role', 'user.role = role.id');
        $this->db->join('mapel', 'pengajar.id_mapel = mapel.id_mapel', 'inner');
        return $this->db->get_where('pengajar', ['pengajar.id_mapel' => $id_mapel])->result();
    }
}

/* End of file Home_m.php */
