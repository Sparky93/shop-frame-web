<?php

class ToolsTableConstants {

	private function __construct() {

		# constructor

	}

    # TABLE COLUMNS KEYS
	const TABLE_ID_KEY = 'tool_id';
	const TABLE_TOOL_NAME_KEY = 'tool_name';
	const TABLE_TOOL_AVAILABLE_KEY = 'tool_available';
	const TABLE_TOOL_UPDATED_ON_KEY = 'tool_updated_on';
	const TABLE_TOOL_INDEX_KEY = 'tool_index';
	const TABLE_TOOL_DAILY_UNITS = '50';

	# JSON RESPONSE KEYS
	# [DO NOT CHANGE THESE AFTER RELEASE WITHOUT A MIGRATION PLAN]
	const JSON_ID_KEY = 'tool_id';
	const JSON_NAME_KEY = 'name';
	const JSON_AVAILABLE_KEY = 'available';
	const JSON_UPDATED_ON_KEY = 'updated_on';
	const JSON_INDEX_KEY = 'index';

    # QUERY KEYS
	const TOOL_ID_QUERY_KEY = ':tool_id';

	
	# SPECIFIC TOOLS CONSTANTS
	const TOOL_1_DU = '50';

}

?>