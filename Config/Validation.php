<?php
namespace Config;

class Validation {

	static function val_action($action) {
		if (!isset($action)) {
		throw new Exception('No action');
		// This is equivalent to:
		//$action =  if (isset($_GET['action'])) $action=$_GET['action']  else $action='no';
		//or to :
		//$action = $_GET['action'] ?? 'no';
		}
	}

    static function val_form_news_consult(string &$id, &$tErrors) {
        if (!isset($id)||$id==""||!filter_var($id, FILTER_VALIDATE_INT)) {
            $tErrors[] = "No valid id</br>";
            $id="";
            throw new \Exception("Invalid format news");
        }
    }

     static function val_form_news_add(int &$id, string &$title, string &$description, string &$date, string &$login_user, &$tErrors) {
        $numErrors = 0;

        if (!isset($id)||$id==""||!filter_var($id, FILTER_VALIDATE_INT)) {
            $tErrors[] = "No valid id</br>";
            $id="";
            $numErrors = $numErrors + 1;
        }

        if (!isset($title)||$title=="") {
            $tErrors[] = "No valid title</br>";
            $title="";
            $numErrors = $numErrors + 1;
        }
        else {
            $title = filter_var($title, FILTER_SANITIZE_STRING);
        }

        if (!isset($description)||$description=="") {
            $tErrors[] = "No valid description</br>";
            $description="";
            $numErrors = $numErrors + 1;
        }
        else {
            $description = filter_var($description, FILTER_SANITIZE_STRING);
        }

        if (!isset($date)||$date=="") {
            $tErrors[] = "No valid date</br>";
            $date="";
            $numErrors = $numErrors + 1;
        }
        else {
            $date = filter_var($date, FILTER_SANITIZE_STRING);
        }

        if (!isset($login_user)||$login_user=="") {
            $tErrors[] = "No valid login</br>";
            $login_user="";
            $numErrors = $numErrors + 1;
        }
        else {
            $login_user = filter_var($login_user, FILTER_SANITIZE_STRING);
        }

        if($numErrors>0) {
            throw new \Exception("Invalid format news");
        }

    }

    static function val_form_user_consult(string &$login_user, &$tErrors) {
        if (!isset($login_user)||$login_user=="") {
            $tErrors[] = "No valid login</br>";
            $login_user="";
            throw new Exception("Invalid format user");
        }
        else {
            $login_user = filter_var($login_user, FILTER_SANITIZE_STRING);
        }
     }

    static function val_form_user_add(string &$login_user, string &$password, string &$email, string &$id_picture, &$tErrors) {
        $numErrors = 0;
        if (!isset($login_user)||$login_user=="") {
            $tErrors[] = "No valid login</br>";
            $login_user="";
            $numErrors = $numErrors + 1;
        }
        else {
            $login_user = filter_var($login_user, FILTER_SANITIZE_STRING);
        }

        if (!isset($password)||$password=="") {
            $tErrors[] = "No valid password</br>";
            $password="";
            $numErrors = $numErrors + 1;
        }
        else {
            $password = filter_var($password, FILTER_SANITIZE_STRING);
        }

        if (!isset($email)||$email==""||!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $tErrors[] = "No valid email</br>";
            $email="";
            $numErrors = $numErrors + 1;
        }
        else {
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        }

        if (!isset($id_picture)||$id_picture==""||!filter_var($id_picture, FILTER_VALIDATE_INT)) {
            $tErrors[] = "No valid id_picture</br>";
            $id_picture="";
            $numErrors = $numErrors + 1;
        }

        if($numErrors>0) {
            throw new \Exception("Invalid format user");
        }
    }

	
	static function val_form_comment_consult(string &$id, &$tErrors) {
        if (!isset($id)||$id==""||!filter_var($id, FILTER_VALIDATE_INT)) {
            $tErrors[] = "No valid id</br>";
            $id="";
            throw new \Exception("Invalid format comment");
		}
	 }

    static function val_form_comment_add(string &$id, string &$text, string &$date, string &$login_user, string &$id_news, &$tErrors) {
        $numErrors = 0; 

        if (!isset($id)||$id==""||!filter_var($id, FILTER_VALIDATE_INT)) {
            $tErrors[] = "No valid id</br>";
            $id="";
            $numErrors = $numErrors +1;
        }

    	if (!isset($text)||$text=="") {
            $tErrors[] = "No valid text</br>";
            $text="";
            $numErrors = $numErrors +1;
        }
    	else {
    		$text = filter_var($text, FILTER_SANITIZE_STRING);
    	}

        if (!isset($date)||$date=="") {
            $tErrors[] = "No valid date</br>";
            $date="";
            $numErrors = $numErrors +1;
        }
    	else {
    		$date = filter_var($date, FILTER_SANITIZE_STRING);
    	}

    	if (!isset($login_user)||$login_user=="") {
            $tErrors[] = "No valid login</br>";
            $login_user="";
            $numErrors = $numErrors +1;
        }
    	else {
    		$login_user = filter_var($login_user, FILTER_SANITIZE_STRING);
    	}

    	if (!isset($id_news)||$id_news==""||!filter_var($id_news, FILTER_VALIDATE_INT)) {
            $tErrors[] = "No valid id_news</br>";
            $id_news="";
            $numErrors = $numErrors +1;
        }

        if($numErrors>0) {
            throw new \Exception("Invalid format comment");
        }
    }

    static function val_form_picture_consult(string &$id, &$tErrors) {
        if (!isset($id)||$id==""||!filter_var($id, FILTER_VALIDATE_INT)) {
            $tErrors[] = "No valid id</br>";
            $id="";
            throw new \Exception("Invalid format picture");
        }
    }

    static function val_form_picture_add(string &$id, string &$uri, string &$alt, &$tErrors) {
        $numErrors = 0; 

        if (!isset($id)||$id==""||!filter_var($id, FILTER_VALIDATE_INT)) {
            $tErrors[] = "No valid id";
            $id="";
            $numErrors = $numErrors +1;
        }

        if (!isset($uri)||$uri=="") {
            $tErrors[] = "No valid uri";
            $uri="";
            $numErrors = $numErrors +1;
        }
        else {
            $uri = filter_var($uri, FILTER_SANITIZE_STRING);
        }

        if (!isset($alt)||$alt=="") {
            $tErrors[] = "No valid alt";
            $alt="";
            $numErrors = $numErrors +1;
        }
        else {
            $alt = filter_var($alt, FILTER_SANITIZE_STRING);
        }

        if($numErrors>0) {
            throw new \Exception("Invalid format picture");
        }
    }
}
?>

        
