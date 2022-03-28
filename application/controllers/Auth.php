<?php

class Auth extends CI_Controller
{
    public function Index()
    {
        $data = [
            'title'     => "Hotelku",
        ];
        $this->template->load('Users/Template', 'Users/Login', $data);
    }
    public function Register()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|is_unique[tamu.nik]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jeniskelamin', 'jeniskelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nomortelepon', 'Nomor telepon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tamu.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confpassword', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong.!');
        $this->form_validation->set_message('is_unique', '{field} sudah terdaftar di dalam database.!');
        $this->form_validation->set_message('matches', '{field} Tidak Sama dengan password');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title'     => "Hotelku",
            ];
            $this->template->load('Users/Template', 'Users/Register', $data);
        } else {
            $data = [
                'title'     => "Hotelku",
            ];
            $datasimpan =
                [
                    'nik'       => $this->input->post('nik'),
                    'nama'      => $this->input->post('nama'),
                    'jeniskelamin'      => $this->input->post('jeniskelamin'),
                    'alamat'      => $this->input->post('alamat'),
                    'telepon'      => $this->input->post('nomortelepon'),
                    'username'      => $this->input->post('username'),
                    'pasword'      => $this->input->post('password'),
                ];
            $this->db->insert('tamu', $datasimpan);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Registrasi berhasil.!</div>');
            $this->template->load('Users/Template', 'Users/Register', $data);
        }
    }
    public function Cek()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong.!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title'     => "Hotelku",
            ];
            $this->template->load('Users/Template', 'Users/Login', $data);
        } else {
            $this->db->where('username', $this->input->post('username'));
            $this->db->where('pasword', $this->input->post('password'));
            $hasil = $this->db->get('tamu');
            if ($hasil->row_array() > 0) {
                foreach ($hasil->result() as $ketemu) {
                    $session = array(
                        'id_user'       => $ketemu->idtamu,
                        'username'      => $ketemu->username,
                        'nik'           => $ketemu->nik,
                        'nama_user'     => $ketemu->nama
                    );
                    $this->session->set_userdata($session);
                }
                redirect('', 'refresh');
            } else {
                $data = [
                    'title'     => "Hotelku",
                ];
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning">Maaf, data username atau password tidak ditemukan.!</div>');
                $this->template->load('Users/Template', 'Users/Login', $data);
            }
        }
    }
    public function Logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('nama_user');
        $this->session->unset_userdata('id_user');
        redirect('', 'refresh');
    }
}
