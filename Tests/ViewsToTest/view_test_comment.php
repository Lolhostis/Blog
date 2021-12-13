<!DOCTYPE html>
<html>
    <head>
        <title>Testing Comment's form</title>
    </head>
    <body>
        <form method="POST">
		   <h1>Consult & add Comment</h1>
            <p>id of the comment: <input type="INT" name="id_comment" value="<?=$_POST['id_comment']??""?>" required/></p>
            <p>text : <input type="TEXT" name="text_comment" value="<?=$_POST['text_comment']??""?>"/></p>
            <p>date : <input type="DATETIME-LOCAL" name="date_comment" value="<?=$_POST['date_comment']??""?>"/></p>
            <p>login of the user : <input type="TEXT" name="login_user_comment" value="<?=$_POST['login_user_comment']??""?>"/></p>
            <p>id of the corresponding news : <input type="INT" name="id_news_comment" value="<?=$_POST['id_news_comment']??""?>"/></p>
            <p><input type="SUBMIT" name="action" value="get_comment"/></p>
            <p><input type="SUBMIT" name="action" value="add_comment"/></p>
            <p><input type="SUBMIT" name="action" value="delete_comment"/></p>
            <p><input type="RESET" /></p>
        </form>

        <div>
            <?php if( isset($row_comment) && !empty($row_comment) )
            {
            ?>
                <p>Results :</p>
                <?php if( isset($_POST['action']) && $_POST['action']=="get_comment" )
                {
                ?>
                    <p>Id : <?= $row_comment['res_id_comment'] ?? "" ?></p>
                    <p>Text : <?= $row_comment['res_text_comment'] ?? "no text" ?></p>
                    <p>Date : <?= $row_comment['res_date_comment'] ?? "" ?></p>
                    <p>User Login : <?= $row_comment['res_login_user_comment'] ?? "" ?></p>
                    <!-- <p>Id associated news : <?= $row_comment['res_id_news_comment'] ?? "" ?></p> -->
                <?php
                }
                else if( isset($_POST['action']) && $_POST['action']=="add_comment" )
                {
                ?>
                    <p>Result Insert : <?= $row_comment['res_insert'] ?? "" ?></p>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </div>
        
    </body>
</html>
