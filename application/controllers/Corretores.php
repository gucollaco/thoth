<?php
class Corretores extends CI_Controller{

    public function view($page = 'home'){

        $data = array();
        //checa se a pagina existe
        if ( ! file_exists(APPPATH.'views/corretores/'.$page.'.php'))
        {   
            show_404();
        }

        $data['assets'] = ['css' => ['image-map-highlighter.css', 'entregar_aluno.css'],
                            'js' => ['image-map-highlighter.js']];
            
        $this->load->view('templates/header', $data);
        $this->load->view('corretores/' . $page, $data);
        $this->load->view('templates/footer');
    }

    function visualizar_redacoes($id_corretor) {
        $data = $this->Corretores_model->get_redacoes($id_corretor);

        return $data;
    }

    function consultar_coletanea($id_coletanea) {
        $data = $this->Corretores_model->get_coletanea($id_coletanea);

        return $data;
    }
}