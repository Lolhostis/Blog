<?php
namespace Controllers;
use \Models\UserModel;
use  \Config\Validation;

/**
  /** \author L'HOSTIS Loriane
  /** \date 23/12/2021
  /** \file UserController.php
  /** \namespace Controllers
*/


/** \class Controller of users UserController.php
*/
class UserController {

   /** Constructor of the User controller
    */
  function __construct(array &$tErrors, string $action) {
    global $rep,$tViews;

    try{
      $action= isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;

      switch($action) {
        case NULL:
          $this->Reinit();
          break;

        case "get_user":
          $this->get_user($tErrors);
        break;

        case "add_user":
          $this->add_user($tErrors);
        break;

        case "delete_user":
          $this->delete_user($tErrors);
        break;

        default:
          //We normally won't go there
          // as the action has been verified in the front controller
          $tErrors[] = "No php control for action : ".$action;
          require ($rep.$tViews['error']);
      }

    } catch (\PDOException $e){
      $tErrors[] =  $e->getMessage();
       require ($rep.$tViews['error']);
    }catch (\Exception $e){
      $tErrors[] =  $e->getMessage();
      require ($rep.$tViews['error']);
    }

    exit(0);
  }

  function Reinit() {
  global $rep,$tViews;

    $row_user = array ();
    require ($rep.$tViews['view_test_user']);
  }

   /** This function return informations about a user from the database
    * \param[in, out] tErrors Array of errors
    */
  function get_user(array &$tErrors) {
    global $rep,$tViews;

    $login_user=$_POST['login_user'];
    Validation::val_form_user_consult($login_user, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'
    if(count($tErrors)>0){
      require ($rep.$tViews['error']);
      require ($rep.$tViews['sign_in']);
      return;
    }

    $model_user = new UserModel();

    try{
      $data=$model_user->findByLogin($login_user); //if there is an exception, it is catched by the case exception in the 'case try'

      $row_user = array (
        'res_login_user' => $login_user,
        'res_password_user' => $data->getPassword(),
        'res_email_user' => $data->getEmail(),
        'res_isadmin_user' => $data->getIsAdmin(),
        'res_id_picture_user' => $data->getPicture()->getId(),
      );
    }catch(\Exception $e){
      $tErrors[] = $e->getMessage();
      require ($rep.$tViews['error']);
      require ($rep.$tViews['sign_in']);
      return;
    }       
    require ($rep.$tViews['home']);      
  }

       /** This function delete a user from the database
    * \param[in, out] tErrors Array of errors
    */
    function delete_user(array &$tErrors) {
      global $rep,$tViews;

      $login_user=$_POST['login_user'];
      Validation::val_form_user_consult($login_user, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'
      if(count($tErrors)>0){
        require ($rep.$tViews['error']);
        require ($rep.$tViews['view_test_user']);
        return;
      }

      $model_user = new UserModel();

      try{
        $result_delete = $model_user->deleteUser($login_user); //if there is an exception, it is catched by the case exception in the 'case try'
      
        if(!$result_delete){
          $tErrors[]="Errors to delete a user";
          require ($rep.$tViews['error']);
        }else{
          $row_user = array (
            'res_delete' => "User deleted"
          );
        }
      }catch(\Exception $e){
        $tErrors[] = $e->getMessage();
        require ($rep.$tViews['error']);
      }       
      require ($rep.$tViews['view_test_user']); 
    }

   /** This function add a user into the database
    * \param[in, out] tErrors Array of errors
    */
  function add_user(array &$tErrors) {
    global $rep,$tViews;

    $login_user=$_POST['login_user'];
    $password_user=$_POST['password_user'];
    $email_user=$_POST['email_user'];
    $isadmin_user=$_POST['isadmin_user'];
    $id_picture_user=$_POST['id_picture_user'];
    $isadmin_user = $_POST['isadmin_user'];
    Validation::val_form_user_add($login_user, $password_user, $email_user, $id_picture_user, $tErrors);
    if(count($tErrors)>0){
      require ($rep.$tViews['error']);
      require ($rep.$tViews['view_test_user']);
      return;
    }

    try{
        $model_user = new UserModel();

          if( $model_user->addUser($login_user, $password_user, $email_user, $isadmin_user, $id_picture_user) ) {
          $row_user = array (
            'res_insert' => "User added"
          ); 
        }
        else {
          $tErrors[] = "Errors to add a user";
          $row_user = array (
            'res_insert' => "No user added"
          ); 
        }
    }catch(\Exception $e){
      $tErrors[] = $e->getMessage();
      require ($rep.$tViews['error']);
    }       
    require ($rep.$tViews['view_test_user']); 
  }
}
?>
