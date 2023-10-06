<?php 

/* Define Namespace */
namespace RestJS\PhpRestApi\Controller;

/* File Controller Class */
class File {

    /* Check Method Function */
    public static function fileUpload($dir, $method) {
        
        switch ($method) {
    
            /* POST Method */
            case "POST":
              
              /* Image Allowed Extension */
              $allowed_extension = array("png", "jpg","jpeg, webp");
              
              /* Get Image File Extension */
              $file_extension = pathinfo($_FILES["upload"]["name"], PATHINFO_EXTENSION);

              /* Check Extension */
              if(!in_array(strtolower($file_extension),$allowed_extension)){
                echo json_encode(array('status'=>'Fail', 'error'=>'Please upload png, jpg, jpeg and webp file.'));
                die(); 
              }

              /* Check File Size */
              if($_FILES["upload"]["size"] > 1024*1024){
                echo json_encode(array('status'=>'Fail', 'error'=>'Please upload 1MB size file.'));
                die(); 
              }
              
              /* Upload File Path */
              $url ="uploads/IMG_".uniqid()."_".date("GHisdmY").".".$file_extension;
            
              /* Upload File */
              if(move_uploaded_file($_FILES['upload']['tmp_name'], $url)){

                /* Upload File Link */
                $url = $dir ."/".$url;

                echo json_encode(array('status'=>'Success', 'message'=>'File is successful uploaded.', 'file_url' => $url));

              }
            break;
    
            /* DELETE Method */
            case "DELETE":

              /* Recive Delete File URL */
              $data = json_decode(file_get_contents('php://input'), true);
              
              /* Remove Host Link in URL */
              $url = str_replace($dir ."/", "",$data['upload']);

              /* Delete File */
              if(unlink($url)){
                echo json_encode(array('status'=>'Success', 'message'=>'File is deleted.'));
              }
            break;

            default: 
            echo json_encode(array('status'=>'Fail', 'error'=>'Please use POST and DELETE Method for file.'));
        
        }
    }
}