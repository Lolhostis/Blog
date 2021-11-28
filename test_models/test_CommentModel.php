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
            <p>id of the comment: <input type="TEXT" name="id_comment" value=""/></p>
            <p><input type="SUBMIT" name="action" value="Get comment"/></p>
        </form>


        <?php 
			/* Debug
            var_dump($_POST);
            echo "</br>";
            */
            if( isset($_POST['id_comment']) ) {
				$cmodel = new CommentModel();
				if( $_POST['action']=="Get comment" ) {
					$comment = $cmodel->findById($_POST['id_comment']);
					echo "Resulting Comment : ".$comment->toString()."</br>";
				}
				if( $_POST['action']=="Consulter BDD" ) {
					//require('consultation.php');
				}
				$_POST = [];
            }
        ?>
    </body>
</html>

