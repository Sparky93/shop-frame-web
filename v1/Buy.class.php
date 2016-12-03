<?php

require_once 'Constants.class.php';
require_once 'QueryHelper.class.php';

class Buy {

	public function __construct() {

		# constructor

	}

	public function make_buy($db, $gmail, $item_id) {

		$datetime = date_create()->format('Y-m-d H:i:s');

		$query = QueryHelper::make_update_query(Constants::USERS_TABLE,
			$item_id . Constants::TOOL_UNLOCKED_KEY . " = '1'" . " , " . $item_id . Constants::TOOL_UNITS_KEY . " = " . Constants::TOOL_1_DU . " , " .
			$item_id . Constants::TOOL_UPDATED_DATE_KEY . " = " . "'$datetime'", 
			Constants::GMAIL_KEY . " = " . "'$gmail'");

		$query_params = array();

		 QueryHelper::make_db_conn($db, $query, $query_params, "Buy failed inside the class.");

		$response[Constants::SUCCESS_KEY] = 1;

		$response[Constants::MESSAGE_KEY] = "You have successfully unlocked this item!";

		die(json_encode($response));

	}

}

?>