<?php
class Coordenadores extends CI_Controller{

    public function view($page){

        $data = array();
        //checa se a pagina existe
        echo $page;
        if ( ! file_exists(APPPATH.'views/coordenadores/'.$page.'.php'))
        {   
            show_404();
        }

        
        $data['assets'] = ['css' => ['bootstrap.min.1.css', 'sb-admin.css'],
                            'js' => ['sb-admin.js']];
            
            
        $this->load->view('templates/header', $data);
        $this->load->view('templates/dashboard-header', $data);
        $this->load->view('coordenadores/' . $page, $data);
        $this->load->view('templates/footer');
    }

    function cadastro_aluno() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hashaluno', 'Hash-aluno', 'required');
        $this->form_validation->set_rules('unidade', 'Unidade', 'required');
        $this->form_validation->set_rules('turma', 'Turma', 'required');
        if ($this->form_validation->run()) {
            $aluno = [
                'unidade' => $this->input->post('unidade'),
                'turma' => $this->input->post('turma'),
                'hashaluno' => $this->input->post('hashaluno'),
                'id' => $this->session->userdata('id'),
            ];

            $this->Coordenadores_model->insert_aluno($aluno);

            redirect(base_url());
        }
        else
        {
            $this->view('cadastrar_aluno');
        }
    }

    function cadastro_corretor() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hashcorretor', 'Hash-corretor', 'required');
        if ($this->form_validation->run()) {
            $corretor = [
                'hashcorretor' => $this->input->post('hashcorretor'),
                'id' => $this->session->userdata('id'),
            ];

            $this->Coordenadores_model->insert_corretor($corretor);
            
            redirect(base_url());
        }
        else
        {
            $this->view('cadastrar_corretor');
        }
    }

    function cadastro_erros_comuns() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        if ($this->form_validation->run()) {
            $erro = [
                'descricao' => $this->input->post('descricao'),
            ];

            $this->Coordenadores_model->insert_erro_comum($erro);
            
            redirect(base_url());
        }
        else
        {
            $this->view('cadastrar_erros_comuns');
        }
    }

    function cadastro_comentarios_comuns() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        if ($this->form_validation->run()) {
            $comentario = [
                'descricao' => $this->input->post('descricao'),
            ];

            $this->Coordenadores_model->insert_erro_comum($comentario);
            
            redirect(base_url());
        }
        else
        {
            $this->view('cadastrar_comentarios_comuns');
        }
    }

    function consultar_corretores($id_coord) {
        $data = $this->Coordenadores_model->get_corretores($id_coord);

        return $data;
    }

    function consultar_redacoes_entregues($turma) {
        $data = $this->Coordenadores_model->get_redacoes_entregues($turma);

        return $data;
    }

    function consultar_redacoes_corrigidas($turma) {
        $data = $this->Coordenadores_model->get_redacoes_corrigidas($turma);

        return $data;
    }
}