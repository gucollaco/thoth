<?php
    class Alunos_model extends CI_Model{

        public function __construct(){
            $this->load->database();
        }

        public function insert_redacao($redacao) {
            $this->db->insert('redacao', $redacao);
        }

        public function get_redacoes($id_aluno) {
            $this->db->where('idaluno', $id_aluno);
            return $this->db->get('redacao')->result_array();
        }
    }