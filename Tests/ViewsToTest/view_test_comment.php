<!DOCTYPE html>
<html>
    <head>
        <title>Testing Comment's form</title>
    </head>
    <body>
        <form method="POST">
		   <h1>consult & add comment</h1>
            <p>id of the comment: <input type="INT" name="id_comment" value="<?=$_POST['id_comment']?>" required/></p>
            <p>text : <input type="TEXT" name="text_comment" value="<?=$_POST['text_comment']?>"/></p>
            <p>date : <input type="DATE" name="date_comment" value="<?=$_POST['date_comment']?>"/></p>
            <p>hour : <input type="NUMBER" name="hour_comment" value="<?=$_POST['hour_comment']?>" min="0" max="23"/></p>
            <p>login of the user : <input type="TEXT" name="login_user_comment" value="<?=$_POST['login_user_comment']?>"/></p>
            <p>id of the corresponding news : <input type="INT" name="id_news_comment" value="<?=$_POST['id_news_comment']?>"/></p>
            <p><input type="SUBMIT" name="action" value="get_comment"/></p>
            <p><input type="SUBMIT" name="action" value="add_comment"/></p>
            <p><input type="SUBMIT" name="action" value="delete_comment"/></p>
            <p><input type="RESET" /></p>
        </form>

        <div>
            <p>Results :</p>
            <p><?=$notification?></p>
            <p>Id of the comment : <?=$row_comment['res_id_comment']?></p>
            <p>Text : <?=$row_comment['res_text_comment']?></p>
            <p>Date : <?=$row_comment['res_date_comment']?></p>
            <p>Hour : <?=$row_comment['res_hour_comment']?></p>
            <p>Login of the user : <?=$row_comment['res_login_user_comment']?></p>
            <p>Id of the corresponding news : <?=$row_comment['res_id_news_comment']?></p>
        </div>
    </body>
</html>
