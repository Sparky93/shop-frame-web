<?php

require_once 'Constants.class.php';
require_once 'QueryHelper.class.php';

class Buy {

	public function __construct() {

		# constructor

	}

	public function make_buy($db, $gmail, $item_id) {

		$datetime = date_create()->format('Y-m-d H:i:s');

		switch ($item_id) {
			case '1':

			$du = ToolsTableConstants::TOOL_1_DU;

				break;
			
			default:

            $du = '0';

				break;
		}

		$query = QueryHelper::make_update_query(Constants::USERS_TABLE,
			$item_id . UsersTableConstants::TABLE_UNLOCKED_KEY . " = '1'" . " , " . 
			$item_id . UsersTableConstants::TABLE_UNITS_KEY . " = " . $du . " , " .
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