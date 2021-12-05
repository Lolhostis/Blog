<!DOCTYPE html>
<html>
    <head>
        <title>Testing User's form'</title>
    </head>
    <body>
        <form method="POST">
           <p>Login : <input type="TEXT" name="login_user" value="<?php=$_POST['login_user']??""?>" required/></p>
		   <p>Password : <input type="PASSWORD" name="password_user" value=""/></p>
		   <p>Email : <input type="EMAIL" name="email_user" value="<?php=$_POST['email_user']??""?>"/></p>
		   <p>
		   	Is an admin :</br>
		   	<label><input type="RADIO" name="isadmin_user" value=1/>Yes</label>
		   	<label><input type="RADIO" name="isadmin_user" value=0 checked/>No</label>
		   </p>
		   <p>Id of the profile picture : <input type="INT" name="id_picture_user" value="<?php=$_POST['id_picture_user']??""?>"/></p>
           <p><input type="SUBMIT" name="action" value="get_user"/></p>
           <p><input type="SUBMIT" name="action" value="add_user"/></p>
           <p><input type="SUBMIT" name="action" value="delete_user"/></p>
           <p><input type="RESET" /></p>

        <div>
            <p>Results :</p>
            <p><?php=$notification?></p>
            <p>Login : <?php=$row_user['res_login_user']??""?> </p>
           <p>Password : <?php=$row_user['res_password_user']??""?></p>
           <p>Email : <?php=$row_user['res_email_user']??""?></p>
           <p> Is an admin :</br>
            <label><input type="RADIO" name="isadmin_user" value=<?php=if($row_user['res_isadmin_user']==true)??""?>/>Yes</label>
            <label><input type="RADIO" name="isadmin_user" value=<?php=if($row_user['res_isadmin_user']==false)??""?> />No</label>
           </p>
           <p>Id of the profile picture : <?php=$row_user['res_id_picture_user']??""?></p>
        </div>
        </form>
    </body>
</html>
