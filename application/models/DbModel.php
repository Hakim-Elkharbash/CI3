<?php
    class DbModel extends CI_Model{
        public function showUsers(){
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get('users');
            return $query->result();
        }  

        public function saveUser($data){
            return $this->db->insert('users',$data);
        }  

        public function delAllUsers(){
            return $this->db->empty_table('users');
        }  
    }
?>