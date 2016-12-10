<?php

require_once 'Constants.class.php';
require_once 'ToolsTableConstants.class.php';
require_once 'UsersTableConstants.class.php';
require_once 'QueryHelper.class.php';

class Points {

	public function __construct() {

		# constructor

	}

	public function make_points($db, $gmail, $tool_id) {

		$response[Constants::SUCCESS_KEY] = 0;

        $response[Constants::MESSAGE_KEY] = "You have failed to use these points !";

		# First, here we ensure that we update the user's units for this tool
		# which means we will have to subtract from the current units the units
		# that he used

		# [1] We fetch his current points

		$query = QueryHelper::make_select_query("*", Constants::USERS_TABLE, 
			UsersTableConstants::TABLE_GMAIL_KEY, UsersTableConstants::GMAIL_QUERY_KEY);


		$query_params = array(
			UsersTableConstants::GMAIL_QUERY_KEY => $gmail
			);

		$stmt = QueryHelper::make_db_conn($db, $query, $query_params, "Database Error1. ");     

        $row = $stmt->fetch();   

        if ($row) {  

            $points = $row[$tool_id . UsersTableConstants::TABLE_UNITS_KEY];

            if ($points == '0' || $points == 0) {

            	$response[Constants::MESSAGE_KEY] = "You don't have enough points !";

            	die(json_encode($response));

            }

        } else {

        	$response[Constants::MESSAGE_KEY] = "Something failed within the DB ! Please try again later!";

            die(json_encode($response));

        }

        switch ($tool_id) {

        	case '1':

        	$delta = $points;

        	$points = '0';        	
        		
        		break;
        	
        	default:

        	die(json_encode($response));

        		break;

        }

        # [2] We update his current points

        $query = QueryHelper::make_update_query(Constants::USERS_TABLE, 
        	$tool_id . UsersTableConstants::TABLE_UNITS_KEY . " = " . "'$points'",
        	UsersTableConstants::TABLE_GMAIL_KEY . " = " . "'$gmail'");

        $query_params = array();

		 QueryHelper::make_db_conn($db, $query, $query_params, "Buy failed inside the class.");

		$response[Constants::SUCCESS_KEY] = 1;

		$response[Constants::MESSAGE_KEY] = "You have successfully used these points!";

		$response[UsersTableConstants::JSON_UNITS_KEY] = $points;

		# [3] So till' here, we have successfully updated the users table, time for
		# updating info_tools table

        $query = QueryHelper::make_update_query(Constants::INFO_TOOLS_TABLE, 
        	ToolsTableConstants::TABLE_TOOL_INDEX_KEY  . " = " . ToolsTableConstants::TABLE_TOOL_INDEX_KEY . " + $delta",
        	ToolsTableConstants::TABLE_ID_KEY . " = " . "'$tool_id'");

        $query_params = array();

		 QueryHelper::make_db_conn($db, $query, $query_params, "Buy failed inside the class.");

		die(json_encode($response));

	}

}

?>