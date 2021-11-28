<?php

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

    static function val_form_news_consult(string &$id, string &$errors) {
        if (!isset($id)||$id==""||!filter_var($id, FILTER_VALIDATE_INT)) {
            $errors = $errors."No valid id</br>";
            $id="";
        }
     }

     static function val_form_news_add(int $id, string $title, string $description, string $date, string $login_user, string $errors) {

        if (!isset($id)||$id==""||!filter_var($id, FILTER_VALIDATE_INT)) {
            $errors = $errors."No valid id</br>";
            $id="";
        }

        if (!isset($title)||$title=="") {
            $errors = $errors."No valid title</br>";
            $title="";
        }
        else {
            $title = filter_var($title, FILTER_SANITIZE_STRING);
        }


        if (!isset($description)||$description=="") {
            $errors = $errors."No valid description</br>";
            $description="";
        }
        else {
            $description = filter_var($description, FILTER_SANITIZE_STRING);
        }

        if (!isset($date)||$date=="") {
            $errors = $errors."No valid date</br>";
            $date="";
        }
        else {
            $date = filter_var($date, FILTER_SANITIZE_STRING);
        }

        if (!isset($login_user)||$login_user=="") {
            $errors = $errors."No valid login</br>";
            $login_user="";
        }
        else {
            $login_user = filter_var($login_user, FILTER_SANITIZE_STRING);
        }
    }

    static function val_form_user_consult(string &$login_user, string &$errors) {
        if (!isset($login_user)||$login_user=="") {
            $errors = $errors."No valid login</br>";
            $login_user="";
        }
        else {
            $login_user = filter_var($login_user, FILTER_SANITIZE_STRING);
        }
     }

    static function val_form_user_add(string $login_user, string $password, string $email, string $id_picture, string $errors) {
        if (!isset($login_user)||$login_user=="") {
            $errors = $errors."No valid login</br>";
            $login_user="";
        }
        else {
            $login_user = filter_var($login_user, FILTER_SANITIZE_STRING);
        }

        if (!isset($password)||$password=="") {
            $errors = $errors."No valid password</br>";
            $password="";
        }
        else {
            $password = filter_var($password, FILTER_SANITIZE_STRING);
        }

        if (!isset($email)||$email==""||!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors = $errors."No valid email</br>";
            $email="";
        }
        else {
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        }

        if (!isset($id_picture)||$id_picture==""||!filter_var($id_picture, FILTER_VALIDATE_INT)) {
            $errors = $errors."No valid id_picture</br>";
            $id_picture="";
        }
    }

	
	static function val_form_comment_consult(string &$id, string &$errors) {
        if (!isset($id)||$id==""||!filter_var($id, FILTER_VALIDATE_INT)) {
            $errors = $errors."No valid id</br>";
            $id="";
		}
	 }

    static function val_form_comment_add(string &$id, string &$text, string &$date, string &$login_user, string &$id_news,string &$errors) {
        if (!isset($id)||$id==""||!filter_var($id, FILTER_VALIDATE_INT)) {
            $errors = $errors."No valid id</br>";
            $id="";
        }

    	if (!isset($text)||$text=="") {
            $errors = $errors."No valid text</br>";
            $text="";
        }
    	else {
    		$text = filter_var($text, FILTER_SANITIZE_STRING);
    	}

        if (!isset($date)||$date=="") {
            $errors = $errors."No valid date</br>";
            $date="";
        }
    	else {
    		$date = filter_var($date, FILTER_SANITIZE_STRING);
    	}

    	if (!isset($login_user)||$login_user=="") {
            $errors = $errors."No valid login</br>";
            $login_user="";
        }
    	else {
    		$login_user = filter_var($login_user, FILTER_SANITIZE_STRING);
    	}

    	if (!isset($id_news)||$id_news==""||!filter_var($id_news, FILTER_VALIDATE_INT)) {
            $errors = $errors."No valid id_news</br>";
            $id_news="";
        }
    }

}
?>

        
