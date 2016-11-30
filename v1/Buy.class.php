<?php

require_once 'Constants.class.php';
require_once 'QueryHelper.class.php';

class Buy {

	public function __construct() {

		# constructor

	}

	public function make_buy($db, $gmail, $item_id) {

		$query = QueryHelper::make_update_query(Constants::USERS_TABLE, 
			$item_id . Constants::TOOL_UNLOCKED_KEY . " = 1", 
			Constants::GMAIL_KEY . "=" . $gmail);

		$query_params = array();

		make_db_conn($db, $query, $query_params, "Buy failed inside the class.");

		$response[Constants::SUCCESS_KEY] = 1;

		$response[Constants::MESSAGE_KEY] = "You have successfully unlocked this item!";

	}

	public function make_db_conn($db, $q, $qp, $fail_message) {

    	try {

    		$stmt   = $db->prepare($q);
    
    		$result = $stmt->execute($qp);

            return $stmt;

    	} catch (PDOException $ex) {

    		$response[Constants::SUCCESS_KEY] = 0;

    		$response[Constants::MESSAGE_KEY] = $fail_message . $ex->getMessage();

    		die(json_encode($response));

    	}

    }

}

?>