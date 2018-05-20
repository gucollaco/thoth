<?php
class Alunos extends CI_Controller{

    public function view($page){

        $data = array();
        //checa se a pagina existe
        if ( ! file_exists(APPPATH.'views/alunos/'.$page.'.php'))
        {   
            show_404();
        }
            
        $this->load->view('templates/header', $data);
        $this->load->view('alunos/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function submeter_redacao() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('observacao', 'Observação', 'required');
        $this->form_validation->set_rules('semana', 'Semana', 'required');
        $this->form_validation->set_rules('caminho', 'Caminho', 'required');
        $this->form_validation->set_rules('datahora', 'Data-hora', 'required');
        $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('coletanea', 'Coletânea', 'required');
        if ($this->form_validation->run()) {
            $redacao = [
                'observacao' => $this->input->post('observacao'),
                'semana' => $this->input->post('semana'),
                'caminho' => $this->input->post('caminho'),
                'datahora' => $this->input->post('datahora'),
                'categoria' => $this->input->post('categoria'),
                'coletanea' => $this->input->post('coletanea'),
            ];

            $this->Alunos_model->insert_redacao($redacao);
            redirect(base_url());
        }
        else
        {
            $this->view('cadastrar_redacao');
        }
    }
}