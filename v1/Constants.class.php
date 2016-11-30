<?php

/**
* Constants class
*/
class Constants {

	public function __construct() {

		# pass some arguments if needed

	}

	# TABLE NAMES
	const USERS_TABLE = 'users';
	const INFO_TOOLS_TABLE 'info_tools';

	# DB KEYS
	const GMAIL_KEY = 'gmail';
	const CREATED_DATE_KEY = 'created_date';
	const TOOL_ID_KEY = 'tool_id';
	const TOOL_UNLOCKED_KEY = '_unlocked'; # the format is toolId_unlocked
	const TOOL_UNITS_KEY = '_units'; # the format is toolId_units

	# QUERY KEYS
	const GMAIL_QUERY_KEY = ':gmail';
	const CREATED_DATE_QUERY_KEY = ':created_date';
	const TOOL_ID_KEY = ':tool_id';

	# GENERAL KEYS
	const SUCCESS_KEY = 'success';
	const MESSAGE_KEY = 'message';

	# SCOPES
	const SCOPE_LOGIN = 'scope_login';
	const SCOPE_BUY = 'scope_buy';
	const SCOPE_POINTS = 'scope_points';

}

?>