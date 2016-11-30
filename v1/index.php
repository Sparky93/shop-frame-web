<?php

include 'config.inc.php';
require 'Constants.class.php';
require 'Login.class.php';

function make_login_routine($db) {

	if (isset($_POST[Constants::GMAIL_KEY]) && 
		!empty($_POST[Constants::GMAIL_KEY])) {

		$Login = new Login();

		$Login->make_login($db, $_POST[Constants::GMAIL_KEY]);		

	} else {

		$response[Constants::SUCCESS_KEY] = 0;

		$response[Constants::MESSAGE_KEY] = "Login routine failed (Missing parameters)";

		die(json_encode($response));

	}

}

function make_buy_routine($db) {

	if (isset($_POST[Constants::TOOL_ID_KEY]) &&
		!empty($_POST[Constants::TOOL_ID_KEY]) &&
		isset($_POST[Constants::GMAIL_KEY]) && 
		!empty($_POST[Constants::GMAIL_KEY])) {

		$Buy = new Buy();

	    $Buy->make_buy($db, $_POST[Constants::GMAIL_KEY],
	    	$_POST[Constants::TOOL_ID_KEY]);

	} else {

		$response[Constants::SUCCESS_KEY] = 0;

		$response[Constants::MESSAGE_KEY] = "Buy routine failed (Missing parameters)";

		die(json_encode($response));

	}

}

function make_points_routine($db) {

	if (isset($_POST[Constants::TOOL_ID_KEY]) &&
		!empty($_POST[Constants::TOOL_ID_KEY]) &&
		isset($_POST[Constants::GMAIL_KEY]) && 
		!empty($_POST[Constants::GMAIL_KEY])) {


	} else {

		$response[Constants::SUCCESS_KEY] = 0;

		$response[Constants::MESSAGE_KEY] = "Points routine failed (Missing parameters)";

		die(json_encode($response));

	}

}

if (empty($_POST['SCOPE']) &&
	!isset($_POST['SCOPE'])) {

	$response['success'] = 0;

	$response['message'] = "No SCOPE specified!";

	die(json_encode($response));

}

switch ($_SERVER['REQUEST_METHOD']) {

	case 'POST':

	    if ($_POST['SCOPE'] == Constants::SCOPE_LOGIN) {

	    	make_login_routine($db);	

	    } else if ($_POST['SCOPE'] == Constants::SCOPE_BUY) {

	    	make_buy_routine($db);

	    } else if ($_POST['SCOPE'] == Constants::SCOPE_POINTS){

	    	make_points_routine($db);

	    }

	    break;

	default:

		# code...

		break;

}

?>