<?php
namespace Tests;
use \Models\NewsModel;
use  \Config\Validation;

/**
  /** \author L'HOSTIS Loriane & ALLEMAND Arnaud
  /** \date 05/12/2021
  /** \file NewsController.php
  /** \namespace Tests
*/


/** \class Controller of the news NewsController.php
*/
class NewsController {

   /** Constructor of the News controller
    */
  function __construct(array &$tErrors, string $action) {
    global $rep,$tViews;
  //  session_start();

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

        case "get_news":
          $this->get_news($tErrors);
          break;

        case "add_news":
          $this->add_news($tErrors);
          break;

        case "delete_news":
          $this->delete_news($tErrors);
          break;

        default:
          //We normally won't go there
          // as the action has been verified in the front controller
          $tErrors[] = "No php control for action : ".$action;
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

  /*
  * Made in the FrontController
  function Reinit() {
    global $rep,$tViews;

    $row_news = array ();
    require ($rep.$tViews['view_test_news']);
  }
  */

   /** This function return informations about a news from the database
    * \param[in, out] tErrors Array of errors
    */
  function get_news(array &$tErrors) {
    global $rep,$tViews;

    $id_news=$_POST['id_news'];
    Validation::val_form_news_consult($id_news, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'
    if(count($tErrors)>0){
      require ($rep.$tViews['error']);
      require ($rep.$tViews['view_test_news']);
      return;
    }

    $model_news = new NewsModel();

    try{
      $data=$model_news->findById($id_news); //if there is an exception, it is catched by the case exception in the 'case try'

      $row_news = array (
        'res_id_news' => $id_news,
        'res_title_news' => $data->getTitle(),
        'res_description_news' => $data->getDescription(),
        'res_date_news' => $data->getDate(),
        'res_login_user_news' => $data->getAuthor()->getPseudo(),
      );
    }catch(\Exception $e){
      $tErrors[] = $e->getMessage();
      require ($rep.$tViews['error']);
    }       
    require ($rep.$tViews['view_test_news']);
  }

   /** This function delete a news from the database
    * \param[in, out] tErrors Array of errors
    */
    function delete_news(array &$tErrors) {
      global $rep,$tViews;
  
      $id_news=$_POST['id_news'];
      Validation::val_form_news_consult($id_news, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'
      if(count($tErrors)>0){
        require ($rep.$tViews['error']);
        require ($rep.$tViews['view_test_news']);
        return;
      }

      $model_news = new NewsModel();
      try{
        $result_delete=$model_news->deleteNews($id_news); //if there is an exception, it is catched by the case exception in the 'case try'
      
        if(!$result_delete){
          $tErrors[]="Errors to delete a news";
          require ($rep.$tViews['error']);
        }else{
          $row_news = array (
            'res_delete' => "News deleted"
          );
        }
      }catch(\Exception $e){
        $tErrors[] = $e->getMessage();
        require ($rep.$tViews['error']);
      }       
      require ($rep.$tViews['view_test_news']); 
    }  

   /** This function add a news into the database
    * \param[in, out] tErrors Array of errors
    */
  function add_news(array &$tErrors) {
    global $rep,$tViews;

    $id_news=$_POST['id_news'];
    $title_news=$_POST['title_news'];
    $description_news=$_POST['description_news'];
    $date_news=$_POST['date_news'];
    $login_user_news=$_POST['login_user_news'];
    Validation::val_form_news_add($id_news, $title_news, $description_news, $date_news, $login_user_news, $tErrors);
    if(count($tErrors)>0){
      require ($rep.$tViews['error']);
      require ($rep.$tViews['view_test_news']);
      return;
    }
    
    $model_news = new NewsModel();

    try{
      $result_insert=$model_news-> addNews($id_news, $title_news, $description_news, $date_news, $login_user_news);

      $row_news = array (
        'res_insert' => "News added"
        );
    }catch(\Exception $e){
      $tErrors[] = $e->getMessage();
      require ($rep.$tViews['error']);
    }       
    require ($rep.$tViews['view_test_news']);
  }
}
?>

