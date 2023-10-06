<?php

/* Define Namespace */
namespace RestJS\PhpRestApi\Model;

/* Use External Class */
use RestJS\PhpRestApi\View\Database;

/* GET Class */
class Get {

  /* GET All Data */
  public static function getData($table, $id) {

    /* Check ID */
    if(!isset($id)) { $where = ''; }
     else { $where = "WHERE id = $id"; }

    /* Include Database File */
    $con = Database::connection();

    /* Get All Data */
    $sql = "SELECT * FROM  $table $where";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
      $arr[] = $row;
    }

    foreach ($arr[0] as $key => $val) {

      // String convert to Array
      if (strpos($val, "[{") === 0) {
        $arr[0][$key] = json_decode($val, true);
      }
    }

    if (mysqli_num_rows($result) > 0) {
      echo json_encode(array('status'=>'Success', 'data'=>$arr));
    } 
    else {
      echo json_encode(array('status'=>'Fail', 'error'=>'Please provide valid input.'));
      die();
    }
  }
}