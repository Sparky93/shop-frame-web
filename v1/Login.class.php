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
            UsersTableConstants::GMAIL_KEY, UsersTableConstants::GMAIL_QUERY_KEY);  

        $query_params = array(UsersTableConstants::GMAIL_QUERY_KEY => $gmail); 

        $stmt = QueryHelper::make_db_conn($db, $query, $query_params, "Database Error1. ");     

        $row = $stmt->fetch();   

        if ($row) {              

            die(json_encode(get_response_from_row($row, $gmail));
        
        }  


        $query = QueryHelper::make_insert_query(Constants::USERS_TABLE, UsersTableConstants::GMAIL_KEY, UsersTableConstants::GMAIL_QUERY_KEY);     

        QueryHelper::make_db_conn($db, $query, $query_params, "Database Error2. ");

        die json_encode(get_response_from_row(NULL, $gmail));

    }

    private function get_response_from_row($row, $gmail) {

        if (!is_null($row)) {

            $response[Constants::SUCCESS_KEY] = 2;

            $response[Constants::MESSAGE_KEY] = "Username Successfully Logged In !";

            $response[UsersTableConstants::JSON_ID_KEY] = $row[UsersTableConstants::TABLE_ID_KEY];

            # TODO implement for each id from ids
            $ids = '1';

            $response[Constants::TOOLS_KEY] = array(
                array(
                    UsersTableConstants::JSON_ID_KEY => $ids,
                    UsersTableConstants::JSON_GMAIL_KEY => $row[UsersTableConstants::TABLE_GMAIL_KEY],
                    UsersTableConstants::JSON_CREATED_DATE_KEY => $row[UsersTableConstants::TABLE_CREATED_DATE_KEY],
                    UsersTableConstants::JSON_UPDATED_DATE_KEY => $row[$ids . UsersTableConstants::TABLE_UPDATED_DATE_KEY],
                    UsersTableConstants::JSON_UNLOCKED_KEY => $row[$ids . UsersTableConstants::TABLE_UNLOCKED_KEY],
                    UsersTableConstants::JSON_UNITS_KEY => $row[$ids . UsersTableConstants::TABLE_UNITS_KEY]
                    )
                );

            return $response;

        }

        $response[Constants::SUCCESS_KEY] = 1;

        $response[Constants::MESSAGE_KEY] = "Username Successfully Added!";

        $response[UsersTableConstants::JSON_ID_KEY] = '0';

        $datetime = date_create()->format('Y-m-d H:i:s');

        $response[Constants::TOOLS_KEY] = array(
                array(
                      UsersTableConstants::JSON_ID_KEY => $ids,
                    UsersTableConstants::JSON_GMAIL_KEY => $gmail,
                    UsersTableConstants::JSON_CREATED_DATE_KEY => $datetime,
                    UsersTableConstants::JSON_UPDATED_DATE_KEY => $datetime,
                    UsersTableConstants::JSON_UNLOCKED_KEY => '0',
                    UsersTableConstants::JSON_UNITS_KEY => '0'
                    )
                );

        return $response;

    }

}

?>