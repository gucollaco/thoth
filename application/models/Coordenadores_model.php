<?php
    class Coordenadores_model extends CI_Model{

        public function __construct(){
            $this->load->database();
        }

        function insert_aluno($aluno) {
            $this->db->insert('aluno', $aluno);
        }

        function insert_corretor($corretor) {
            $this->db->insert('corretor', $corretor);
        }

        function insert_erro_comum($erro) {
            $this->db->insert('erro_comum', $erro);
        }

        function insert_comentario_comum($comentario) {
            $this->db->insert('comentario_comum', $comentario);
        }

        function get_corretores($id_coord) {
            return array();
        }

        function get_redacoes_entregues($turma) {
            return array();
            
        }

        function get_redacoes_corrigidas($turma) {
            return array();
            
        }
    }

