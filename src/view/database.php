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
                $con = new mysqli($_ENV['HOST_NAME'], $_ENV['USER_NAME'], $_ENV['PASSWORD'], $_ENV['DATABASE_NAME']);

                /* Check connection */
                if ($con->connect_error) {
                        die("Connection failed: " . $con->connect_error);
                }

                /* Change Character Set to UTF8 */
                $con->set_charset("utf8");

                return $con;
        }
}