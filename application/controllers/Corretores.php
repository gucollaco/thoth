<?php
class Corretores extends CI_Controller{

    public function view($page){

        $data = array();
        //checa se a pagina existe
        if ( ! file_exists(APPPATH.'views/corretores/'.$page.'.php'))
        {   
            show_404();
        }
            
        $this->load->view('templates/header', $data);
        $this->load->view('corretores/' . $page, $data);
        $this->load->view('templates/footer');
    }

    function visualizar_redacoes($id_corretor) {
        $data = Corretores_model->get_redacoes($id_corretor);

        return $data;
    }

    function consultar_coletanea($id_coletanea) {
        $data = Corretores_model->get_coletanea($id_coletanea);

        return $data;
    }
}