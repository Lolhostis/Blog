<?php
    require_once('../Config/Validation.php');
    require_once('../Jobs/Comment.php');
    require_once('../Jobs/News.php');
    require_once('../Jobs/Picture.php');
    require_once('../Jobs/User.php');
    require_once('../Models/CommentModel.php');
    require_once('../Config/Connexion.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Testing CommentModel</title>
    </head>
    <body>
        <form method="POST" action="test_CommentModel.php">
		   <h1>Consult comment</h1>
            <p>id of the comment: <input type="TEXT" name="id_comment" value=""/></p>
            <p><input type="SUBMIT" name="action" value="Get comment"/></p>
        </form>
		<form method="POST" action="test_CommentModel.php">
		   <h1>Add Comment</h1>
            <p>id : <input type="TEXT" name="id_comment" value=""/></p>
		   <p>text : <input type="TEXT" name="text" value=""/></p>
		   <p>date : <input type="TEXT" name="date" value=""/></p>
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
				$cmodel = new CommentModel();
				
				if( $_POST['action']=="Get comment" ) {
					$comment = $cmodel->findByIdBis($_POST['id_comment']);
					echo "Resulting Comment : ".$comment->toString()."</br>";
				}
				
				if( $_POST['action']=="Add comment" ) {

					if( $cmodel->addComment($_POST['id_comment'], $_POST['text'], $_POST['date'], $_POST['login_user'], $_POST['id_news']) ) {
						echo "Success</br>";
					}
					else {
						echo "Failure</br>";
					}
					$_POST = [];
				}
            }
        ?>
    </body>
</html>
