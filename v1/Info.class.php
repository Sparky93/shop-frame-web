<?php

require_once 'Constants.class.php';
require_once 'QueryHelper.class.php';

class Info {

	public function __construct() {

		# constructor

	}

	public function make_info($db) {

		$query = QueryHelper::make_select_non_conditional_query('*', 
			Constants::INFO_TOOLS_TABLE);

		$query_parameters = array();

		$stmt = QueryHelper::make_db_conn($db, $query, $query_params, "Database Error1. ");     
        $row = $stmt->fetch();   

        if ($row) {  	

        	$response[Constants::SUCCESS_KEY] = 1;

            $response[Constants::MESSAGE_KEY] = "Successfully fetched data!";

            $response[Constants::TOOLS_KEY] = array(
                array(
                    Constants::TOOL_ID_KEY => $row[Constants::TOOL_ID_KEY],
                    Constants::TOOL_NAME_TOOLS_KEY => $row[Constants::TOOL_NAME_TOOLS_KEY],
                    Constants::TOOL_UPDATED_ON_TOOLS_KEY => $row[Constants::TOOL_UPDATED_ON_TOOLS_KEY],
                    Constants::TOOL_INDEX_KEY=> $row[Constants::TOOL_INDEX_KEY]
                    )
                );

        } else {

        	$row[Constants::SUCCESS_KEY] = 0;

            $row[Constants::MESSAGE_KEY] = "Failed to fetch data!";

        }

        die(json_encode($response));

	}

}

?>