<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	
	 
	public function index()
	{
		try
		{ 	
			//Register free demo account from https://onnorokomsms.com
			
			$userName = "your user name";
			$passWord = "your user password";
			
			$this->load->library("Nusoap_library");
			$soapClient =  new nusoap_client("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl", 'wsdl');

			//Soap Unicode Support
			$soapClient->soap_defencoding = 'UTF-8';
			$soapClient->decode_utf8 = false;

			//OneToOne
			
			$paramArray = array(
				'userName'=>$userName,
				'userPassword'=>$passWord, 
				'mobileNumber'=> "01841336333", 
				'smsText'=>"Single SMS Send from CodeIgniter Test", 
				'type'=>"TEXT",
				'maskName'=> "DemoMask", 
				'campaignName'=>'',
			);
			echo "before calling method";
			$value = $soapClient->call("OneToOne", $paramArray);			
			echo 'output is '; print_r($value);
			
			
			// One to Many 
			/*
			$paramArray = array(
				'userName'=>$userName,
				'userPassword'=>$passWord, 
				'messageText'=>"Bulk SMS Send from CodeIgniter Test", 
				'numberList'=> "01811444729,01833168163", 				
				'smsType'=>"TEXT",
				'maskName'=> "DemoMask", 
				'campaignName'=>'',
			);
			echo "before calling method";
			$value = $soapClient->call("OneToMany", $paramArray);			
			echo 'output is '; print_r($value);
			*/
		
		}
		catch (Exception $e) {
			echo $e;
		}

		$this->load->view('welcome_message');
	}
}
