<?php

/* Define Namespace */
namespace RestJS\PhpRestApi;

/* Use External Class */
use RestJS\PhpRestApi\Controller\File;
use RestJS\PhpRestApi\Controller\Method;
use RestJS\PhpRestApi\View\Auth;
use RestJS\PhpRestApi\View\Table;

class Rest {

    public static function execute($dir) {

        /* Include Varibles File */
        include $dir . '/env.php';

        /* Include View Function */
        Auth::accessToken();
        $table = Table::checkTable();

        /* Check ID */
        if (!isset($_GET['id'])) { $id = null; } 
        else {  $id = $_GET['id']; }

        /* Check Upload File */
        if ($table === "file") {
            File::fileUpload($dir, $_SERVER['REQUEST_METHOD']);
            die();
        }

        /* Method Controller File */
        Method::methodController($_SERVER['REQUEST_METHOD'], $table, $id);

    }
}
