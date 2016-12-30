<?php

require_once 'Constants.class.php';
require_once 'ToolsTableConstants.class.php';
require_once 'UsersTableConstants.class.php';
require_once 'QueryHelper.class.php';

class Buy {

	public function __construct() {

		# constructor

	}

	public function make_buy($db, $gmail, $item_id) {

		$datetime = date_create()->format('Y-m-d H:i:s');

		$du_query = QueryHelper::make_select_query(ToolsTableConstants::TABLE_TOOL_DAILY_UNITS_KEY,
            Constants::INFO_TOOLS_TABLE, ToolsTableConstants::TABLE_TOOL_ID_KEY, $item_id);

		$query = QueryHelper::make_update_query(Constants::USERS_TABLE,
			$item_id . UsersTableConstants::TABLE_UNLOCKED_KEY . " = '1'" . " , " . 
			$item_id . UsersTableConstants::TABLE_UNITS_KEY . " = " . $du_query . " , " .
			$item_id . UsersTableConstants::TABLE_UPDATED_DATE_KEY . " = " . "'$datetime'", 
			UsersTableConstants::TABLE_GMAIL_KEY . " = " . "'$gmail'");

		$query_params = array();

		 QueryHelper::make_db_conn($db, $query, $query_params, "Buy failed inside the class.");

		$response[Constants::SUCCESS_KEY] = 1;

		$response[Constants::MESSAGE_KEY] = "You have successfully unlocked this item!";

		die(json_encode($response));

	}

}

?>