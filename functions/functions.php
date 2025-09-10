<?php
function cleanvars($str){ 
	return $str;	
	// return is_array($str) ? array_map('cleanvars', $str) : str_replace("\\", "\\\\", htmlspecialchars((get_magic_quotes_gpc() ? stripslashes($str) : $str), ENT_QUOTES)); 
}

function urlCheck($url = "") {
	if (!empty($n))
	{

		if (filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED))
			return true;
		else
			return false;
	}
	else
	{

		return false;

	}
}

function getWordsFromStr($str = "", $startWord = 0, $endWords = 1) {
    if (!empty($str))
    {
		$words = explode(" ", $str);
		$wordsArr = array_slice($words, $startWord, $endWords);
		return implode(" ", $wordsArr);		
    }
    else
    {
        return false;
    }
}

function getLinesFromStr($para = "", $startLine = 0, $endLines = 1)
{
	if (!empty($para))
	{
		$lines = explode("\n", $para);
		$linesArr = array_slice($lines, $startLine, $endLines);
		return implode("\n", $linesArr);
	}
    else
    {
        return false;
    }
}



function currentDate($flag = "") {
    date_default_timezone_set("Asia/Karachi");
    if ($flag == "D" || $flag == "d")
	    return date('Y-m-d');
    else if ($flag == "T" || $flag == "t")
        return date('h:i:s');        
    else
        return date('Y-m-d h:i:s');
}

// DONATION TYPES
function get_DurationTypes($id = '') {
	$durationTypes = array (
								 '1'	=> 'Day'
								,'2'	=> 'Month'
								,'3'	=> 'Year'
							);
	if(!empty($id)){
		return $durationTypes[$id];
	}else{
		return $durationTypes;
	}
}

// DONATION STEPS
function get_DonationSteps($id = '') {
	$DonationSteps = array (
								 'Step 1'	=> 'Open your any banking mobile app.'
								,'Step 2'	=> 'Select "FUND TRANSFER"'
								,'Step 3'	=> 'Select Bank Alfalah LTD'
								,'Step 4'	=> 'Send your donation to Alfalah BANK  ACT #: 5001814188 IBAN No:  PK72ALFH5510005001814188'
								,'Step 5'	=> 'Enter Amount that you want to donate to Apportion Relief Foundation'
								,'Step 6'	=> 'Press "PROCEED" and pay'
								,'Note'		=> 'You can also donate from Mobile wallet (Easypaisa & Jazz Cash)'
							);
	if(!empty($id)){
		return $DonationSteps[$id];
	}else{
		return $DonationSteps;
	}
}
function moduleName($flag = true) {
	$fileName = strstr(basename($_SERVER['REQUEST_URI']), '.php', true);
	if (gettype($flag) == 'string') {		
		$flag = str_replace('_',' ',$flag);
		$flag = str_replace('-',' ',$flag);
		$flag = ucwords(strtolower($flag));
		return $flag;
	}
	if ($flag) {
		return strtolower($fileName);
	} else {
		$fileName = str_replace('_',' ',$fileName);
		$fileName = str_replace('-',' ',$fileName);
		return ucwords(strtolower($fileName));
	}
}
function get_report_type($id = '') {
	$listreport_type = array (
								  '1'	=> 'Reports'
								, '2'	=> 'Downloads'
							);
	if(!empty($id)){
		return $listreport_type[$id];
	}else{
		return $listreport_type;
	}
}
function get_status($id = '') {
	$liststatus= array (
						  '1' => 'Active' 
						, '2' => 'Inactive'
					   );
	if(!empty($id)){
		$liststatuslabel= array (
									  '1' => '<span class="badge bg-primary">Active</span>' 
									, '2' => '<span class="badge bg-danger">Inactive</span>'
								); 
		return $liststatuslabel[$id];
	}
	return $liststatus;
}
?>