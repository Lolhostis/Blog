<!DOCTYPE html>
<html>
    <head>
        <title>Testing User's form'</title>
    </head>
    <body>
        <form method="POST">
           <p>Login : <input type="TEXT" name="login_user" value="<?=$_POST['login_user']??""?>" required/></p>
		   <p>Password : <input type="PASSWORD" name="password_user" value=""/></p>
		   <p>Email : <input type="EMAIL" name="email_user" value="<?=$_POST['email_user']??""?>"/></p>
		   <p>
		   	Is an admin :</br>
		   	<label><input type="RADIO" name="isadmin_user" value=1/>Yes</label>
		   	<label><input type="RADIO" name="isadmin_user" value=0 checked/>No</label>
		   </p>
		   <p>Id of the profile picture : <input type="INT" name="id_picture_user" value="<?=$_POST['id_picture_user']??""?>"/></p>
           <p><input type="SUBMIT" name="action" value="get_user"/></p>
           <p><input type="SUBMIT" name="action" value="add_user"/></p>
           <p><input type="SUBMIT" name="action" value="delete_user"/></p>
           <p><input type="RESET" /></p>


            <div>
                <?php if( isset($row_user) && !empty($row_user) )
                {
                ?>
                    <p>Results :</p>
                    <?php if( isset($_POST['action']) && $_POST['action']=="get_user" )
                        {
                    ?>
                        <p>Login : <?= $row_user['res_login_user'] ?? "" ?></p>
                        <p>Password : <?= $row_user['res_password_user'] ?? "no text" ?></p>
                        <p>Email : <?= $row_user['res_email_user'] ?? "" ?></p>
                        <p>Is an admin : <?= $row_user['res_isadmin_user'] ? "Yes" : "No" ?></p>
                        <p>Id of the profile picture : <?= $row_user['res_id_picture_user'] ?? "" ?></p>
                    <?php
                    }
                    else if( isset($_POST['action']) && $_POST['action']=="add_user" )
                    {
                    ?>
                        <p>Result Insert : <?= $row_user['res_insert'] ?? "" ?></p>
                    <?php
                    }
                    else if( isset($_POST['action']) && $_POST['action']=="delete_user" )
                    {
                    ?>
                        <p>Result Delete : <?= $row_user['res_delete'] ?? "" ?></p>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
            </div>
        </form>
    </body>
</html>
