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
	const INFO_TOOLS_TABLE = 'info_tools';

	# DB KEYS
	const ID_KEY = 'id';
	const GMAIL_KEY = 'gmail';
	const CREATED_DATE_KEY = 'created_date';
	const TOOL_ID_KEY = 'tool_id';
	const TOOL_INDEX_KEY = 'tool_index';
	const TOOL_UNLOCKED_KEY = '_unlocked'; # the format is toolId_unlocked
	const TOOL_UNITS_KEY = '_units'; # the format is toolId_units
	const TOOL_NAME_KEY = '_tool_name';
	const TOOL_DU_KEY = '_du';

	# QUERY KEYS
	const GMAIL_QUERY_KEY = ':gmail';
	const CREATED_DATE_QUERY_KEY = ':created_date';
	const TOOL_ID_QUERY_KEY = ':tool_id';

	# GENERAL KEYS
	const SUCCESS_KEY = 'success';
	const MESSAGE_KEY = 'message';

	# SCOPES
	const SCOPE_KEY = 'scope';
	const SCOPE_LOGIN = 'scope_login';
	const SCOPE_BUY = 'scope_buy';
	const SCOPE_POINTS = 'scope_points';

	# DAILY UNITS & TOOLS
	const TOOL_1_DU = 50;
	const TOOL_1_NAME = 'tool_one';

}

?>