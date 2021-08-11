<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('id')){
		// 	return redirect('Admin/dashboard');
		// }
		$this->load->model('Loginmodel');
		//$this->load->library('pagination');
		$this->load->model('Dynamic');
		
	}
	public function index(){
		$this->load->view('Admin/home');
		
	}
	public function login(){
		if($this->session->userdata('id')){
			return redirect('dashboard');
		}else{
			$this->load->view('Admin/adminlogin');
		}
		
	}

	public function register(){
		if($this->session->flashdata('success')){
				echo '<div class="alert alert-dismissible alert-success">
				<button type="button" class="btn-close" data-dismiss="alert"></button>
				<strong>Well done!</strong> You successfully sent this important alert message.</div>';
		}

		$countryData=$this->Dynamic->getCountry();
		$this->load->view('Admin/adminRegister',['country'=>$countryData]);
	}

	public function fetch_state(){
		$id=$this->input->post('country_id');
		$this->Dynamic->getState($id);
	}

	public function showForm() {
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha_numeric|min_length[5]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[10]');
		$this->form_validation->set_rules('rcpass', 'Reconfirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('firstname', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required|alpha');
		if($this->form_validation->run()){
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = 'C:\xampp\sendmail\sendmail.exe -t -i';
			$config['wordwrap'] = FALSE;
			$this->email->initialize($config);
			$this->email->from('demotesting0909@gmail.com','Jay');
			$this->email->to($this->input->post('email'));
			$this->email->subject('Congratulations ! You have registered Successfully | TechnoBlog-e');
			$this->email->message(
			'Hi,'.$this->input->post("firstname").'  

Thank you very much for registering at TechnoBlog-e.
			
TechnoBlog-e offers wide range of topics for blog lovers. We are in constant thrive to satisfy your blog hungry nature and we will make sure you keep glued yourself to our plateform,

so stay tuned for some exitising blogs,
						
Best Regards,
Team TechnoBlog-e'
			);
			$this->email->send();
			if(!$this->email->send()){
				$this->session->set_flashdata('success', 'Registration has been done successfully');
				return redirect('Admin/register');
				//show_error($this->email->print_debugger());
			}else{
				$failMsg=$this->session->set_flashdata('failed', 'Registration Failed');
                if ($failMsg) {
					echo '<div class="alert alert-dismissible alert-danger">
					<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
					<strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
					</div>';
                }
			}
		}else{
			$this->load->view('Admin/adminRegister');
		}
	}

	public function adminLogin(){
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run()){
			$uname=$this->input->post('username');
			$pass=$this->input->post('password');
			$id=$this->Loginmodel->usercheck($uname,$pass);
			if($id){
				$this->session->set_userdata('id',$id);
				$this->session->set_flashdata('flsmsg','logginin');
				return redirect('Admin/dashboard');
			}else{
				$this->session->set_flashdata('failed','login failed');
				return redirect('Admin/adminLogin');
			}
		}
		else{
			$this->load->view('Admin/adminLogin');
		}
	}

	public function logout(){
		$this->session->unset_userdata('id');
		return redirect('Admin/adminLogin');
	}

	public function dashboard(){
		if($this->session->userdata('id')){
			//$totalRows=count($this->Loginmodel->totalRows());
			//echo $totalRows;
			// $config=[
			// 	'base_url' => base_url().'Admin/dashboard',
			// 	'total_rows' => $totalRows,
			// 	'per_page' => 5,
			// 	'uri_segment'=>2,
			// 	'full_tag_open' => "<nav><ul class='pagination'>",
			// 	'full_tag_close' => "</ul></nav>",
			// 	'next_tag_open' => "<li>",
			// 	'next_tag_close' => "</li>",
			// 	'prev_tag_open' => "<li>",
			// 	'prev_tag_close' => "</li>",
			// 	'num_tag_open' => "<li>",
			// 	'num_tag_close' => "</li>",	
			// 	'cur_tag_open' => "<li>",
			// 	'cur_tag_close'=> "</li>",
			// ];
			// $this->pagination->initialize($config);
			// $articleData=$this->Loginmodel->articlelist($config['per_page'],$this->uri->segment(2));
			$articleData=$this->Loginmodel->articlelist();
			$this->load->view('Admin/adminDashboard',['data'=>$articleData]);
		}else{
			return redirect('Admin/adminLogin');
		}
	}

	public function addarticle(){
		$this->load->view('Admin/adminAddArticle');
	}

	public function savearticle(){
		$this->form_validation->set_rules('article_title', 'Article Title', 'required');
		$this->form_validation->set_rules('article_body', 'Article Details', 'required');
		if($this->form_validation->run()){
			$post=$this->input->post();
			// echo "<pre>";
			// print_r($post);
			// exit;
			
			$successData=$this->Loginmodel->newArticle($post);
			if($successData){
				$this->session->set_flashdata('articleAdded',"new article Added");
			}else{
				$this->session->set_flashdata('articleFailedToAdded',"new article not Added");
			}
			return redirect('Admin/dashboard');
			
		}else{
			$this->load->view('Admin/adminAddArticle');
		};
		
	}

	public function delArticle(){
		$requestedId=$this->input->post('id');
		$confirmDel=$this->Loginmodel->requestDelArticle($requestedId);
		if($confirmDel){
			$this->session->set_flashdata('delConfirmation','delete Successfully');
		}else{
			$this->session->set_flashdata('notDelConfirmation','delete Unsuccessfully');
		}
		return redirect('Admin/dashboard');
	}

	public function getArticleId($reqId){
		$rt=$this->Loginmodel->getArticleId($reqId);
		$this->load->view('Admin/editAdminArticle',['article'=>$rt]);
	}

	public function editArticle(){
		$reqId=$this->input->post('id');
		$this->form_validation->set_rules('article_title', 'Article Title', 'required');
		$this->form_validation->set_rules('article_body', 'Article Details', 'required');
		if($this->form_validation->run()){
			$post=$this->input->post();
			$editNewData=$this->Loginmodel->updateArticle($reqId,$post);
			
			if($editNewData){
				$this->session->set_flashdata("editSuccess","data updated");
			}
			return redirect("Admin/dashboard");
		}else{
			$this->load->view('Admin/editAdminArticle');
		};
	}

}
