<?php

include 'config.inc.php';
require_once 'Constants.class.php';
require_once 'UsersTableConstants.class.php';
require_once 'ToolsTableConstants.class.php';
require_once 'Login.class.php';
require_once 'Buy.class.php';
require_once 'Points.class.php';
require_once 'Info.class.php';

function make_login_routine($db) {

	if (isset($_POST[UsersTableConstants::JSON_GMAIL_KEY]) && 
		!empty($_POST[UsersTableConstants::JSON_GMAIL_KEY])) {

		$Login = new Login();

		$Login->make_login($db, $_POST[UsersTableConstants::JSON_GMAIL_KEY]);		

	} else {

		$response[Constants::SUCCESS_KEY] = 0;

		$response[Constants::MESSAGE_KEY] = "Login routine failed (Missing parameters)";

		die(json_encode($response));

	}

}

function make_buy_routine($db) {

	if (isset($_POST[ToolsTableConstants::TABLE_TOOL_ID_KEY]) &&
		isset($_POST[UsersTableConstants::TABLE_GMAIL_KEY])) {

		$Buy = new Buy();

	    $Buy->make_buy($db, $_POST[UsersTableConstants::TABLE_GMAIL_KEY],
	    	$_POST[ToolsTableConstants::TABLE_TOOL_ID_KEY]);

	} else {

		$response[Constants::SUCCESS_KEY] = 0;

		$response[Constants::MESSAGE_KEY] = "Buy routine failed (Missing parameters)";

		die(json_encode($response));

	}

}

function make_points_routine($db) {

	if (isset($_POST[ToolsTableConstants::TABLE_TOOL_ID_KEY]) &&
		!empty($_POST[ToolsTableConstants::TABLE_TOOL_ID_KEY]) &&
		isset($_POST[UsersTableConstants::TABLE_GMAIL_KEY]) &&
		!empty($_POST[UsersTableConstants::TABLE_GMAIL_KEY])) {

		$Points = new Points();

	    $Points->make_points($db, $_POST[UsersTableConstants::TABLE_GMAIL_KEY],
	     $_POST[ToolsTableConstants::TABLE_TOOL_ID_KEY]);

	} else {

		$response[Constants::SUCCESS_KEY] = 0;

		$response[Constants::MESSAGE_KEY] = "Points routine failed (Missing parameters)";

		die(json_encode($response));

	}

}

function make_info_routine($db) {

	$Info = new Info();

	$Info->make_info($db);

}

if (empty($_POST[Constants::SCOPE_KEY]) ||
	!isset($_POST[Constants::SCOPE_KEY])) {

	$response['success'] = 0;

	$response['message'] = "No scope specified!";

	die(json_encode($response));

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	switch ($_POST[Constants::SCOPE_KEY]) {

		case Constants::SCOPE_LOGIN:

	    	make_login_routine($db);	

	   	break;

	   	case Constants::SCOPE_BUY:	

	    	make_buy_routine($db);

	    break;

	    case Constants::SCOPE_POINTS:

	    	make_points_routine($db);

	    break;

	    case Constants::SCOPE_INFO:

	        make_info_routine($db);

	    break;

	    default:

	        $response['success'] = 0;

	        $response['message'] = "scope is unknown.";

	        die(json_encode($response));

		break;

    }

}

?>