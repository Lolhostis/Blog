<!DOCTYPE html>
<html>
    <head>
        <title>Testing NewsModel</title>
    </head>
    <body>
        <form method="POST" action="test_NewsModel.php">
		   <h1>Consult News</h1>
            <p>id of the news: <input type="TEXT" name="id_news" value=""/></p>
            <p><input type="SUBMIT" name="action" value="Get news"/></p>
        </form>
		<form method="POST" action="test_NewsModel.php">
		   <h1>Add News</h1>
           <p>id : <input type="TEXT" name="id_news" value=""/></p>
		   <p>title : <input type="TEXT" name="title" value=""/></p>
		   <p>description : <input type="TEXT" name="description" value=""/></p>
		   <p>date : <input type="DATE" name="date" value=""/></p>
		   <p>login of the user : <input type="TEXT" name="login_user" value=""/></p>
           <p><input type="SUBMIT" name="action" value="Add news"/></p>
        </form>
    </body>
</html>
