<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Login extends REST_Controller {
	function __construct() {
        parent::__construct();
        $this->config->set_item('rest_enable_keys', FALSE);
    }

     function index_post() {
        $username = $this->post('username');
        $password = md5($this->post('password'));

        if ($username != "" or $password!="") {
            $query = $this->db->get_where('profile', array('username' => $username, 'password' => $password));
            if ($query->num_rows() == 1) {
                $key = $this->_generate_key();

                $data = array(
                'username' => $username,
                'key' => $key,
                );
                $this->db->insert('keys', $data);

                $this->response([
                'status' => TRUE,
                'message' => 'Success',
                'key'=>  $key
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

     /* Helper Methods */
    private function _generate_key()
    {
        do
        {
            // Generate a random salt
            $salt = base_convert(bin2hex($this->security->get_random_bytes(64)), 16, 36);
            // If an error occurred, then fall back to the previous method
            if ($salt === FALSE)
            {
                $salt = hash('sha256', time() . mt_rand());
            }
            $new_key = substr($salt, 0, config_item('rest_key_length'));
        }
        while ($this->_key_exists($new_key));
        return $new_key;
    }

    private function _key_exists($key)
    {
        return $this->rest->db
            ->where(config_item('rest_key_column'), $key)
            ->count_all_results(config_item('rest_keys_table')) > 0;
    }

}

?>