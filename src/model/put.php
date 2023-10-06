<?php

/* Define Namespace */
namespace RestJS\PhpRestApi\Model;

/* Use External Class */
use RestJS\PhpRestApi\View\Database;

/* PUT Class */
class Put {

  /* PUT Data */
  public static function putData($table, $id, $data) {

    /* Check Data and Check ID */
    if(!isset($data) && !isset($id)) {
      echo json_encode(array('status'=>'Fail', 'error'=>'Please provide valid input.'));
      die();
    }

    /* Include Database File */
    $con = Database::connection();

    /* Update Data */
    $data = json_decode($data, true);
    $dataString = '';

    foreach($data as $key=>$value) {

      // Array convert to String
      if (is_array($value)) {
        $value = json_encode($value);
      }

      $dataString = $dataString."$key = '$value', ";
    }

    $dataString =  substr($dataString, 0, -2);

    $sql = "UPDATE $table SET $dataString  WHERE id = $id";

    if ($con->query($sql) === TRUE) {
      echo json_encode(array('status'=>'Success', 'message'=>'Data is Updated.'));
    }
    else {
      echo json_encode(array('status'=>'Fail', 'error'=>'Please provide valid input.'));
      die();
    }
  }
}