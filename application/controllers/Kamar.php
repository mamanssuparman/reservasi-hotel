<?php

class Kamar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_kamaruser', 'MKU');
    }
    public function index()
    {
    }
    public function Detail($id = null)
    {
        $data =
            [
                'title'     => "Hotelku",
                'id'        => $id
            ];
        $this->template->load('Users/Template', 'Users/DetailKamar', $data);
    }
    public function getJsonDetailKamar($id = null)
    {
        $json = $this->MKU->getDataJson($id);
        echo json_encode($json);
    }
    public function Berirating1()
    {
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('id_kamar', 'ID Kamar', 'required');
        if ($this->form_validation->run() == TRUE) {
            $this->db->where('tamuid', $this->input->post('id_user'));
            $this->db->where('kamarid', $this->input->post('id_kamar'));
            $query = $this->db->get('tripadvisor');
            if ($query->row_array() > 0) {
                $data =
                    [
                        'value' => 1
                    ];
                $this->db->set($data);
                $this->db->update('tripadvisor');
            } else {
                $data =
                    [
                        'value' => 1,
                        'tamuid'    => $this->input->post('id_user'),
                        'kamarid'   => $this->input->post('id_kamar')
                    ];
                $this->db->insert('tripadvisor', $data);
            }
            echo json_encode(array('status' => true));
        } else {
            echo json_encode(array('status' => false));
        }
    }
    public function Berirating2()
    {
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('id_kamar', 'ID Kamar', 'required');
        if ($this->form_validation->run() == TRUE) {
            $this->db->where('tamuid', $this->input->post('id_user'));
            $this->db->where('kamarid', $this->input->post('id_kamar'));
            $query = $this->db->get('tripadvisor');
            if ($query->row_array() > 0) {
                $data =
                    [
                        'value' => 2
                    ];
                $this->db->set($data);
                $this->db->update('tripadvisor');
            } else {
                $data =
                    [
                        'value' => 2,
                        'tamuid'    => $this->input->post('id_user'),
                        'kamarid'   => $this->input->post('id_kamar')
                    ];
                $this->db->insert('tripadvisor', $data);
            }
            echo json_encode(array('status' => true));
        } else {
            echo json_encode(array('status' => false));
        }
    }
    public function KirimKomentar()
    {
        $this->form_validation->set_rules('id_tamu', 'ID Tamu', 'required');
        $this->form_validation->set_rules('id_kamar', 'ID Kamar', 'required');
        $this->form_validation->set_rules('komentar', 'Komentar', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'review'    => $this->input->post('komentar'),
                'tamuid'    => $this->input->post('id_tamu'),
                'kamarid'   => $this->input->post('id_kamar'),
            ];
            $this->db->insert('review', $data);
        }
    }
    public function Reservasi($id = null)
    {
        $akses = $this->session->userdata('id_user');
        if ($akses == "") {
            redirect('Auth', 'refresh');
        } else {
            $data =
                [
                    'title'     => 'Hotelku',
                ];
            $this->template->load('Users/Template', 'Users/FormReservasi', $data);
        }
    }
    public function getDataReservasi($iduser = null, $idkamar = null)
    {
        $json = $this->MKU->getDataReservasi($iduser, $idkamar);
        echo json_encode($json);
    }
    public function PesanKamar()
    {
        $data =
            [
                'tamuid'    => $this->input->post('idtamu'),
                'kamarid'   => $this->input->post('idkamar'),
                'startdate' => $this->input->post('tanggalcheckin')
            ];
        $this->db->insert('reservasi', $data);
        redirect('', 'refresh');
    }
}
