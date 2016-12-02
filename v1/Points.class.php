<?php

require_once 'Constants.class.php';
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
			Constants::GMAIL_KEY, Constants::GMAIL_QUERY_KEY);


		$query_params = array(
			Constants::GMAIL_QUERY_KEY => $gmail
			);

		$stmt = QueryHelper::make_db_conn($db, $query, $query_params, "Database Error1. ");     

        $row = $stmt->fetch();   

        if ($row) {  

            $points = $row[$tool_id . Constants::TOOL_UNITS_KEY];

            $delta = $row[$tool_id . Constants::TOOL_UNITS_KEY];

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

        	if ($points >= Constants::TOOL_1_DU) {

        		$points = $points - Constants::TOOL_1_DU;

        	} else {

        		$points = '0';

        	}
        		
        		break;
        	
        	default:

        	die(json_encode($response));

        		break;

        }

        # [2] We update his current points

        $query = QueryHelper::make_update_query(Constants::USERS_TABLE, 
        	$tool_id . Constants::TOOL_UNITS_KEY  . " = " . "'$points'",
        	Constants::GMAIL_KEY . " = " . "'$gmail'");

        $query_params = array();

		 QueryHelper::make_db_conn($db, $query, $query_params, "Buy failed inside the class.");

		$response[Constants::SUCCESS_KEY] = 1;

		$response[Constants::MESSAGE_KEY] = "You have successfully used these points!";

		$response[Constants::TOOL_JSON_UNITS_KEY] = $points;

		# So till' here, we have successfully updated the users table, time for
		# info_tools table

		# [3] Now we have to fetch this tool index value so we can update it

		$query = QueryHelper::make_select_query("*", Constants::INFO_TOOLS_TABLE, 
			Constants::TOOL_ID_KEY, Constants::TOOL_ID_QUERY_KEY);


		$query_params = array(
			Constants::TOOL_ID_QUERY_KEY => $tool_id
			);

		$stmt = QueryHelper::make_db_conn($db, $query, $query_params, "Database Error1. ");     

        $row = $stmt->fetch();   

        if ($row) {  

        	$tool_index = $row[Constants::TOOL_INDEX_KEY];

        }

        # So now we have the current index fetched in our $tool_index variable
        # All we gotta do now is to update this index and push it to the DB table

        $tool_index = $tool_index + $delta;

        $query = QueryHelper::make_update_query(Constants::INFO_TOOLS_TABLE, 
        	Constants::TOOL_INDEX_KEY  . " = " . "'$tool_index'",
        	Constants::TOOL_ID_KEY . " = " . "'$tool_id'");

        $query_params = array();

		 QueryHelper::make_db_conn($db, $query, $query_params, "Buy failed inside the class.");

		die(json_encode($response));

	}

}

?>