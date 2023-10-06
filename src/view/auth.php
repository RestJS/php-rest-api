<?php

/* Define Namespace */
namespace RestJS\PhpRestApi\View;

class Auth {

    public static function accessToken() {

        /* Head Allows Section */
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        $headers = getallheaders();

        /* Check Access Token */
        if (isset($_GET['access_token'])) {

            if ($_GET['access_token'] != ACCESS_TOKEN) {
                echo json_encode(array('status' => 'Fail', 'error' => 'Please provide valid access token'));
                die();
            }
        }

        /* Check Authorization */ 
        else if (isset($headers['Authorization'])) {

            if ($headers['Authorization'] != "Bearer " . ACCESS_TOKEN) {
                echo json_encode(array('status' => 'Fail', 'error' => 'Please provide valid access token'));
                die();
            }
        } 
        else {
            echo json_encode(array('status' => 'Fail', 'error' => 'Please provide access token'));
            die();
        }
    }
}
