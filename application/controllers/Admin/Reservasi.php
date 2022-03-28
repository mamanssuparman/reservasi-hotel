<?php

class Reservasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_reservasi', 'MR');
        cek_login();
    }
    public function Index()
    {
        $data = [
            'title'     => 'Hotel-Ku | Transaksi',
            'judul'     => 'Transaksi',
            'subjudul'  => 'Reservasi',
            'breadcrumb1'   => 'Transaksi',
            'datareservasi' => $this->MR->AmbilDataReservasi()->result()
        ];
        $this->template->load('Admin/Template', 'Admin/Reservasi/Index', $data);
    }
    public function Detail($id = null)
    {
        $data = [
            'title'     => 'Hotel-Ku | Transaksi',
            'judul'     => 'Transaksi',
            'subjudul'  => 'Reservasi',
            'breadcrumb1'   => 'Transaksi',
            'id'        => $id
        ];
        $this->template->load('Admin/Template', 'Admin/Reservasi/Detail', $data);
    }
    public function getDetailReservasi($id = null)
    {
        $json = $this->MR->getDetailReservasi($id);
        echo json_encode($json);
    }
    public function Checkin()
    {
        $this->form_validation->set_rules('idnya', 'id', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'status'    => 'CHECKIN'
            ];
            $this->MR->Ubah($data, ['idreservasi' => $this->input->post('idnya')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil di perbaharui</div>');
        }
    }
    public function Checkout()
    {
        $this->form_validation->set_rules('idnya', 'id', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'status'    => 'CHECKOUT'
            ];
            $this->MR->Ubah($data, ['idreservasi' => $this->input->post('idnya')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil di perbaharui</div>');
        }
    }
    public function Cancel()
    {
        $this->form_validation->set_rules('idnya', 'id', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'status'    => 'CANCEL'
            ];
            $this->MR->Ubah($data, ['idreservasi' => $this->input->post('idnya')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil di perbaharui</div>');
        }
    }
}
