<!DOCTYPE html>
<html>
    <head>
        <title>Testing PictureModel</title>
    </head>
    <body>
        <form method="POST" action="test_PictureModel.php">
		   <h1>Consult Picture</h1>
            <p>id of the picture : <input type="INT" name="id_picture" value=""/></p>
            <p><input type="SUBMIT" name="action" value="Get picture"/></p>
        </form>
		<form method="POST" action="test_PictureModel.php">
		   <h1>Add Picture</h1>
           <p>Id : <input type="INT" name="id_picture" value=""/></p>
		   <p>Uri : <input type="TEXT" name="uri" value=""/></p>
		   <p>Alt : <input type="TEXT" name="alt" value=""/></p>
           <p><input type="SUBMIT" name="action" value="Add picture"/></p>
        </form>
    </body>
</html>
