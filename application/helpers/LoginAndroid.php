<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class LoginAndroid extends REST_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->config->set_item('rest_enable_keys', FALSE);
    }

     function index_post() {
     	$nim = $this->post('nim');
     	$password = $this->post('pwd');
        //$query=$this->Login_model->login($nim,$password);
        $query=$this->Login_model->parse_login_mahasiswa($nim,$password);
        $this->response($query, $query['status_code']);
     }

     function pustakasinekad_post() {
     	$nim = $this->post('nim');
        //$query=$this->Login_model->login($nim,$password);
        $query=$this->Login_model->pustakasinekad($nim);
        $this->response($query, $query['status_code']);
     }

}

?>