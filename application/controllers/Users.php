<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller{
	
	public function __construct()
	{	
		parent::__construct();
		$this->load->model('Loginmodel');
	}


	public function index(){
		$res=$this->Loginmodel->userArticle();
		$this->load->view('Users/article_list',['res'=>$res]);
	}
	
	
}
