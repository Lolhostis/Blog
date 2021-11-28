<?php
    require_once('../Config/Validation.php');
    require_once('../Jobs/Comment.php');
    require_once('../Jobs/News.php');
    require_once('../Jobs/Picture.php');
    require_once('../Jobs/User.php');
    require_once('../Models/CommentModel.php');
    require_once('../Config/Connexion.php');
	require_once('../Config/Validation.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Testing NewsModel</title>
    </head>
    <body>
        <form method="POST" action="test_NewsModel.php">
		   <h1>Consult News</h1>
            <p>id of the news: <input type="TEXT" name="id_news" value=""/></p>
            <p><input type="SUBMIT" name="action" value="Get news"/></p>
        </form>
		<form method="POST" action="test_NewsModel.php">
		   <h1>Add News</h1>
            <p>id : <input type="TEXT" name="id_comment" value=""/></p>
		   <p>text : <input type="TEXT" name="text" value=""/></p>
		   <p>date : <input type="DATE" name="date" value=""/></p>
		   <p>login of the user : <input type="TEXT" name="login_user" value=""/></p>
		   <p>id of the corresponding news : <input type="TEXT" name="id_news" value=""/></p>
            <p><input type="SUBMIT" name="action" value="Add comment"/></p>
        </form>


        <?php 
			/* Debug
            var_dump($_POST);
            echo "</br>";
            */
            if( isset($_POST['action']) ) {
				$errors = "";
				$nmodel = new NewsModel();
				
				if( $_POST['action']=="Get news" ) {
					$news="";
					Validation::val_form_news_consult($_POST['id_news'], $errors);
					if( !empty($errors) ) {
						echo "NO VALID FORM !</br>".$errors."</br>";
					}
					try {
						$news = $nmodel->findByIdBis($_POST['id_comment']);
					}
					catch (Exception $exception) {
						echo $exception->getMessage().'</br>'.$exception->getLine().'</br>'.$exception->getFile() . "<br/>";
					}
					
					if( $comment!="" ) {
						echo "Resulting Comment : ".$comment->toString()."</br>";
					}
				}
				
				if( $_POST['action']=="Add comment" ) {
					
					Validation::val_form_comment_add($_POST['id_comment'], $_POST['text'], $_POST['date'], $_POST['login_user'], $_POST['id_news'],$errors);
					if( !empty($errors) ) {
						echo "NO VALID FORM !</br>".$errors."</br>";
					}
					else {
						try {
							if( $cmodel->addComment($_POST['id_comment'], $_POST['text'], $_POST['date'], $_POST['login_user'], $_POST['id_news']) ) {
								echo "Success</br>";
							}
							else {
								echo "Failure</br>";
							}
						}
						catch (Exception $exception) {
							echo $exception->getMessage().'</br>'.$exception->getLine().'</br>'.$exception->getFile() . "<br/>";
						}
					}
					$_POST = [];
				}
            }
        ?>
    </body>
</html>
