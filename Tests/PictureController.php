<?php
namespace Tests;
/*
require_once('../Jobs/Comment.php');
require_once('../Jobs/News.php');
require_once('../Jobs/Picture.php');
require_once('../Jobs/User.php');
require_once('../Models/PictureModel.php');
require_once('../Config/Connexion.php');
require_once('../Config/Validation.php');
*/

class PictureController {

  function __construct() {
    global $rep,$tViews;
    session_start();

    //initialization of an array of errors
    $tErrors = array();

    try{
      $action=$_REQUEST['action'];

      switch($action) {
        case NULL:
          $this->Reinit();
        break;

        case "get_picture":
          $this->get_picture($tErrors);
        break;

        case "add_picture":
          $this->add_picture($tErrors);
        break;

        case "delete_picture":
          $this->delete_picture($tErrors);
        break;

        default:
          $tErrors[] =  "No php view";
          require ($rep.$tViews['article']);
          break;
      }

    } catch (PDOException $e){
      $tErrors[] =  "Unexpected error";
       require ($rep.$tViews['error']);
    }catch (Exception $e2){
      $tErrors[] =  "Unexpected error";
      require ($rep.$tViews['error']);
    }

    exit(0);
  }

  function Reinit() {
  global $rep,$tViews;

    $row_picture = array ();
    require ($rep.$tViews['view_test_picture']);
  }

  function get_picture(array $tErrors) {
    global $rep,$tViews;

    $id_picture=$_POST['id_picture'];
    // \config\Validation::val_form($nom,$age,$tViewError);
    \Config\Validation::val_form_picture_consult($id_picture, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'

    $model_picture = new \Models\PictureModel();

    $data=$model_picture->findById($id_picture); //if there is an exception, it is catched by the case exception in the 'case try'

    $row_picture = array (
      'res_id_picture' => $id_picture,
      'res_uri_picture' => $data->getUri(),
      'res_alt_picture' => $data->getAlt(),
    );
    require ($rep.$tViews['view_test_picture']);
  }

  function add_picture(array $tErrors) {
    global $rep,$tViews;

    $id_picture=$_POST['id_picture'];
    $uri_picture=$_POST['uri_picture'];
    $alt_picture=$_POST['alt_picture'];
    \Config\Validation::val_form_picture_add($id_picture, $uri_picture, $alt_picture, $tErrors);

    $model_picture = new \Models\PictureModel();

    $result_insert=$model_picture->addPicture(new Picture($id_picture, $uri_picture, $alt_picture));

    if($result_insert==true){
      $notification="Picture added";
    }else{
     // tErrors[]="Can't add this picture";
      //error view
    }

    require ($rep.$tViews['view_test_picture']);
  }
}
?>


























