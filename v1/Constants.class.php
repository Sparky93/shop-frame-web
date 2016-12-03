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
	const UPDATED_DATE_KEY = 'updated_date';
	const TOOL_UPDATED_DATE_KEY = '_updated_date';
	const TOOL_ID_KEY = 'tool_id';
	const TOOL_INDEX_KEY = 'tool_index';
	const TOOL_UNLOCKED_KEY = '_unlocked'; # the format is toolId_unlocked
	const TOOL_UNITS_KEY = '_units'; # the format is toolId_units
	const TOOL_DU_KEY = '_daily_units';
	const TOOL_UPDATED_ON_TOOLS_KEY = 'tool_updated_on';

	# JSON KEYS
	const TOOL_JSON_NAME_KEY = 'tool_name';
	const TOOL_JSON_AVAILABLE_KEY = 'tool_available';
	const TOOL_JSON_UNLOCKED_KEY = 'unlocked';
	const TOOL_JSON_UNITS_KEY = 'units';
	const TOOL_JSON_DU_KEY = 'daily_units';

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
	const SCOPE_INFO = 'scope_info';

	# DAILY UNITS & TOOLS
	const TOOLS_KEY = 'tools';
	const TOOL_1_DU = 50;
	const TOOL_1_NAME = 'tool_one';

}

?>