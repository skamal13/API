<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Logout extends REST_Controller {
	function __construct() {
        parent::__construct();
        
    }

     function index_delete() {
        $username = $this->delete('username');

        if ($username != "") {
            $query = $this->db->get_where('keys', array('username' => $username));
            if ($query->num_rows() > 0) {
                $this->db->where('username', $username);
                $this->db->delete('keys');
                $this->response([
                'status' => TRUE,
                'message' => 'Success'
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