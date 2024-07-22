<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

	
	// public function index()
	// {
	// 	$this->load->view('inventory/dashboard');
	// }
    function dashboard(){
        $this->load->view('inventory/dashboard');
    }

	function category(){
        $this->load->view('inventory/category');
    }
}
