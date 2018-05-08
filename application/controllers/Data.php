<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Data extends REST_Controller {
	function __construct() {
        parent::__construct();
    }

     function index_post() {
        
        $username = $this->post('username');

        if ($username != ""){
            $this->db->select('username, fullname');
            $this->db->from('profile');
            $this->db->where('username',$username);
            $query=$this->db->get();

            if ($query->num_rows() > 0) {
                $this->response([
                'status' => TRUE,
                'message' => 'Success',
                'data' =>$query->result_array()
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                'status' => FALSE,
                'message' => 'Failed'
                ], REST_Controller::HTTP_BAD_REQUEST); 
            }
        }
        else {        
            $this->response([
            'status' => FALSE,
            'message' => 'Failed'
            ], REST_Controller::HTTP_BAD_REQUEST);  
        }
     }

}

?>