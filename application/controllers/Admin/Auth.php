<?php

class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('Admin/Login');
    }
    public function Cek()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong.!!');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Admin/Login');
        } else {
            $this->db->where('username', $this->input->post('username'));
            $this->db->where('pasword', $this->input->post('password'));
            $hasil = $this->db->get('users');
            if ($hasil->row_array() > 0) {
                foreach ($hasil->result() as $ketemu) {
                    $session_data = array(
                        'username'  => $ketemu->username,
                        'role'   => $ketemu->role,
                        'nama'  => $ketemu->nameuser,
                    );
                    $this->session->set_userdata($session_data);
                }
                $data = [
                    'title'     => 'Dashboard',
                    'judul'     => 'Dashboard',
                    'breadcrumb1' => 'Dashboard',
                ];
                redirect('Admin/Dashboard', $data);
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning">Username atau password tidak ditemukan.!</div>');
                redirect('Admin/Auth/');
            }
        }
    }
    public function Logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('nama');
        redirect('Admin/Auth','refresh');
    }
}
