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

        public function editUser($userId){
            $query = $this->db->get_where('users', array('id' => $userId));
            return $query->row();
        }

        public function UpdateUser($data, $userId){
            return $this->db->update('users', $data, array('id' => $userId));
        }


        public function delUser($userId){
            return $this->db->delete('users', array('id' => $userId));
        }

        public function delAllUsers(){
            return $this->db->empty_table('users');
        }  
    }
?>