<?php
class Dynamic extends CI_Model{
	
public function getCountry(){
	$query=$this->db->order_by('name',"ASC")
					->get('countries');
	return $query->result_array();
}

public function getState($id){
	$stateName=$this->db->select('*')
			->where('country_id',$id)
			->order_by("name","ASC")
			->get('states');
	$outputSt ='<option value="">Select Your State</option>';

	foreach($stateName->result() as $stRow){ 
		$outputSt .= '<option value="'.$stRow->id.'">'.$stRow->name.'</option>';
	} 
	echo $outputSt;
}

}


?>
