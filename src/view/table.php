<?php

/* Define Namespace */
namespace RestJS\PhpRestApi\View;

class Table {

    public static function checkTable() {

        /* Check Table Name */
        if (!isset($_GET['table'])) {
            echo json_encode(array('status' => 'Fail', 'error' => 'Please provide valid input.'));
            die();
        } 
        else {
            return $_GET['table'];
        }
    }
}
