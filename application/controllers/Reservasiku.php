<?php

class Reservasiku extends CI_Controller
{

    public function index()
    {
        $this->load->model('Mod_kamaruser', 'MKU');
        $data =
            [
                'title'     => 'Hotelku',
                'idtamu'        => $this->session->userdata('id_user'),
                'datareservasiku'   => $this->MKU->getDataDetailReservasiku($this->session->userdata('id_user'))->result()
            ];
        $this->template->load('Users/Template', 'Users/Reservasiku', $data);
    }
}
