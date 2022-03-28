<?php

class Fasilitashotel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_fasilitashotel', 'MFH');
        cek_login();
    }
    public function Index()
    {
        $data = [
            'title'     => 'Hotel-Ku | Master Data ',
            'judul'     => 'Master Data ',
            'subjudul'  => 'Fasilitas Hotel',
            'breadcrumb1'   => 'Master Data',
            'datafasilitashotel'    => $this->MFH->Ambil(['jenisfasilitas' => 'Hotel'])->result()
        ];
        $this->template->load('Admin/Template', 'Admin/Fasilitashotel/Index', $data);
    }
    public function Add()
    {
        $this->form_validation->set_rules('namafasilitas', 'Nama Fasilitas', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong.!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title'     => 'Hotel-Ku | Master Data ',
                'judul'     => 'Master Data ',
                'subjudul'  => 'Tambah Fasilitas Hotel',
                'breadcrumb1'   => 'Master Data',
            ];
            $this->template->load('Admin/Template', 'Admin/Fasilitashotel/Add', $data);
        } else {
            $acak = rand(1000, 9999);
            $foto = $acak . '-IMG-Picture.jpg';
            $config['upload_path']          = './upload/';
            $config['allowed_types']         = 'jpg';
            $config['max_size']             = 1024;
            $config['file_name']            = $foto;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('galery')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data gagal di upload.!</div>');
                redirect('Admin/Fasilitashotel', 'refresh');
            } else {
                $data = [
                    'namafasilitas'     => $this->input->post('namafasilitas'),
                    'picture'            => $foto,
                    'jenisfasilitas'    => 'Hotel'
                ];
                $this->MFH->Simpan($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil di simpan.!</div>');
                redirect('Admin/Fasilitashotel', 'refresh');
            }
        }
    }
    public function Ubah($id = null)
    {
        $this->form_validation->set_rules('namafasilitas', 'Nama Fasilitas', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong.!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title'     => 'Hotel-Ku | Master Data ',
                'judul'     => 'Master Data ',
                'subjudul'  => 'Tambah Fasilitas Hotel',
                'breadcrumb1'   => 'Master Data',
                'id'            => $id,
                'dataubahfasilitas' => $this->MFH->Ambil(['idfasilitas' => $id])->result()
            ];
            $this->template->load('Admin/Template', 'Admin/Fasilitashotel/Ubah', $data);
        } else {
            $acak = rand(1000, 9999);
            $foto = $acak . '-IMG-Picture.jpg';
            $config['upload_path']          = './upload/';
            $config['allowed_types']         = 'jpg';
            $config['max_size']             = 1024;
            $config['file_name']            = $foto;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('galery')) {
                // Jika di ubah tanpa gambar
                $dataubahtanpagambar = [
                    'namafasilitas' => $this->input->post('namafasilitas')
                ];
                $this->MFH->Ubah($dataubahtanpagambar, ['idfasilitas' => $id]);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil di perbaharui.!</div>');
                redirect('Admin/Fasilitashotel', 'refresh');
            } else {
                // Jika di ubah dengan gambar
                $data = [
                    'namafasilitas'     => $this->input->post('namafasilitas'),
                    'picture'            => $foto,
                ];
                $this->MFH->Ubah($data, ['idfasilitas' => $id]);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil di Perbaharui.!</div>');
                redirect('Admin/Fasilitashotel', 'refresh');
            }
        }
    }
}
