<?php
namespace Controllers;
use \Config\Validation;
use \Controllers\NewsController;
use \Controllers\SwitchController;

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
    global $news_actions, $comment_actions, $picture_actions, $user_actions;
    global $manage_jobs;
    session_start();

    //initialization of an array of errors
    $tErrors = array();

    try {
      $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;
      //$action=$_REQUEST['action'];

      if($action==NULL) {
        $this->Reinit();
      }
      elseif(in_array($action, $news_actions)){
        new NewsController($tErrors, $action);
      }
      elseif(in_array($action, $comment_actions)){
        new CommentController($tErrors, $action);
      }
      elseif(in_array($action, $user_actions)){
        new UserController($tErrors, $action);
      }
      elseif(in_array($action, $picture_actions)){
        new PictureController($tErrors, $action);
      }
      else if($action=="article"){
       // require ($rep.$tViews['article']); 
       //new SwitchController($tErrors, $action);
       // header('location:' . $tViews['article']);
        require ($rep.$tViews['article']);
       //$this->Reinit('article');
      }
      else{
        // Unknown action
        $tErrors[] = "No php view for action : ".$action;
        require ($rep.$tViews['error']);
      }
    }catch (\PDOException $e){
      $tErrors[] =  $e->getMessage();
      require ($rep.$tViews['error']);
    }catch (\Exception $e){
      $tErrors[] =  $e->getMessage();
      require ($rep.$tViews['error']);
    }

    exit(0);
  }

 /**
  * This function loads the page
  */
  function Reinit() {
    global $rep,$tViews;

    require ($rep.$tViews['home']);
  }
}
?>