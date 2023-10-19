<?php

/* Define Namespace */
namespace RestJS\PhpRestApi\View;

/* Head Allows Section */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

class Auth {

    public static function accessToken() {

        /* Get Headers */
        $headers = getallheaders();

        /* Check Access Token */
        if (isset($_GET['access_token'])) {

            if ($_GET['access_token'] != $_ENV['ACCESS_TOKEN']) {
                echo json_encode(['status' => 'Fail', 'error' => 'Please provide valid access token']);
                die();
            }
        }

        /* Check Authorization */
        elseif (isset($headers['Authorization'])) {

            if ($headers['Authorization'] != "Bearer " . $_ENV['ACCESS_TOKEN']) {
                echo json_encode(['status' => 'Fail', 'error' => 'Please provide valid access token']);
                die();
            }
        }
        else {
            echo json_encode(['status' => 'Fail', 'error' => 'Please provide access token']);
            die();
        }
    }
}
