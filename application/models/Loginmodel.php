<?php

class Loginmodel extends CI_Model{
	public function usercheck($uname,$pass){
		$res=$this->db->where(['username'=>$uname,'password'=>$pass])
				->get('users');
		if($res->num_rows()){
			return $res->row()->id;
		}else{
			return false;
		}
	}

	public function articlelist(){
		$usrId=$this->session->userdata('id');
		// echo $usrId;
		//exit;
		$res=$this->db->order_by('id','desc')
					->select('users_id,id,article_title,article_body')
					->from('articles')
					//->limit($limit,$offset)
					->where(['users_id'=>$usrId])
					->get();
			return $res->result();
	}

	public function totalRows(){
		$usrId=$this->session->userdata('id');
		$res=$this->db->order_by('id','desc')
						->select('users_id,id,article_title,article_body')
						->from('articles')
						->where(['users_id'=>$usrId])
						->get();
		return $res->result();
	}

	public function userArticle(){
		$res=$this->db->select('id,article_title,article_body')
					  ->get('articles');
		return $res->result(); //returns multiple objects
	}

	public function newArticle($data){
		// use below method if name in form is differ than table fields
		$id=$data['users_id'];
		$article_title=$data['article_title'];
		$article_details=$data['article_body'];
		return $this->db->insert('articles',['users_id'=>$id,'article_title'=>$article_title,'article_body'=>$article_details]);

		//use below method if form name fields and table fields have same names
		// return $this->db->insert('articles',$data);
	}

	public function requestDelArticle($id){
		return $this->db->delete('articles',['id'=>$id]);
	}
	
	public function getArticleId($id){
		$getId=$this->db->where('id',$id)
					->get('articles');
		return $getId->row(); // return only 1 row
	}
	
	public function updateArticle($id,array $post){
		return ($updateId=$this->db->where('id',$id)
							->update('articles',$post));
		
	}

}	

?>
