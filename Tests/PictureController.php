<?php
namespace Tests;
use \Config\Connection;
use \Gateways\PictureGateway;
use \Jobs\Picture;
use \Config\Validation;
use \Models\PictureModel;

/**
  /** \author L'HOSTIS Loriane
  /** \date 05/12/2021
  /** \file PictureController.php
  /** \namespace Tests
*/

/** \class Controller of pictures PictureController.php
*/
class PictureController {

   /** Constructor of the Picture controller
    */
  function __construct() {
    global $rep,$tViews;
    session_start();

    $tErrors = array();

    try{
      $action= isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;
    //  $action=$_REQUEST['action'];

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
          require ($rep.$tViews['view_test_picture']);
          break;
      }

    } catch (\PDOException $e){
      $tErrors[] = $e->getMessage();
      require ($rep.$tViews['error']);
    }catch (\Exception $e){
      $tErrors[] = $e->getMessage();
      require ($rep.$tViews['error']);
    }

    exit(0);
  }

 /** This function loads the page
  */
  function Reinit() {
  global $rep,$tViews;
    $row_picture = array ();
    require ($rep.$tViews['view_test_picture']);
  }

   /** This function return informations about a picture from the database
    * \param[in, out] tErrors Array of errors
    */
  function get_picture(array &$tErrors) {
    global $rep, $tViews;

    $id_picture=$_POST['id_picture'];
    Validation::val_form_picture_consult($id_picture, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'

    $model_picture = new PictureModel();

    $data=$model_picture->findById($id_picture); //if there is an exception, it is catched by the case exception in the 'case try'

    $row_picture = array (
      'res_id_picture' => $id_picture,
      'res_uri_picture' => $data->getUri(),
      'res_alt_picture' => $data->getAlt(),
    );
    require ($rep.$tViews['view_test_picture']);
  }

     /** This function delete a picture from the database
    * \param[in, out] tErrors Array of errors
    */
    function delete_picture(array &$tErrors) {
      global $rep, $tViews;

      $id_picture=$_POST['id_picture'];
      Validation::val_form_picture_consult($id_picture, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'
  
      $model_picture = new PictureModel();
  
      $data=$model_picture->delete($id_picture); //if there is an exception, it is catched by the case exception in the 'case try'
      
      if(!$data){
        $tErrors[]="Errors to delete a picture";
        require ($rep.$tViews['error']);
      }
      require ($rep.$tViews['view_test_picture']);
    }

   /** This function add a picture into the database
    * \param[in, out] tErrors Array of errors
    */
  function add_picture(array &$tErrors) {
    global $rep,$tViews;

    $id_picture=$_POST['id_picture'];
    $uri_picture=$_POST['uri_picture'];
    //If the uri is not given, we use default values
    if($uri_picture==""){
      $uri_picture = "Views/Resources/Pictures/no_data_found.png";
    }
    $alt_picture=$_POST['alt_picture'];
    //If the alt is not given, we use default values
    if($alt_picture==""){
      $alt_picture = "no_picture_given";
    }
    Validation::val_form_picture_add($id_picture, $uri_picture, $alt_picture, $tErrors);
    
    $model_picture = new PictureModel();

    $result_insert=$model_picture->addPicture(new Picture($id_picture, $uri_picture, $alt_picture));

    $row_picture = array (
      'res_insert' => "Picture added"
    );

    require ($rep.$tViews['view_test_picture']);
  }
}
?>
