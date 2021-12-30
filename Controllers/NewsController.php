<?php
namespace Controllers;
use \Models\NewsModel;
use  \Config\Validation;

/**
  /** \author L'HOSTIS Loriane & ALLEMAND Arnaud
  /** \date 05/12/2021
  /** \file NewsController.php
  /** \namespace Controllers
*/


/** \class Controller of the news NewsController.php
*/
class NewsController {

   /** Constructor of the News controller
    */
  function __construct(array &$tErrors, string $action) {
    global $rep,$tViews;

    try{
      switch($action) {
        case "get_news":
          $this->get_news($tErrors);
          break;

        case "add_news":
          $this->add_news($tErrors);
          break;

        case "delete_news":
          $this->delete_news($tErrors);
          break;

        case "search_news":
            $this->search_news($tErrors);
          break;

        default:
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

  function get_news(array &$tErrors) {
    global $rep,$tViews;

    $id_news=$_POST['id_news'];
    Validation::val_form_news_consult($id_news, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'
    if(count($tErrors)>0){
      require ($rep.$tViews['error']);
      require ($rep.$tViews['article']);
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
    require ($rep.$tViews['article']);
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
        require ($rep.$tViews['article']);
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
      require ($rep.$tViews['article']); 
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
      require ($rep.$tViews['home']);
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
    require ($rep.$tViews['home']);
  }

  function search_news(array &$tErrors) {
    global $rep,$tViews, $rowSearch;

    $search=$_RESQUEST['q'];
    Validation::val_search_title($search, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'
    if(count($tErrors)>0){
      require ($rep.$tViews['search']);
      require ($rep.$tViews['error']);
      return;
    }

    $model_news = new NewsModel();

    try{
      $data=$model_news->findById($id_news); //if there is an exception, it is catched by the case exception in the 'case try'

      $rowSearch = array (
        'picture_name' => $data->getTitle(),
        'news_description_cut' => $data->getDescription(),
        'news_date' => $data->getDate(),
        'news_pseudo' => $data->getAuthor()->getPseudo(),
      );
    }catch(\Exception $e){
      $tErrors[] = $e->getMessage();
      require ($rep.$tViews['search']);
      require ($rep.$tViews['error']);
    }       
    require ($rep.$tViews['search']);
  }

}
?>

