<!DOCTYPE html>
<html>
    <head>
        <title>Testing Picture's form</title>
    </head>
    <body>

		<form method="POST">
           <p>Id : <input type="INT" name="id_picture" value="<?php echo $_POST['id_picture']??""?>" required/></p>
		   <p>Uri : <input type="TEXT" name="uri_picture" value="<?php echo $_POST['uri_picture']??""?>"/></p>
		   <p>Alt : <input type="TEXT" name="alt_picture" value="<?php echo $_POST['alt_picture']??"Picture"?>"/></p>
           <p><input type="SUBMIT" name="action" value="get_picture"/></p>
           <p><input type="SUBMIT" name="action" value="add_picture"/></p>
            <p><input type="SUBMIT" name="action" value="delete_picture"/></p>
           <p><input type="RESET" /></p>
        </form>

        <div>
            <p>Results :</p>
            <p><?php=$notification?></p>
            <p>Id : <?php=$row_picture['res_id_picture']?></p>
           <p>Uri : <?php=$row_picture['res_uri_picture']?></p>
           <p>Alt : <?php=$row_picture['res_alt_picture']?></p>
           <p>Result Insert : <?php=$row_picture['res_insert']?></p>
           <img src="source_uri_picture" placeholder="placeholder_alt_picture"/>
        </div>
    </body>
</html>
