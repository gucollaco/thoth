<?php
    class Corretores_model extends CI_Model{

        public function __construct(){
            $this->load->database();
        }

        public function get_redacoes($id_corretor) {
            $this->db->where('codcorretor', $id_corretor);

            $result = $this->db->get('redacao')->result_array();

            if(count($result) == 0) return false;

            return array($result);
        }

        public function get_coletanea($id_redacao) {
            $this->db->where('codcoletanea', $id_coletanea);

            $result = $this->db->get('coletanea')->result_array();

            if(count($result) == 0) return false;

            return array($result);
        }
    }