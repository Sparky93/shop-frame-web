<?php

class UsersTableConstants {

	private function __construct() {

		# constructor

	}

    # TABLE COLUMNS KEYS
	const TABLE_ID_KEY = 'id';
	const TABLE_GMAIL_KEY = 'gmail';
	const TABLE_CREATED_DATE_KEY = 'created_date';
	const TABLE_UPDATED_DATE_KEY = '_updated_date';
	const TABLE_UNLOCKED_KEY = '_unlocked';
	const TABLE_UNITS_KEY = '_units';

	# JSON RESPONSE KEYS 
	# [DO NOT CHANGE THESE AFTER RELEASE WITHOUT A MIGRATION PLAN]
	const JSON_ID_KEY = 'id';
	const JSON_GMAIL_KEY = 'gmail';
	const JSON_CREATED_DATE_KEY = 'created_date';
	const JSON_UPDATED_DATE_KEY = 'updated_date';
	const JSON_UNLOCKED_KEY = 'unlocked';
	const JSON_UNITS_KEY = 'units';

	# QUERY KEYS
	const GMAIL_QUERY_KEY = ':gmail';
	const CREATED_DATE_QUERY_KEY = ':created_date';

}

?>