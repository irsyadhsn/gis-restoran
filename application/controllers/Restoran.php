<?php

class Restoran extends CI_Controller
{
  public function __construct()
  {
      parent::__construct();
      $this->load->model('m_restoran');
  }


  public function index()
  {
    $data = array(
      'title' => 'Data restoran',
      'restoran' => $this->m_restoran->tampil(),
      'isi' => 'v_datarestoran',
    );
    $this->load->view('layout/v_wrapper', $data, FALSE);
  }

  // public function input() {
  //   $this->form_validation->set_rules('nama_restoran', 'Nama Restoran', 'required',array(
  //     'required' => '%s Harus DIISII!!!'
  //   ));
    
  //   if ($this->form_validation->run() == FALSE) {
  //     $data = array(
  //     'title' => 'Input Data restoran',
  //     'isi' => 'v_input_datarestoran',
  //   );
  //   }
  //   $this->load->view('layout/v_wrapper', $data, FALSE);
  // }

  

  public function input()
  {
    
    $this->user_login->cek_login();

    $this->form_validation->set_rules('nama_restoran', 'Nama restoran', 'required', array(
        'required' => '%s Wajib Diisi !'
    ));

    $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
        'required' => '%s Wajib Diisi !'
    ));


    $this->form_validation->set_rules('latitude', 'Latitude', 'required', array(
        'required' => '%s Wajib Diisi !'
    ));

    $this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
        'required' => '%s Wajib Diisi !'
    ));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Input Data restoran',
                'isi' => 'v_input_datarestoran',
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } else {
            $config['upload_path']          = './gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2048;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title' => 'Input Data restoran',
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'v_input_datarestoran',
                );
                $this->load->view('layout/v_wrapper', $data, false);
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/' . $upload_data['upload_data']['file_name'];
                $this->load->library('image_lib', $config);
                //simpan ke dalam database
                $data = array(
                    'nama_restoran' => $this->input->post('nama_restoran'),
                    'alamat' => $this->input->post('alamat'),
                    'latitude' => $this->input->post('latitude'),
                    'longitude' => $this->input->post('longitude'),
                    'gambar' => $upload_data['upload_data']['file_name'],
                );
                $this->m_restoran->simpan($data);
                $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan!');
                redirect('restoran/input');
            }
        }
        $data = array(
            'title' => 'Input Data restoran',
            'isi' => 'v_input_datarestoran',
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_restoran)
    {
        $this->user_login->cek_login();

        $this->form_validation->set_rules('nama_restoran', 'Nama restoran', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('latitude', 'Latitude', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

       

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Edit Data restoran',
                'restoran' => $this->m_restoran->detail($id_restoran),
                'isi' => 'v_edit_datarestoran',
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } else {
            $config['upload_path']          = './gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2048;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title' => 'Edit Data restoran',
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'v_edit_datarestoran',
                );
                $this->load->view('layout/v_wrapper', $data, false);
            } else {
                //edit dengan ubah data
                $upload_data = array('upload_data' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/' . $upload_data['upload_data']['file_name'];
                $this->load->library('image_lib', $config);
                //simpan ke dalam database
                $data = array(
                    'id_restoran' => $id_restoran,
                    'nama_restoran' => $this->input->post('nama_restoran'),
                    'alamat' => $this->input->post('alamat'),
                    'latitude' => $this->input->post('latitude'),
                    'longitude' => $this->input->post('longitude'),
                    'gambar' => $upload_data['upload_data']['file_name'],
                );
                $this->m_restoran->edit($data);
                $this->session->set_flashdata('pesan', 'Data restoran berhasil diedit!');
                redirect('restoran/index');
            }
            //edit tanpa upload gambar
            $data = array(
                'id_restoran' => $id_restoran,
                'nama_restoran' => $this->input->post('nama_restoran'),
                'alamat' => $this->input->post('alamat'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
            );
            $this->m_restoran->edit($data);
            $this->session->set_flashdata('pesan', 'Data restoran berhasil diedit!');
            redirect('restoran/index');
        }

        $data = array(
            'title' => 'Edit Data restoran',
            'restoran' => $this->m_restoran->detail($id_restoran),
            'isi' => 'v_edit_datarestoran',
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function delete($id_restoran)
    {
        $this->user_login->cek_login();
        $data = array('id_restoran' => $id_restoran);
        $this->m_restoran->delete($data);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus !!!');
        redirect('restoran/index');
    }
   }

/* End of file restoran.php */