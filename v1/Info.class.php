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
                    Constants::TOOL_JSON_NAME_KEY => $row[Constants::TOOL_JSON_NAME_KEY],
                    Constants::TOOL_JSON_AVAILABLE_KEY => $row[Constants::TOOL_JSON_AVAILABLE_KEY],
                    Constants::TOOL_UPDATED_ON_TOOLS_KEY => $row[Constants::TOOL_UPDATED_ON_TOOLS_KEY],
                    Constants::TOOL_INDEX_KEY=> $row[Constants::TOOL_INDEX_KEY]
                    ),
                array(
                	Constants::TOOL_ID_KEY => '2',
                    Constants::TOOL_JSON_NAME_KEY => 'Tool unavailable yet.',
                    Constants::TOOL_JSON_AVAILABLE_KEY => '0',
                    Constants::TOOL_UPDATED_ON_TOOLS_KEY => NULL,
                    Constants::TOOL_INDEX_KEY=> '0'
                	),
                array(
                	Constants::TOOL_ID_KEY => '3',
                    Constants::TOOL_JSON_NAME_KEY => 'Tool unavailable yet.',
                    Constants::TOOL_JSON_AVAILABLE_KEY => '0',
                    Constants::TOOL_UPDATED_ON_TOOLS_KEY => NULL,
                    Constants::TOOL_INDEX_KEY=> '0'
                	),
                array(
                	Constants::TOOL_ID_KEY => '4',
                    Constants::TOOL_JSON_NAME_KEY => 'Tool unavailable yet.',
                    Constants::TOOL_JSON_AVAILABLE_KEY => '0',
                    Constants::TOOL_UPDATED_ON_TOOLS_KEY => NULL,
                    Constants::TOOL_INDEX_KEY=> '0'
                	),
                array(
                	Constants::TOOL_ID_KEY => '5',
                    Constants::TOOL_JSON_NAME_KEY => 'Tool unavailable yet.',
                    Constants::TOOL_JSON_AVAILABLE_KEY => '0',
                    Constants::TOOL_UPDATED_ON_TOOLS_KEY => NULL,
                    Constants::TOOL_INDEX_KEY=> '0'
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