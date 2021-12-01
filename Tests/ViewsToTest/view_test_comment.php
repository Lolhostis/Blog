<!DOCTYPE html>
<html>
    <head>
        <title>Testing CommentModel</title>
    </head>
    <body>
        <form method="POST" action="test_CommentModel.php">
		   <h1>Consult comment</h1>
            <p>id of the comment: <input type="TEXT" name="id_comment" value=""/></p>
            <p><input type="SUBMIT" name="action" value="Get comment"/></p>
        </form>
		<form method="POST" action="test_CommentModel.php">
		   <h1>Add Comment</h1>
            <p>id : <input type="TEXT" name="id_comment" value=""/></p>
		   <p>text : <input type="TEXT" name="text" value=""/></p>
		   <p>date : <input type="DATE" name="date" value=""/></p>
		   <p>login of the user : <input type="TEXT" name="login_user" value=""/></p>
		   <p>id of the corresponding news : <input type="TEXT" name="id_news" value=""/></p>
            <p><input type="SUBMIT" name="action" value="Add comment"/></p>
        </form>
    </body>
</html>
