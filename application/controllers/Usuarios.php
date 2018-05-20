<?php
class Usuarios extends CI_Controller{

    public function view($page){

        $data = array();
        //checa se a pagina existe
        if ( ! file_exists(APPPATH.'views/usuarios/'.$page.'.php'))
        {   
            show_404();
        }
            
        $this->load->view('templates/header', $data);
        $this->load->view('usuarios/' . $page, $data);
        $this->load->view('templates/footer');
    }

    function login_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        if ($this->form_validation->run()) {
            $login = $this->input->post('login');
            $senha = $this->input->post('senha');

            $dados = $this->Usuarios_model->validate($login, $senha);
            if ($dados[0]) {
                $session_data = array(
                    'id' => %dados[0]
                    'login' => $login,
                    'tipo' => $dados[1],
                );
                $this->session->set_userdata($session_data);
                redirect(base_url());
            }
            else
            {
                $this->session->set_flashdata('error', 'Dados inválidos');
                redirect(base_url() . 'login');
            }
        }
        else
        {
            $this->view('login');
        }
    }

    function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('tipo');
        redirect(base_url() . 'login');
    }

    function code_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('code', 'Code', 'required');
        if ($this->form_validation->run()) {
            $code = $this->input->post('code');

            $aux = $this->Usuarios_model->validate_code($code);
            if ($aux) {
                $session_data = array(
                    'code' => $code,
                );
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'pre_cadastro/' . $aux);
            }
            else
            {
                $this->session->set_flashdata('error', 'Código inválido');
                redirect(base_url() . 'pre_cadastro');
            }
        }
        else
        {
            $this->view('pre_cadastro');
        }
    }

    function cadastro_aluno_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('rm', 'RM', 'required');
        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        if ($this->form_validation->run()) {
            $usuario = [
                'hashaluno' => $this->session->userdata('code'),
                'nome' => $this->input->post('nome'),
                'rm' => $this->input->post('rm'),
                'login' => $this->input->post('login'),
                'senha' => $this->input->post('senha'),
            ];

            $this->Usuarios_model->insert_aluno($usuario);
            
            $this->session_data->unset_userdata('code');
            redirect(base_url());
        }
        else
        {
            $this->view('pre_cadastro');
        }
    }

    function cadastro_corretor_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('rm', 'RM', 'required');
        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        if ($this->form_validation->run()) {
            $usuario = [
                'hashcorretor' => $this->session->userdata('code'),
                'nome' => $this->input->post('nome'),
                'rm' => $this->input->post('rm'),
                'login' => $this->input->post('login'),
                'senha' => $this->input->post('senha'),
            ];

            $this->Usuarios_model->insert_corretor($usuario);
            
            $this->session_data->unset_userdata('code');
            redirect(base_url());
        }
        else
        {
            $this->view('pre_cadastro');
        }
    }
}