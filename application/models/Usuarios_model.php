<?php
    class Usuarios_model extends CI_Model{

        public function __construct(){
            $this->load->database();
        }

        public function validate($username, $password){
            return array('id' => '1', 'tipo' => 'aluno');
            $this->db->select('id_usuario');
            $this->db->select('nome');
            $this->db->select('email');
            $this->db->select('username');
            $this->db->select('nivel');
            $this->db->select('permissoes');

            $this->db->where('username', $username);
            $this->db->where('senha', $password);
            $this->db->where('status', 1);

            // Run the query
            $result = $this->db->get('usuarios')->result_array();

            if(count($result) == 0) return false;

            return $result[0];
        }

        public function validate_code($code) {
            return 'aluno';
            $this->db->select('id_usuario');
            $this->db->select('nome');
            $this->db->select('email');
            $this->db->select('username');
            $this->db->select('nivel');
            $this->db->select('permissoes');

            $this->db->where('username', $username);
            $this->db->where('senha', $password);
            $this->db->where('status', 1);

            // Run the query
            $result = $this->db->get('usuarios')->result_array();

            if(count($result) == 0) return false;

            return $result;
        }

        public function get_usuario($id_usuario){
            $this->db->select('id_usuario');
            $this->db->select('nome');
            $this->db->select('email');
            $this->db->select('username');
            $this->db->select('nivel');
            $this->db->select('permissoes');
            
            $this->db->where('id_usuario', $id_usuario);
            $result = $this->db->get('usuarios')->result_array()[0];

            $result['permissoes'] = explode(',', $result['permissoes']);

            return $result;
        }

        public function insert_aluno($usuario){        
            $this->db->insert('aluno', $usuario);
        }

        public function insert_corretor($usuario){        
            $this->db->insert('corretor', $usuario);
        }
    }