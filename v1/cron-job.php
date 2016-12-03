<?php

include 'config.inc.php';
require_once 'Constants.class.php';
require_once 'QueryHelper.class.php';

$tool1_units_key = '1' . Constants::TOOL_UNITS_KEY;

$tool1_unlocked_key = '1' . Constants::TOOL_UNLOCKED_KEY;

$tool1_updated_date_key = '1' . Constants::TOOL_UPDATED_DATE_KEY;

$datetime = date_create()->format('Y-m-d H:i:s');

$query = QueryHelper::make_update_query(Constants::USERS_TABLE, 
	$tool1_units_key . " = " . $tool1_units_key . " + " . Constants::TOOL_1_DU . 
	" , " . $tool1_updated_date_key . " = " . "'$datetime'",
	$tool1_unlocked_key . " = " . '1' . " AND " . 
	$tool1_updated_date_key . " < DATE_SUB(NOW(), INTERVAL '24' HOUR) ");

$query_params = array();

QueryHelper::make_db_conn($db, $query, $query_params, "Cron-Job failed.");

?>