<!DOCTYPE html>
<html>
    <head>
        <title>Testing Comment's form</title>
    </head>
    <body>
        <form method="POST" action="../comment_controler.php">
		   <h1>consult & add comment</h1>
            <p>id of the comment: <input type="INT" name="id_comment" value="<?php=$_POST['id_comment']?>" required/></p>
            <p>text : <input type="TEXT" name="text_comment" value="<?php=$_POST['text_comment']?>"/></p>
            <p>date : <input type="DATE" name="date_comment" value="<?php=$_POST['date_comment']?>"/></p>
            <p>login of the user : <input type="TEXT" name="login_user_comment" value="<?php=$_POST['login_user_comment']?>"/></p>
            <p>id of the corresponding news : <input type="INT" name="id_news_comment" value="<?php=$_POST['id_news_comment']?>"/></p>
            <p><input type="SUBMIT" name="action" value="get_comment"/></p>
            <p><input type="SUBMIT" name="action" value="add_comment"/></p>
            <p><input type="SUBMIT" name="action" value="delete_comment"/></p>
        </form>

        <div>
            <p>Results :</p>
            <p>Id of the comment : <?php=$row_comment['res_id_comment']?></p>
            <p>Text : <?php=$row_comment['res_uri_picture']?></p>
            <p>Date : <?php=$row_comment['res_alt_picture']?></p>
            <p>Login of the user : <?php=$row_comment['res_alt_picture']?></p>
            <p>Id of the corresponding news : <?php=$row_comment['res_alt_picture']?></p>
            <img src="source_uri_picture" placeholder="placeholder_alt_picture"/>
        </div>
    </body>
</html>
