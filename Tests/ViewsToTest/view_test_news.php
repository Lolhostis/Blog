<!DOCTYPE html>
<html>
    <head>
        <title>Testing News's form</title>
    </head>
    <body>
        <form method="POST" action="../news_controler.php">
		   <h1>consult & add News</h1>
            <p>id of the news: <input type="INT" name="id_news" value="<?php=$_POST['id_news']?>"required/></p>
            <p>title : <input type="TEXT" name="title_news" value="<?php=$_POST['title_news']?>"/></p>
            <p>description : <input type="TEXT" name="description_news" value="<?php=$_POST['description_news']?>"/></p>
            <p>date : <input type="DATE" name="date_news" value="<?php=$_POST['date_news']?>"/></p>
            <p>login of the user : <input type="TEXT" name="login_user_news" value="<?php=$_POST['login_user_news']?>"/></p>
            <p><input type="SUBMIT" name="action" value="get_news"/></p>
            <p><input type="SUBMIT" name="action" value="add_news"/></p>
            <p><input type="SUBMIT" name="action" value="delete_news"/></p>
            <p><input type="RESET" /></p>
        </form>

        <div>
            <p>Results :</p>
            <p><?php=$notification?></p>
            <p>id of the news: <?php=$row_news['res_id_news']?></p>
            <p>title : <?php=$row_news['res_title_news']?></p>
            <p>description : <?php=$_POST['res_description_news']?></p>
            <p>date : <?php=$row_news['res_date_news']?></p>
            <p>login of the user : <?php=$row_news['res_login_user_news']?></p>
    </body>
</html>
