<?php

require_once 'Constants.class.php';
require_once 'QueryHelper.class.php';

class Login {

	public function __construct() {

        # constructor

	}

    public function make_login($db, $gmail) {  

        # Here we are checking whether the user exists or not
        $query = QueryHelper::make_select_query("*", Constants::USERS_TABLE, 
            Constants::GMAIL_KEY, Constants::GMAIL_QUERY_KEY);  

        $query_params = array(Constants::GMAIL_QUERY_KEY => $gmail); 

        $stmt = QueryHelper::make_db_conn($db, $query, $query_params, "Database Error1. ");     

        $row = $stmt->fetch();   

        if ($row) {  

            $response[Constants::SUCCESS_KEY] = 2;

            $response[Constants::MESSAGE_KEY] = "Username Successfully Logged In !";

            $response[Constants::ID_KEY] = $row[Constants::ID_KEY];

            $response[Constants::TOOLS_KEY] = array(
                array(
                    Constants::TOOL_ID_KEY => '1',
                    Constants::TOOL_JSON_NAME_KEY => Constants::TOOL_1_NAME,
                    Constants::TOOL_JSON_UNLOCKED_KEY => $row['1' . Constants::TOOL_UNLOCKED_KEY],
                    Constants::TOOL_JSON_UNITS_KEY => $row['1' . Constants::TOOL_UNITS_KEY],
                    Constants::TOOL_JSON_DU_KEY => Constants::TOOL_1_DU,
                    Constants::UPDATED_DATE_KEY => $row['1' . Constants::TOOL_UPDATED_DATE_KEY]
                    )
                );

            die(json_encode($response));
        
        }  


        $query = QueryHelper::make_insert_query(Constants::USERS_TABLE, Constants::GMAIL_KEY, Constants::GMAIL_QUERY_KEY);     

        QueryHelper::make_db_conn($db, $query, $query_params, "Database Error2. ");
    
        $response[Constants::SUCCESS_KEY] = 1;

        $response[Constants::MESSAGE_KEY] = "Username Successfully Added!";

        $response[Constants::ID_KEY] = '1';

        $response[Constants::TOOLS_KEY] = array(
                array(
                    Constants::TOOL_ID_KEY => '1',
                    Constants::TOOL_JSON_NAME_KEY => Constants::TOOL_1_NAME,
                    Constants::TOOL_JSON_UNLOCKED_KEY => '0',
                    Constants::TOOL_JSON_UNITS_KEY => '0',
                    Constants::TOOL_JSON_DU_KEY => Constants::TOOL_1_DU
                    )
                );

        echo json_encode($response);

        session_destroy();    

    }

}

?>