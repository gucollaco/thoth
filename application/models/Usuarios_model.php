<?php
    class Usuarios_model extends CI_Model{

        public function __construct(){
            $this->load->database();
        }

        public function validate($username, $password){
            $this->db->select('id');
            $this->db->select('tipo');

            $this->db->where('login', $username);
            $this->db->where('senha', $password);

            // Run the query
            // $result = $this->db->query('SELECT codaluno as id, "aluno" as tipo FROM aluno WHERE senha="' + $password + '" UNION SELECT codcorretor as id, "corretor" as tipo from corretor WHERE senha="' + $password + '" UNION SELECT codcoordenador as id, "coordenador" as tipo from coordenador WHERE senha="' + $password + '"')->result_array(); // Colocar select da view
            $result = $this->db->get('credenciais')->result_array();

            if(count($result) == 0) return false;

            // echo $result[0];
            // return array($result[0][0], result[0][1]); // id, tipo
            return $result[0];
        }

        public function validate_code($code) {
            // $this->db->select('id_usuario');
            // $this->db->select('nome');
            // $this->db->select('email');
            // $this->db->select('username');
            // $this->db->select('nivel');
            // $this->db->select('permissoes');

            // $this->db->where('username', $username);
            // $this->db->where('senha', $password);
            // $this->db->where('status', 1);

            // Run the query
            $result = $this->db->query('SELECT "aluno" as tipo FROM aluno WHERE hashaluno=' + $code + ' UNION SELECT "corretor" as tipo from corretor WHERE hashcorretor=' + $code)->result_array(); // Colocar select da view

            if(count($result) == 0) return false;

            return $result[0]; // tipo
        }

        public function insert_aluno($usuario){
            $hashaluno = $usuario['hashaluno'];

            $this->db->where('hashaluno', $hashaluno);

            $this->db->update('aluno', $usuario);
        }

        public function insert_corretor($usuario){
            $hashcorretor = $usuario['hashcorretor'];

            $this->db->where('hashcorretor', $hashcorretor);

            $this->db->insert('corretor', $usuario);
        }
    }