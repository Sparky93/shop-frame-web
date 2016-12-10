<?php

include 'config.inc.php';
require_once 'Constants.class.php';
require_once 'QueryHelper.class.php';
require_once 'UsersTableConstants.class.php';
require_once 'ToolsTableConstants.class.php';

define (TIMESTAMP, 'TIMESTAMP');

// TODO implement for more ids

$id = '1';

$tool1_units_key = $id . UsersTableConstants::TABLE_UNITS_KEY;

$tool1_unlocked_key = $id . UsersTableConstants::TABLE_UNLOCKED_KEY;

$tool1_updated_date_key = $id . UsersTableConstants::TABLE_UPDATED_DATE_KEY;

$datetime = date_create()->format('Y-m-d H:i:s');

$query = QueryHelper::make_update_query(Constants::USERS_TABLE, 
	$tool1_units_key . " = " . $tool1_units_key . " + " . ToolsTableConstants::TOOL_1_DU . 
	" , " . $tool1_updated_date_key . " = " . "'$datetime'",
	$tool1_unlocked_key . " = " . $id . " AND " . 
	$tool1_updated_date_key . " < DATE_SUB(NOW(), INTERVAL '24' HOUR) ");

$query_params = array();

QueryHelper::make_db_conn($db, $query, $query_params, "Cron-Job failed.");

$response[Constants::SUCCESS_KEY] = 1;

$response[Constants::MESSAGE_KEY] = "Cron-Job successfully made.";

$response[TIMESTAMP] = $datetime;

echo json_encode($response);

?>