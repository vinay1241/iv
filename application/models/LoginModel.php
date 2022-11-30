<?php
class LoginModel extends CI_Model {
	public $table='signup';
	function checkLogin($data){
		$abc = $this->db->select('*')->from('signup')->where('email',$data['email'])->or_where('phone',$data['phone'])->get();
		$abc = $abc->row_array();	
		if($abc){
			return false;
		}else{
		$this->db->insert($this->table, $data);
		return $data;
	}
	}

	function verifyotp($data){
		
		$this->db->set('verified', 1);
        $this->db->where('email', $data['email']);
        $this->db->where( 'otp',$data['verify_otp']);
       
	$this->db->update('signup');
	return ($this->db->affected_rows() != 1) ? false : true;
	}

	function forLogin($data){
	
		$abc = $this->db->select('*')->from('signup')->where('email',$data['email'])->where('password',$data['password'])->where('verified',1)->get();
		$abc = $abc->row_array();	
		
		if($abc){	
		return $abc;
	}else{
		$abc = $this->db->select('*')->from('signup')->where('phone',$data['email'])->where('password',$data['password'])->where('verified',1)->get();
		$abc = $abc->row_array();	
		return $abc;
	}
	}

	function genrateotp($data){
	
		$this->db->set('otp', $data['otp']);
		$this->db->where('verified',1);
        $this->db->where('email', $data['email']);
        $this->db->update('signup');
		if($this->db->affected_rows() != 1){
			$this->db->set('otp', $data['otp']);
			$this->db->where('verified',1);
			$this->db->where('phone', $data['email']);
			$this->db->update('signup');
				if($this->db->affected_rows() != 1){
					return false;
				}else{
					$abc = $this->db->select('*')->from('signup')->where('phone',$data['email'])->get();
					$abc = $abc->row_array();	
					return $abc;
						}
		}else{
			$abc = $this->db->select('*')->from('signup')->where('email',$data['email'])->get();
			$abc = $abc->row_array();	
			return $abc;
					}
	}

	function verifyotppwd($data){
		$abc = $this->db->select('*')->from('signup')->where('email',$data['email'])->where('otp',$data['verify_otp'])->where('verified',1)->get();
		$abc = $abc->row_array();	
		return $abc;

		}
	
		function 		genratepassword($data){
		
			$this->db->set('password', $data['password']);
			$this->db->where('email', $data['email']);   
		$this->db->update('signup');
		return ($this->db->affected_rows() != 1) ? false : true;
		}
	

}
