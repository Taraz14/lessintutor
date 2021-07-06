<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_m extends CI_Model
{
    public function login($username, $password)
    {
        $password = $this->hash($password);
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $data = array(
                    'username'      => $row->username,
                    'nama'          => $row->nama,
                    'id'            => $row->id,
                    'role'          => $row->role,
                    'logged_in'     => TRUE
                );
            }
            $this->session->set_userdata($data);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
    }
}

/* End of file Login_m.php */
