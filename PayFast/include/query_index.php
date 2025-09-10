<?php 
if(isset($_POST['submit_donation'])) { 
	
	$amtpayable = $_POST['amount'];
	
	$duedays = 1;
		
	// generate random voucher no
	// challan no
	do {
		$voucherno  = mt_rand(1000000000,9999999999);
		$sqlChallan	= "SELECT voucherno FROM ".PAYFAST_DONATIONS." WHERE voucherno = '$voucherno'";
		$sqlCheck	= $dblms->querylms($sqlChallan);
	} while (mysqli_num_rows($sqlCheck) > 0);

	//Customer Creation Request Start
	$curl = curl_init();

	$dataCustomer['email']      	= cleanvars($_POST['email']);
	$dataCustomer['mobile']     	= cleanvars($_POST['phone']);
	$dataCustomer['firstname']  	= cleanvars($_POST['full_name']);
	$dataCustomer['lastname']   	= ' ';
	$dataCustomer['reference_id']  	= cleanvars($_POST['id_pc_subcat']);
	$jsonRequestCustomer 			= json_encode($dataCustomer,JSON_UNESCAPED_UNICODE);

	curl_setopt_array($curl, array(
									CURLOPT_URL 			=> 'https://paylink.apps.net.pk/api/merchant/customer/create',
									CURLOPT_RETURNTRANSFER 	=> true,
									CURLOPT_ENCODING 		=> '',
									CURLOPT_MAXREDIRS 		=> 10,
									CURLOPT_TIMEOUT 		=> 0,
									CURLOPT_FOLLOWLOCATION 	=> true,
									CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
									CURLOPT_CUSTOMREQUEST 	=> 'POST',
									CURLOPT_POSTFIELDS 		=>$jsonRequestCustomer,
									CURLOPT_HTTPHEADER 		=> array(
																		'Authorization: Basic '.PAYFAST_BASICAUTH.'',
																		'Content-Type: application/json'
																	),
								)
						);

	$responseCustomer = curl_exec($curl);

	curl_close($curl);
	//Customer Creation Request End
	//Voucher Creation Request Start
	$callBackURL = PAYFAST_CALLBACK.'?cusid='.$voucherno;
	//echo $callBackURL;
	

	$data['customer_email']  = cleanvars($_POST['email']);
	$data['recipient_email'] = cleanvars($_POST['email']);
	$data['total_amount']    = $amtpayable;
	$data['invoice_ref_id']  = (string)$voucherno;
	$data['billing_month']   = date('Y-m');
	$data['bill_category']   = 'BILL';
	$data['due_in_days']     = $duedays;
	$data['expires_in_days'] = $duedays;
	$data['callback_url']    = $callBackURL;

	$jsonRequest = json_encode($data,JSON_UNESCAPED_UNICODE);

	//	echo ($jsonRequest);

	$curl12 = curl_init();

	curl_setopt_array($curl12, array(
										CURLOPT_URL 			=> 'https://paylink.apps.net.pk/api/merchant/invoice/create',
										CURLOPT_RETURNTRANSFER 	=> true,
										CURLOPT_ENCODING 		=> '',
										CURLOPT_MAXREDIRS 		=> 10,
										CURLOPT_TIMEOUT 		=> 0,
										CURLOPT_FOLLOWLOCATION 	=> true,
										CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
										CURLOPT_CUSTOMREQUEST 	=> 'POST',
										CURLOPT_POSTFIELDS 		=> $jsonRequest,
										CURLOPT_HTTPHEADER 		=> array(
																			'Authorization: Basic '.PAYFAST_BASICAUTH.'',
																			'Content-Type: application/json'
																		),
									)
						);

	$response 	= curl_exec($curl12);
	$err 		= curl_error($curl12);

	curl_close($curl12);

	//Voucher Creation Request End
	if($err) {
		//Set Error Message
		$_SESSION['msg']['title'] 	= 'Error';
		$_SESSION['msg']['text'] 	= ' You\'re not registered due to some error. Please try again.';
		$_SESSION['msg']['type'] 	= 'error';
		header("Location: ".SITE_URL."donation", true, 301);
		exit();

	} else {

		//Decode Request Response
		$requestResponse = json_decode($response, true);

		$invoiceKey         = '';
		$invoiceNumber      = '';
		$invoiceID          = '';
		$invoiceReferenceID = '';
		$paymentLink        = '';


		//To Values of Response
		foreach($requestResponse as $key => $object){

			if($key == 'invoice_key')	{ $invoiceKey 		= $object; }
			if($key == 'invoice_number'){ $invoiceNumber 	= $object; }
			if($key == 'invoice_id')	{ $invoiceID 		= $object; }
			if($key == 'invoice_ref_id'){ $invoiceReferenceID = $object; }
			if($key == 'payment_link')	{ $paymentLink 		= $object; }         

		}

		if($paymentLink){

			//Set Success Message & Redirect 

			// ADD RECORD IN DONATION LIST
			$dataDonation = array(
										'status'			=> '3'
									, 'is_byfast'		=> '1'
									, 'id_type'			=> '3'
									, 'id_pc_subcat'	=>  cleanvars($_POST['id_pc_subcat'])
									, 'dated'			=> date('Y-m-d')
									, 'fullname'		=> cleanvars($_POST['full_name'])
									, 'cnic'			=> cleanvars($_POST['cnic'])
									, 'phone'			=> cleanvars($_POST['phone'])
									, 'email'			=> cleanvars($_POST['email'])
									, 'amount'			=> cleanvars($_POST['amount'])
									, 'phone'			=> cleanvars($_POST['phone'])
									, 'id_added'		=> '1'
									, 'date_added'		=> date("Y-m-d H:i:s")											
								);

			$qryDonation  = $dblms->Insert(DONATIONS, $dataDonation);
			 $iddonation  = $dblms->lastestid();

			if($qryDonation){
				$dataInv = array(
									  'donor'			=>  cleanvars($_POST['full_name'])	
									, 'id_donation'		=> $iddonation	
									, 'voucherno'		=> $voucherno	
									, 'invoice_key'		=> $invoiceKey	
									, 'invoice_number'	=> $invoiceNumber
									, 'invoice_id'		=> cleanvars($invoiceID)
									, 'pay_url'			=> cleanvars($paymentLink)
									, 'expiry_date'		=> date('Y-m-d', strtotime(' + '.$duedays.' days'))
									, 'id_added'		=> '1'
									, 'date_added'		=> date("Y-m-d H:i:s")											
								);

				$qryInsert = $dblms->Insert(PAYFAST_DONATIONS, $dataInv);
				
			}

			header("Location:".$paymentLink."", true, 301);
			exit();

		} else{
			//Set Error Message
			$_SESSION['msg']['title'] 	= 'Error';
			$_SESSION['msg']['text'] 	= ' You\'re not registered due to some error. Please try again.';
			$_SESSION['msg']['type'] 	= 'error';
			header("Location: ".SITE_URL."donation", true, 301);
			exit();
		}
	}
	
		
}