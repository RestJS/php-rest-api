<?php

/* Define Namespace */
namespace RestJS\PhpRestApi\Model;

/* Use External Class */
use RestJS\PhpRestApi\View\Database;

/* Delete Class */
class Delete {

  /* DELETE Data */
  public static function deleteData($table, $id) {

    /* Check ID */
    if (!isset($id)) {
      echo json_encode(array('status' => 'Fail', 'error' => 'Please provide valid input.'));
      die();
    }

    /* Include Database File */
    $con = Database::connection();

    /* Delete Data */
    $sql = "DELETE FROM $table WHERE id= $id";

    if ($con->query($sql) === TRUE) {
      echo json_encode(array('status' => 'Success', 'message' => 'Data is Deleted.'));
    } 
    else {
      echo json_encode(array('status' => 'Fail', 'error' => 'Please provide valid input.'));
      die();
    }

  }
}
