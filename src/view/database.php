<?php

/* Define Namespace */
namespace RestJS\PhpRestApi\View;

/* Use External Class */
use mysqli;

/* Database Class */
class Database {

        /* Connection Function */
        public static function connection() {

                /* Create connection */
                $con = new mysqli(SERVER_NAME, USER_NAME, PASSWORD, DATABASE_NAME);

                /* Check connection */
                if ($con->connect_error) {
                        die("Connection failed: " . $con->connect_error);
                }

                /* Change Character Set to UTF8 */
                $con->set_charset("utf8");

                return $con;
        }
}