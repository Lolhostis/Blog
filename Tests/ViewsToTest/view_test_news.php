<!DOCTYPE html>
<html>
    <head>
        <title>Testing News's form</title>
    </head>
    <body>
        <form method="POST">
		   <h1>consult & add News</h1>
            <p>id of the news: <input type="INT" name="id_news" value="<?=$_POST['id_news']?>"required/></p>
            <p>title : <input type="TEXT" name="title_news" value="<?=$_POST['title_news']?>"/></p>
            <p>description : <input type="TEXT" name="description_news" value="<?=$_POST['description_news']?>"/></p>
            <p>date : <input type="DATE" name="date_news" value="<?=$_POST['date_news']?>"/></p>
            <p>login of the user : <input type="TEXT" name="login_user_news" value="<?=$_POST['login_user_news']?>"/></p>
            <p><input type="SUBMIT" name="action" value="get_news"/></p>
            <p><input type="SUBMIT" name="action" value="add_news"/></p>
            <p><input type="SUBMIT" name="action" value="delete_news"/></p>
            <p><input type="RESET" /></p>
        </form>

        <div>
            <p>Results :</p>
            <p><?=$notification?></p>
            <p>id of the news: <?=$row_news['res_id_news']?></p>
            <p>title : <?=$row_news['res_title_news']?></p>
            <p>description : <?=$_POST['res_description_news']?></p>
            <p>date : <?=$row_news['res_date_news']?></p>
            <p>login of the user : <?=$row_news['res_login_user_news']?></p>
    </body>
</html>
