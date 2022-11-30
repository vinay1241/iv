<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
		parent::__construct();

		$this->load->library('email');
		$this->load->model('LoginModel');

	}

	public function signup()
	{
        $this->load->view('signup');
	}



    public function saved()
	{

        $data=$_POST;
        $data['otp']=rand ( 1000 , 9999 );
        $data['password']=md5($_POST['password']);
        $userDetails = $this->LoginModel->checkLogin($data);
        if($userDetails){
        $this->session->set_userdata('isUserLoggedIn',$userDetails);
        $this->load->view('verifyotp');   
   
    }else{
        echo "user already registered";
    }
       }

    public function verifyotp()
	{
        $data=$_POST;
        $data['email']=$_SESSION['isUserLoggedIn']['email'];
       
        $userDetails = $this->LoginModel->verifyotp($data);
	   if($userDetails){
        $newdata['message']="user verified";
        $this->load->view('login',$newdata);   
   
       }	else{
        $newdata['message']="wrong otp";
        
        $this->load->view('verifyotp',$newdata);   
       }
    }

//---------------------------------------------------------------------------------------------------------------------------------

    public function signin()
	{
        $this->load->view('login');   
       
    }




	public function login()
	{
        $data=$_POST;  
        $data['password']=md5($_POST['password']);
        $userDetails = $this->LoginModel->forlogin($data);
        if($userDetails){
        $userDetails['password']=null;
        $userDetails['otp']=null;
        
	  $this->session->set_userdata('isUserLoggedIn',$userDetails);
      print_r("Logged in sucessfully");
        }else{
            print_r("wrong password or user not register");
        }
    }

//---------------------------------------------------------------------------------------------------------------------------------


public function forget()
	{
        $this->load->view('forgetpassword');   
       
    }


    public function genrateotp()
	{
        $data=$_POST;
        $data['otp']=rand ( 1000 , 9999 );
        $userDetails = $this->LoginModel->genrateotp($data);
        $this->session->set_userdata('isUserLoggedIn',$userDetails);

        $this->load->view('verifyforpassword');   
       
    }

    public function verifyforpasswordchange()
	{
        $data=$_POST;
        $data['email']=$_SESSION['isUserLoggedIn']['email'];
       
        $userDetails = $this->LoginModel->verifyotppwd($data);
	   if($userDetails){
        $userDetails['password']=null;
        $userDetails['otp']=null;
        
	  $this->session->set_userdata('isUserLoggedIn',$userDetails);
     
        $this->load->view('newpassword');   
       
       }	else{
        print_r("Wrong otp entered by user");
       }
    }


    public function createnewpassword()
	{
        $data=$_POST;
        $data['password']=md5($_POST['password']);
        
        $data['email']=$_SESSION['isUserLoggedIn']['email'];
       
        $userDetails = $this->LoginModel->genratepassword($data);
	   if($userDetails){
        print_r("succesfully created");
       
       }	else{
        print_r("Wrong otp entered by user");
       }
    }



}
