<?php

/**
* Constants class
*/
class Constants {

	private function __construct() {

		# pass some arguments if needed

	}

	# TABLE NAMES
	const USERS_TABLE = 'users';
	const INFO_TOOLS_TABLE = 'info_tools';

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

}

?>