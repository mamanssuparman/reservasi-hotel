<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_user', 'MU');
        cek_login();
    }
    public function Index()
    {
        $data = [
            'title'     => 'Hotel-Ku | Master Data ',
            'judul'     => 'Master Data ',
            'subjudul'  => 'User',
            'breadcrumb1'   => 'Master Data',
            'datauser'      => $this->MU->AmbilAll()->result()
        ];
        $this->template->load('Admin/Template', 'Admin/User/Index', $data);
    }
    public function Add()
    {
        $this->form_validation->set_rules('nameuser', 'Nama Suser', 'required');
        $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('notelepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirmpassword', 'Password', 'required|matches[password]');
        $this->form_validation->set_rules('role', 'Password', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('is_unique', '{field} sudah terdaftar di dalam database, silahkan ganti dengan yang lain.!');
        $this->form_validation->set_message('matches', '{field} tidak sama.!');
        if ($this->form_validation->run() == false) {
            $data = [
                'title'     => 'Hotel-Ku | Master Data',
                'judul'     => 'Master Data',
                'subjudul'  => 'Tambah Tipe Kamar',
                'breadcrumb1'   => 'Tambah Tipe Kamar',
            ];
            $this->template->load('Admin/Template', 'Admin/User/Add', $data);
        } else {
            $data = [
                'nameuser'          => $this->input->post('nameuser', TRUE),
                'jeniskelamin'      => $this->input->post('jeniskelamin', TRUE),
                'alamat'            => $this->input->post('alamat', TRUE),
                'notelepon'         => $this->input->post('notelepon', TRUE),
                'username'          => $this->input->post('username', TRUE),
                'pasword'           => $this->input->post('password', TRUE),
                'role'              => $this->input->post('role', TRUE),
            ];
            $this->MU->Simpan($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil di simpan.!</div>');
            redirect('Admin/User', 'refresh');
        }
    }
    public function Ubah($id = null)
    {
        $this->form_validation->set_rules('nameuser', 'Nama Suser', 'required');
        $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('notelepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirmpassword', 'Password', 'required|matches[password]');
        $this->form_validation->set_rules('role', 'Password', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('is_unique', '{field} sudah terdaftar di dalam database, silahkan ganti dengan yang lain.!');
        $this->form_validation->set_message('matches', '{field} tidak sama.!');
        if ($this->form_validation->run() == false) {
            $data = [
                'title'     => 'Hotel-Ku | Master Data',
                'judul'     => 'Master Data',
                'subjudul'  => 'Tambah Tipe Kamar',
                'breadcrumb1'   => 'Tambah Tipe Kamar',
                'id'            => $id
            ];
            $this->template->load('Admin/Template', 'Admin/User/Ubah', $data);
        } else {
            $data = [
                'nameuser'          => $this->input->post('nameuser', TRUE),
                'jeniskelamin'      => $this->input->post('jeniskelamin', TRUE),
                'alamat'            => $this->input->post('alamat', TRUE),
                'notelepon'         => $this->input->post('notelepon', TRUE),
                'username'          => $this->input->post('username', TRUE),
                'pasword'           => $this->input->post('password', TRUE),
                'role'              => $this->input->post('role', TRUE),
            ];
            $this->MU->Ubah($data, ['idusers' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil di simpan.!</div>');
            redirect('Admin/User', 'refresh');
        }
    }
    public function getJsonUbah($id)
    {
        $json = $this->MU->AmbilJsonUbah($id);
        echo json_encode($json);
    }
}
