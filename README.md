# osms-codeIgniter
OnnoRokom SMS integration with CodeIgnier. Send sms from CodeIgniter

Requirements:
1. SOAP extension on webserver
2. CodeIgniter nusoap_library ( available at sourceforge )

write following code at your Controller Action code block

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


3rd party helper library and example code only available at CI_SMS_MIN_FILES.zip file. 
