  <?php
  require_once('../Jobs/Comment.php');
  require_once('../Jobs/News.php');
  require_once('../Jobs/Picture.php');
  require_once('../Jobs/User.php');
  require_once('../Models/PictureModel.php');
  require_once('../Config/Connexion.php');
  require_once('../Config/Validation.php');

//namespace controleur;

class PictureControler {

  function __construct() {
    //global $rep,$vues;
    session_start();

    //initialization of an array of errors
    $TErrors = array();

    try{
      $action=$_REQUEST['action'];

      switch($action) {
        case NULL:
          $this->Reinit();
        break;

        case "get_picture":
          $this->get_picture($TErrors);
        break;

        case "add_picture":
          $this->add_picture($Terrors);
        break;

        case "delete_picture":
          $this->delete_picture($Terrors);
        break;

        default:
          $Terrors[] =  "No php view";
         // require ($rep.$vues['vuephp1']);
          break;
      }

    } catch (PDOException $e){
      $Terrors[] =  "Unexpected error";
      // require ($rep.$vues['erreur']);
    }catch (Exception $e2){
      $Terrors[] =  "Unexpected error";
      // require ($rep.$vues['erreur']);
    }

    exit(0);
  }

  function Reinit() {
 // global $rep,$vues;

    $row_picture = array ();
   // require ($rep.$vues['vuephp1']);
  }

  function get_picture(array $tErrors) {
   // global $rep,$vues;

    $id_picture=$_POST['id_picture'];
    // \config\Validation::val_form($nom,$age,$tViewError);
    ..\Config\Validation::val_form_picture_consult($id_picture, $tErrors);

    if(tErrors.count()==0){
      $model_picture = new \models\PictureModel();
      try{
        $data=$model_picture->findById($id_picture);
      }catch(Exception e){
        tErrors[] = $exception->getMessage().'</br>'.$exception->getLine().'</br>'.$exception->getFile() . "<br/>";
        //error view
      }

      $row_picture = array (
        'res_id_picture' => $id_picture,
        'res_uri_picture' => $data->getUri(),
        'res_alt_picture' => $data->getAlt(),
        'data' => $data,
      );
      //require ($rep.$vues['vuephp1']);
    }
    //error view
  }

  function add_picture(array $tErrors) {
   // global $rep,$vues;

    $id_picture=$_POST['id_picture'];
    $uri_picture=$_POST['uri_picture'];
    $alt_picture=$_POST['alt_picture'];
    // \config\Validation::val_form($nom,$age,$tViewError);
    ..\Config\Validation::val_form_picture_add($id_picture, $uri_picture, $alt_picture, $tErrors);

    if(tErrors.count()==0){
      $model_picture = new \models\PictureModel();

      try{
        $result_insert=$model_picture->addPicture(new Picture($id_picture, $uri_picture, $alt_picture));
      }catch(Exception e){
        tErrors[]= echo $exception->getMessage().'</br>'.$exception->getLine().'</br>'.$exception->getFile() . "<br/>";
        //error view
      }

      if($result_insert==true){
        $row_Picture = array (
          'res_id_picture' => "",
          'res_uri_picture' => "",
          'res_alt_picture' => "",
          'res_insert' => "Success"
        );
      }
      else{
        $row_Picture = array (
          'res_id_picture' => "",
          'res_uri_picture' => "",
          'res_alt_picture' => "",
          'res_insert' => "Failure"
        );
        tErrors[]="Can't add this picture";
        //error view
      }

      //require ($rep.$vues['vuephp1']);
    }
    else {
      //error view
    }
  }
}//fin class
?>


























