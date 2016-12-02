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

            $id_key = Constants::ID_KEY;

            $tool1_id_key = '1' . Constants::TOOL_UNLOCKED_KEY;

            $tool1_units_key = '1' . Constants::TOOL_UNITS_KEY;

            $tool1_name_key = '1' . Constants::TOOL_NAME_KEY;

            $tool1_du_key = '1' . Constants::TOOL_DU_KEY;

            $response[Constants::SUCCESS_KEY] = 2;

            $response[Constants::MESSAGE_KEY] = "Username Successfully Logged In !";

            $response[Constants::ID_KEY] = $row["$id_key"];

            $response[$tool1_id_key] = $row["$tool1_id_key"];

            $response[$tool1_units_key] = $row["$tool1_units_key"];

            $response[$tool1_du_key] = Constants::TOOL_1_DU;

            $response[$tool1_name_key] = Constants::TOOL_1_NAME;

            die(json_encode($response));
        
        }  


        $query = QueryHelper::make_insert_query(Constants::USERS_TABLE, Constants::GMAIL_KEY, Constants::GMAIL_QUERY_KEY);     

        QueryHelper::make_db_conn($db, $query, $query_params, "Database Error2. ");
    
        $response[Constants::SUCCESS_KEY] = 1;

        $response[Constants::MESSAGE_KEY] = "Username Successfully Added!";

        echo json_encode($response);

        session_destroy();    

    }

}

?>