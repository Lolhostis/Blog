<!DOCTYPE html>
<html> 
    <head>
        <title>Testing News's form</title>
    </head>
    <body>
        <form method="POST">
		   <h1>Consult & add News</h1>
            <p>id of the news: <input type="INT" name="id_news" value="<?=$_POST['id_news']??""?>"required/></p>
            <p>title : <input type="TEXT" name="title_news" value="<?=$_POST['title_news']??""?>"/></p>
            <p>description : <input type="TEXT" name="description_news" value="<?=$_POST['description_news']??""?>"/></p>
            <p>date : <input type="DATE" name="date_news" value="<?=$_POST['date_news']??""?>"/></p>
            <p>login of the user : <input type="TEXT" name="login_user_news" value="<?=$_POST['login_user_news']??""?>"/></p>
            <p><input type="SUBMIT" name="action" value="get_news"/></p>
            <p><input type="SUBMIT" name="action" value="add_news"/></p>
            <p><input type="SUBMIT" name="action" value="delete_news"/></p>
            <p><input type="RESET" /></p>
            <a href="index.php">
		        Main menu
		    </a>
        </form>


        <div>
            <?php if( isset($row_news) && !empty($row_news) )
            {
            ?>
                <p>Results :</p>
                <?php if( isset($_POST['action']) && $_POST['action']=="get_news" )
                {
                ?>
                    <p>Id : <?= $row_news['res_id_news'] ?? "" ?></p>
                    <p>Title : <?= $row_news['res_title_news'] ?? "no text" ?></p>
                    <p>Description : <?= $row_news['res_description_news'] ?? "" ?></p>
                    <p>Date : <?= $row_news['res_date_news'] ?? "" ?></p>
                    <p>Login of the user : <?= $row_news['res_login_user_news'] ?? "" ?></p>
                <?php
                }
                else if( isset($_POST['action']) && $_POST['action']=="add_news" )
                {
                ?>
                    <p>Result Insert : <?= $row_news['res_insert'] ?? "" ?></p>
                <?php
                }
                else if( isset($_POST['action']) && $_POST['action']=="delete_news" )
                {
                ?>
                    <p>Result Delete : <?= $row_news['res_delete'] ?? "" ?></p>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </div>
    </body>
</html>
