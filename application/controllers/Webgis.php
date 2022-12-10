<?php

class Webgis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_restoran');
    }

    public function index()
    {
        $data = array(
            'title' => 'Web GIS restoran',
            'restoran' => $this->m_restoran->tampil(),
            'isi' => 'v_webgis',
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    public function list_restoran()
    {
        $data = array(
            'title' => 'List restoran',
            'restoran' => $this->m_restoran->tampil(),
            'isi' => 'v_list_restoran',
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    public function about()
    {
        $data = array(
            'title' => 'About restoran',
            'isi' => 'v_about',
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    public function detail($id_restoran)
    {
        $data = array(
            'title' => 'Detail restoran',
            'restoran' => $this->m_restoran->detail($id_restoran),
            'isi' => 'v_detail',
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }
}

/* End of file Webgis.php */
