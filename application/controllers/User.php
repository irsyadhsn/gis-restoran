<?php
  
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class User extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->user_login->cek_login();
    }
  
    public function index()
    {
      $data = array(
        'title' => 'User', 
        'user' => $this->m_user->tampil(),
        'isi' => 'v_datauser'
      );
       $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    //  public function input()
    //   {
    //     $data = array(
    //       'title' => 'Input Data User',
    //       'isi' => 'v_input_datauser',
    //     );
    //     $this->load->view('layout/v_wrapper', $data, FALSE);
    //   }
      public function input()
    {
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('password', 'password', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Input User WEBGIS Restoran',
                'isi' => 'v_input_datauser',
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'nama_user' => $this->input->post('nama_user'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            );
            $this->m_user->simpan($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan!');
            redirect('user/input');
        }
    }

    public function edit($id_user)
    {
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('password', 'password', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Edit User WEBGIS Restoran',
                'user' => $this->m_user->detail($id_user),
                'isi' => 'v_edit_datauser',
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_user' => $id_user,
                'nama_user' => $this->input->post('nama_user'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            );
            $this->m_user->edit($data);
            $this->session->set_flashdata('pesan', 'Data berhasil diedit!');
            redirect('user/index');
        }
    }

    public function delete($id_user)
    {
        $data = array('id_user' => $id_user);
        $this->m_user->delete($data);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
        redirect('user/index');
    }
  
  }
  
  /* End of file Controllername.php */
  
?>