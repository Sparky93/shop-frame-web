<?php

require_once 'Constants.class.php';
require_once 'QueryHelper.class.php';
require_once 'UsersTableConstants.class.php';
require_once 'ToolsTableConstants.class.php';

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
                    ToolsTableConstants::JSON_ID_KEY => $row[ToolsTableConstants::TABLE_TOOL_ID_KEY],
                    ToolsTableConstants::JSON_NAME_KEY => $row[ToolsTableConstants::TABLE_TOOL_NAME_KEY],
                    ToolsTableConstants::JSON_AVAILABLE_KEY => $row[ToolsTableConstants::TABLE_TOOL_AVAILABLE_KEY],
                    ToolsTableConstants::JSON_UPDATED_ON_KEY => $row[ToolsTableConstants::TABLE_TOOL_UPDATED_ON_KEY],
                    ToolsTableConstants::JSON_INDEX_KEY => $row[ToolsTableConstants::TABLE_TOOL_INDEX_KEY],
                    ToolsTableConstants::JSON_DAILY_UNITS_KEY => $row[ToolsTableConstants::TABLE_TOOL_DAILY_UNITS_KEY],
                    ToolsTableConstants::JSON_IMAGE_KEY => $row[ToolsTableConstants::TABLE_TOOL_IMAGE_KEY],
                    ToolsTableConstants::JSON_PRICE_KEY => $row[ToolsTableConstants::TABLE_TOOL_PRICE_KEY]
                    ),
                array(
                	ToolsTableConstants::JSON_ID_KEY => '2',
                    ToolsTableConstants::JSON_NAME_KEY => 'Tool unavailable yet.',
                    ToolsTableConstants::JSON_AVAILABLE_KEY => '0',
                    ToolsTableConstants::JSON_UPDATED_ON_KEY => '0000-00-00 00:00:00',
                    ToolsTableConstants::JSON_INDEX_KEY => '0',
                    ToolsTableConstants::JSON_DAILY_UNITS_KEY => '0',
                    ToolsTableConstants::JSON_IMAGE_KEY => '',
                    ToolsTableConstants::JSON_PRICE_KEY => '0'
                	),
                array(
                	ToolsTableConstants::JSON_ID_KEY => '3',
                    ToolsTableConstants::JSON_NAME_KEY => 'Tool unavailable yet.',
                    ToolsTableConstants::JSON_AVAILABLE_KEY => '0',
                    ToolsTableConstants::JSON_UPDATED_ON_KEY => '0000-00-00 00:00:00',
                    ToolsTableConstants::JSON_INDEX_KEY => '0',
                    ToolsTableConstants::JSON_DAILY_UNITS_KEY => '0',
                    ToolsTableConstants::JSON_IMAGE_KEY => '',
                    ToolsTableConstants::JSON_PRICE_KEY => '0'
                	),
                array(
                	ToolsTableConstants::JSON_ID_KEY => '4',
                    ToolsTableConstants::JSON_NAME_KEY => 'Tool unavailable yet.',
                    ToolsTableConstants::JSON_AVAILABLE_KEY => '0',
                    ToolsTableConstants::JSON_UPDATED_ON_KEY => '0000-00-00 00:00:00',
                    ToolsTableConstants::JSON_INDEX_KEY => '0',
                    ToolsTableConstants::JSON_DAILY_UNITS_KEY => '0',
                    ToolsTableConstants::JSON_IMAGE_KEY => '',
                    ToolsTableConstants::JSON_PRICE_KEY => '0'
                	),
                array(
                	ToolsTableConstants::JSON_ID_KEY => '5',
                    ToolsTableConstants::JSON_NAME_KEY => 'Tool unavailable yet.',
                    ToolsTableConstants::JSON_AVAILABLE_KEY => '0',
                    ToolsTableConstants::JSON_UPDATED_ON_KEY => '0000-00-00 00:00:00',
                    ToolsTableConstants::JSON_INDEX_KEY => '0',
                    ToolsTableConstants::JSON_DAILY_UNITS_KEY => '0',
                    ToolsTableConstants::JSON_IMAGE_KEY => '',
                    ToolsTableConstants::JSON_PRICE_KEY => '0'
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