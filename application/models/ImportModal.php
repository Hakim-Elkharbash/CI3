<?php
    class ImportModal extends CI_Model{
        public function setupTable($setupTable){
            $this->load->dbforge();
            
            $this->dbforge->drop_table('import',TRUE);

            $fields = array(
                'import_EX_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
                )
            ); // set primary key

            foreach ($setupTable as $tableField) {
                $fields[$tableField] = array('type' => 'TEXT','null' => TRUE,);
            }// set other fialds

         $this->dbforge->add_field($fields);
         $this->dbforge->add_key('import_EX_id', TRUE);
         $this->dbforge->create_table('import');
        } 


        public function saveData($data){
            return $this->db->insert_batch('import', $data); 
        }  

        public function showData(){
            //$this->db->order_by('id', 'DESC');
            $query = $this->db->get('import');
            return $query->result();
        }  

    }
?>