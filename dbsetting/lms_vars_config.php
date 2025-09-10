<?php
//----------------------------------------------------
	error_reporting(0);
	ob_start();
	ob_clean();
	session_start();
//----------------------------------------------------

	// define('LMS_HOSTNAME'			, 'localhost');
	// define('LMS_NAME'				, 'jo370xfr_apportion23');
	// define('LMS_USERNAME'			, 'jo370xfr_arforgpk');
	// define('LMS_USERPASS'			, 'z4BDMLR}GKX#');

	define('LMS_HOSTNAME'			, 'localhost');
	define('LMS_NAME'				, 'jo370xfr_apportion23');
	define('LMS_USERNAME'			, 'root');
	define('LMS_USERPASS'			, '');

///-----------------DB Tables ------------------------
	define('ADMINS'					, 'app_admins');
	define('ADMIN_ROLES'			, 'app_admins_roles');
	define('LOGS'					, 'app_logfile');
	define('LOGIN_HISTORY'			, 'app_login_history');
	define('CURRENCIES'				, 'app_currencies');
	define('REGIONS'				, 'app_regions');
	define('COUNTRIES'				, 'app_countries');
	define('STATES'				    , 'app_states');
	define('SUB_STATES'             , 'app_substates');
	define('CITIES'                 , 'app_cities');
	define('CATEGORIES'             , 'app_categories');
	define('SUB_CATEGORIES'         , 'app_sub_categories');
	define('FAQS'         			, 'app_faqs');
	define('DESIGNATIONS'         	, 'app_designations');
	define('TEAM_MEMBERS'         	, 'app_team_members');
	define('DONORS_VOLUNTREES'      , 'app_donors_volunteers');
	define('ORGANIZATIONS'          , 'app_organizations');
	define('PACKAGES_CAUSES'        , 'app_packages_causes');
	define('DISTRIBUTION_PLACES'    , 'app_distribution_places');
	define('GALLERY'    			, 'app_gallery');
	define('SLIDER'    				, 'app_slider');
	define('ABOUT'					, 'app_about');
	define('TESTIMONIALS'			, 'app_testimonials');
	define('EVENTS'					, 'app_events');
	define('EVENT_PHOTOS'			, 'app_event_photos');
	define('GALLERY_PHOTOS'			, 'app_gallery_photos');
	define('NEWSLETTER'			    , 'app_newsletter');
	define('CONTACT'			    , 'app_contact');
	define('WEB_QUERY'			    , 'app_querys');
	define('DONATIONS'    			, 'app_donations');
	define('REPORTS_DOWNLOADS'		, 'app_reports_downloads');
	define('PAYFAST_DONATIONS'		, 'app_payfast_donations');
	define('PAYFAST_TRANSACTIONS'	, 'app_payfast_transactions');


//------------------Variable--------------------------------
	$control 						= (isset($_REQUEST['control']) && $_REQUEST['control'] != '') ? $_REQUEST['control'] : '';
	$zone 	 						= (isset($_REQUEST['zone']) && $_REQUEST['zone'] != '') ? $_REQUEST['zone'] : '';
	$ip	  							= (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] != '') ? $_SERVER['REMOTE_ADDR'] : '';
	$do	  							= (isset($_REQUEST['do']) && $_REQUEST['do'] != '') ? $_REQUEST['do'] : '';
	$view 							= (isset($_REQUEST['view']) && $_REQUEST['view'] != '') ? $_REQUEST['view'] : '';
	$current_page					= (isset($_REQUEST['page']) && $_REQUEST['page'] != '') ? $_REQUEST['page'] : 1;
	$Limit							= (isset($_REQUEST['Limit']) && $_REQUEST['Limit'] != '') ? $_REQUEST['Limit'] : '';

//--------------------------------------------------
	define('LMS_IP'					, $ip);
	define('LMS_DO'					, $do);
	define('LMS_EPOCH'				, date("U"));
	define('LMS_VIEW'				, $view);
	define('TITLE_HEADER'			, 'Apportion Relief Foundation');
	define("SITE_NAME"				, "Apportion Relief Foundation");
	define("SITE_PHONE"				, "04235110080");
	define("SITE_WHATSAPP"			, "03260877829");
	define("SITE_EMAIL"				, "Apportionrfoundation@gmail.com");
	define("SITE_ADDRESS"			, "Office # 483 1st Floor, Block 2 Sector B-II, Near Chandni Chowk, Township Lahore");
	define("SITE_BIO"				, "Empowering society, reducing dependency & improving lives");
	define("SITE_URL"	    	    , "https://arf.org.pk/");
	define("ADMIN_URL"	    	    , "https://portal.arf.org.pk/");
	define("COPY_RIGHTS"			, "Green Professional Technologies.");
	define("COPY_RIGHTS_ORG"		, "&copy; ".date("Y")." - All Rights Reserved.");
	define("COPY_RIGHTS_URL"		, "https://www.gptech.pk/");


	define("FB"						, "https://www.facebook.com/arf.org.pk");
	define("TWITTER"				, "https://www.twitter.com/");
	define("LINKEDIN"				, "https://www.linkedin.com/");
	define("TIKTOK"					, "https://www.tiktok.com/@arf.org.pk");
	define("PINTEREST"				, "https://www.pinterest.com/");
	define("YOUTUBE"				, "https://www.youtube.com/@ApportionReliefFoundation");
	define("INSTA"					, "https://www.instagram.com/arf.org.pk");

	// Pay Fast Setting
	define('PAYFAST_MERCHANTID'	, 17298);
	define('PAYFAST_SECUREDKEY'	, "PWsOoisC9AD0i5-TBxqAG");
	define('PAYFAST_TOKENURL'	, "https://ipg1.apps.net.pk/Ecommerce/api/Transaction/GetAccessToken");
	define('PAYFAST_TRNSURL'	, "https://ipg1.apps.net.pk/Ecommerce/api/Transaction/PostTransaction");
	define('PAYFAST_CALLBACK'	, "https://arf.org.pk/PayFast/success.php");
	define('PAYFAST_BASICAUTH'	, "NjhiOThhM2EtZWY4ZC0xMWVmLWIyODEtMDA1MDU2YTQyMzFjOjU1ZjhlNDBiOTY2YmJlMGQxOWZlODU1ODg5NTJjZjYzNmM3Y2E1ZTE5ZmIzOGIzNTY2YTZmNmU3NDA2NDZlOGI");
?>