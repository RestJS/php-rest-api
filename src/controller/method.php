<?php

/* Define Namespace */
namespace RestJS\PhpRestApi\Controller;

/* Use External Class */
use RestJS\PhpRestApi\Model\Delete;
use RestJS\PhpRestApi\Model\Get;
use RestJS\PhpRestApi\Model\Post;
use RestJS\PhpRestApi\Model\Put;

/* Method Controller Class */
class Method {

    /* Check Method Function */
    public static function methodController($method, $table, $id) {

        switch ($method) {

            /* GET Method */
            case "GET":

                /* Include GET Model Fuction */
                Get::getData($table, $id);
                break;

            /* POST Method */
            case "POST":

                /* Recive POST Data */
                $data = file_get_contents('php://input');

                /* Include POST Model Fuction */
                Post::postData($table, $data);
                break;

            /* PUT Method */
            case "PUT":

                /* Recive PUT Data */
                $data = file_get_contents('php://input');

                /* Include PUT Model Fuction */
                Put::putData($table, $id, $data);
                break;

            /* DELETE Method */
            case "DELETE":

                /* Include DELETE Model Fuction */
                Delete::deleteData($table, $id);
                break;
        }
    }
}