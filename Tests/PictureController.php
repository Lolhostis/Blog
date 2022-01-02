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
  function __construct(array &$tErrors, string $action) {
    global $rep,$tViews;
    //session_start();
    
    /*
    * Made in the FrontController
    //initialization of an array of errors
    $tErrors = array();
    */

    try{
      /*
      * Action passed by argument in the constructor
      $action= isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;
      //$action=$_REQUEST['action'];
      */

      switch($action) {
        /*
        * The default main page is returned by the front controller
        * in its Reinit method
        case NULL:
          $this->Reinit();
        break;
        */

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
          //We normally won't go there
          // as the action has been verified in the front controller
          $tErrors[] = "No php control for action : ".$action;
          require ($rep.$tViews['error']);
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

  /*
  * Made in the FrontController
  function Reinit() {
  global $rep,$tViews;
    $row_picture = array ();
    require ($rep.$tViews['view_test_picture']);
  }
  */

   /** This function return informations about a picture from the database
    * \param[in, out] tErrors Array of errors
    */
  function get_picture(array &$tErrors) {
    global $rep, $tViews;

    $id_picture=$_POST['id_picture'];
    Validation::val_form_picture_consult($id_picture, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'
    if(count($tErrors)>0){
      require ($rep.$tViews['error']);
      require ($rep.$tViews['view_test_picture']);
      return;
    }

    $model_picture = new PictureModel();

    try{
      $data=$model_picture->findById($id_picture); //if there is an exception, it is catched by the case exception in the 'case try'
      
      $row_picture = array (
        'res_id_picture' => $id_picture,
        'res_uri_picture' => $data->getUri(),
        'res_alt_picture' => $data->getAlt(),
      );
    }catch(\Exception $e){
      $tErrors[] = $e->getMessage();
      require ($rep.$tViews['error']);
    }

    require ($rep.$tViews['view_test_picture']);
  }

     /** This function delete a picture from the database
    * \param[in, out] tErrors Array of errors
    */
    function delete_picture(array &$tErrors) {
      global $rep, $tViews;

      $id_picture=$_POST['id_picture'];
      Validation::val_form_picture_consult($id_picture, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'
      if(count($tErrors)>0){
        require ($rep.$tViews['error']);
        require ($rep.$tViews['view_test_picture']);
        return;
      }
      
      $model_picture = new PictureModel();
      try{
        $result_delete=$model_picture->deletePicture($id_picture); //if there is an exception, it is catched by the case exception in the 'case try'
        if(count($tErrors)>0){
          require ($rep.$tViews['error']);
          require ($rep.$tViews['view_test_picture']);
          return;
        }

        if(!$result_delete){
          $tErrors[]="Errors to delete a picture";
          require ($rep.$tViews['error']);
        }else{
          $row_picture = array (
            'res_delete' => "Picture deleted"
          );
        } 
      }catch(\Exception $e){
        $tErrors[] = $e->getMessage();
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
      $uri_picture = "no_data_found.png";
    }
    $alt_picture=$_POST['alt_picture'];
    //If the alt is not given, we use default values
    if($alt_picture==""){
      $alt_picture = "no_picture_given";
    }
    Validation::val_form_picture_add($id_picture, $uri_picture, $alt_picture, $tErrors);
    if(count($tErrors)>0){
      require ($rep.$tViews['error']);
      require ($rep.$tViews['view_test_picture']);
      return;
    }

    $model_picture = new PictureModel();

    try{
      $result_insert=$model_picture->addPicture(new Picture($id_picture, $uri_picture, $alt_picture));
    }catch(\Exception $e){
      $tErrors[] = $e->getMessage();
      require ($rep.$tViews['error']);
      require ($rep.$tViews['view_test_picture']);
      return;
    }  

    $row_picture = array (
      'res_insert' => "Picture added"
    );

    require ($rep.$tViews['view_test_picture']);
  }
}
?>
