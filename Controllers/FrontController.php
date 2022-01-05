<?php
namespace Controllers;
use \Controllers\UserController;
use \Models\UserModel;

/**
  /** \author L'HOSTIS Loriane & ALLEMAND Arnaud
  /** \date 15/12/2021
  /** \file FrontController.php
  /** \namespace Controllers
*/

/** \class Main Controller of all the controllers 
*/
class FrontController {

    private $user_mdl;

   /** Constructor of the Front controller
    */
  function __construct() {
    global $rep,$tViews, $tDirectory;
    global $news_actions, $comment_actions, $picture_actions, $user_actions, $views_actions;
    global $manage_jobs, $admin_actions;
    $this->user_mdl = new UserModel();
    if(!isset($_SESSION)) {
      session_start();
    }

    if (!isset($_COOKIE['cookieCpt'])) {
      setcookie("cookieCpt", 0, time()+365*24*3600, '/'); //DIRECTORY_SEPARATOR
    }
    //var_dump($_COOKIE);

    //initialization of an array of errors
    $tErrors = array();

    try {
      /* Getting the current connected user from the session cookies */
      $cur_user = $this->user_mdl->getCurrentUser();
      var_dump($cur_user);

      $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;

      if($action==NULL) {
        $this->Reinit();
      }
      else if(in_array($action, $admin_actions)){
        if($cur_user==NULL || !$cur_user->isAdmin()) {
          /* No admin user connected */
          require ($rep.$tViews['sign_up']);
        }
        else{
          /* There is an admin user connected */
          new AdminController($tErrors, $action);
        }
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
      else if(in_array($action, $views_actions)){
        new SwitchController($tErrors, $action);
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
    global $rep,$tViews, $tDirectory, $page, $nbNewsPerPage;

    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;

    require ($rep.$tViews['home']);
  }
}
?>