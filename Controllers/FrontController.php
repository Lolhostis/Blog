<?php
namespace Controllers;
use \Test\CommentController;
use \Test\NewsController;
use \Test\PictureController;
use \Test\UserController;
use \Config\Validation;

/**
  /** \author L'HOSTIS Loriane & ALLEMAND Arnaud
  /** \date 15/12/2021
  /** \file FrontController.php
  /** \namespace Controllers
*/

/** \class Main Controller of all the controllers 
*/
class FrontController {

   /** Constructor of the Front controller
    */
  function __construct() {
    global $rep,$tViews;
    session_start();

    //initialization of an array of errors
    $tErrors = array();

    try{
      $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;
      //$action=$_REQUEST['action'];

      if(in_array($action, $news_actions)){
        new NewsController();
      }elseif(in_array($action, $comment_actions)){
        new CommentController();
      }
      elseif(in_array($action, $user_actions)){
        new UserController();
      }
      elseif(in_array($action, $picture_actions)){
        new PictureController();
      }
      
      switch($action) {
        case NULL:
          $this->Reinit();
          break;
        
        // Main menu
        case "manage_news":
          require($rep.$tViews["view_test_news"]);
          break;

        case "manage_comment":
          require($rep.$tViews["view_test_comment"]);
          break;
        
        case "manage_user":
          require($rep.$tViews["view_test_user"]);
          break;
        
        case "manage_picture":
            require($rep.$tViews["view_test_picture"]);
            break;
      }
      
      else{
        $tErrors[] = "No php view";
        require ($rep.$tViews['view_test_news']);
      }

        /*
        case "get_news":
          new NewsController(); //->get_news($tErrors);
          break;
        case "add_news":
          new NewsController(); //->add_news($tErrors);
          break;
        case "delete_news":
          new NewsController(); //->delete_news($tErrors);
          break;        

        // Comment related
        case "get_comment":
          new CommentController(); //->get_comment($tErrors);
        break;

        case "add_comment":
          new CommentController(); //->add_comment($tErrors);
        break;

        case "delete_comment":
          new CommentController(); //->delete_comment($tErrors);
        break;

        //User related
        case "get_user":
          new UserController(); //->get_user($tErrors);
          break;

        case "add_user":
          new UserController(); //->add_user($tErrors);
          break;

        case "delete_user":
          new UserController(); //->delete_user($tErrors);
          break;

        //Picture related
        case "get_picture":
          new PictureController(); //->get_picture($tErrors);
        break;

        case "add_picture":
          new PictureController(); //->add_picture($tErrors);
        break;

        case "delete_picture":
          new PictureController(); //->delete_picture($tErrors);
        break;
         */

    }catch (\PDOException $e){
      $tErrors[] =  $e->getMessage();
       require ($rep.$tViews['error']);
    }catch (\Exception $e){
      $tErrors[] =  $e->getMessage();
      require ($rep.$tViews['error']);
    }

    exit(0);
  }

 /** This function loads the page
  */
  function Reinit() {
    global $rep,$tViews;

    require ($rep.$tViews['pouet']);
  }
}
?>