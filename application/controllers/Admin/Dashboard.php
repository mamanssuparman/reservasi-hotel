<?php

class Dashboard extends CI_Controller
{
    public function Index()
    {
        $data = [
            'title'     => 'Hotel-Ku | Dashboard',
            'judul'     => 'Dashboard',
            'subjudul'  => 'Dashboard',
            'breadcrumb1'   => 'Dashbord'
        ];
        $this->template->load('Admin/Template', 'Admin/Dashboard/Index', $data);
    }
}
