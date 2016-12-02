<?php

require_once 'Constants.class.php';

class QueryHelper {

	public function __construct() {

		# pass some arguments if needed

	}

	static function make_select_query($count, $table_name, $key, $value) {

		$query = "SELECT ";
		$query .= $count;
		$query .=  " FROM ";
		$query .= $table_name;
		$query .= " WHERE ";
		$query .= $key;
		$query .= " = ";
		$query .= $value;

		return $query;

	}

	static function make_insert_query($table_name, $keys, $values) {

			$query = "INSERT INTO ";
			$query .= $table_name;
			$query .= " ( ";
			$query .= $keys . " ) ";
			$query .= " VALUES ( ";
			$query .= $values . " ) ";

			return $query;

	}

	static function make_update_query($table_name, $set_query, $where_query) {

		$query = "UPDATE ";
		$query .= $table_name;
		$query .= " SET ";
		$query .= $set_query;
		$query .= " WHERE ";
		$query .= $where_query;

		return $query;

	}

	static function make_db_conn($db, $q, $qp, $fail_message) {

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