<?php
    require APPPATH.'libraries/REST_Controller.php';
    class Schools extends REST_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }
        public function index_post(){
            $input = $this->input->post();
            $this->db->insert('schools',$input);
            $this->response(['User created successfully.'], REST_Controller::HTTP_OK);
        }
        public function index_put($id){
            $input = $this->put();
            $this->db->update('schools', $input, array('id'=> $id));
            $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
        }
        public function index_delete($id){
            $this->db->delete('schools', array('id'=>$id));
            $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
        }
        public function index_get(){
            if(!empty($id)){
                $data = $this->db->get_where('schools', ['id' => $id])->row_array();
            }
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }
?>