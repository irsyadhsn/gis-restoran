<?php

class Login extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('password', 'password', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));


        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->user_login->login($username, $password);
        }

        $data = array(
            'title' => 'Login User',
        );
        $this->load->view('v_login', $data, FALSE);
    }

    public function logout()
    {
        $this->user_login->logout();
    }
}

/* End of file Login.php */
