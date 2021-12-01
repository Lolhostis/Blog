<!DOCTYPE html>
<html>
    <head>
        <title>Testing UserModel</title>
    </head>
    <body>
        <form method="POST" action="test_UserModel.php">
		   <h1>Consult User</h1>
            <p>Login of the user : <input type="TEXT" name="login_user" value=""/></p>
            <p><input type="SUBMIT" name="action" value="Get user"/></p>
        </form>
		<form method="POST" action="test_UserModel.php">
		   <h1>Add User</h1>
           <p>Login : <input type="TEXT" name="login_user" value=""/></p>
		   <p>Password : <input type="PASSWORD" name="password" value=""/></p>
		   <p>Email : <input type="EMAIL" name="email" value=""/></p>
		   <p>
		   	Is an admin :</br>
		   	<label><input type="RADIO" name="isadmin" value=1/>Yes</label>
		   	<label><input type="RADIO" name="isadmin" value=0 checked/>No</label>
		   </p>
		   <p>Id of the profile picture : <input type="TEXT" name="id_picture" value=""/></p>
           <p><input type="SUBMIT" name="action" value="Add user"/></p>
        </form>
    </body>
</html>
