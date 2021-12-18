
<!DOCTYPE html>
<html>
    <head>
        <title>Testing Picture's form</title>
    </head>
    <body>

        <form method="POST">
            <h1>Consult & add Picture</h1>
            <p>Id : <input type="INT" name="id_picture" value="<?php echo $_POST['id_picture']??""?>" required/></p>
            <p>Uri : <input type="TEXT" name="uri_picture" value="<?php echo $_POST['uri_picture']??""?>"/></p>
            <p>Alt : <input type="TEXT" name="alt_picture" value="<?php echo $_POST['alt_picture']??""?>"/></p>
            <p><input type="SUBMIT" name="action" value="get_picture"/></p>
            <p><input type="SUBMIT" name="action" value="add_picture"/></p>
            <p><input type="SUBMIT" name="action" value="delete_picture"/></p>
            <p><input type="RESET" /></p>
            <a href="index.php">
		        Main menu
		    </a>
        </form>

        <div>
            <?php if( isset($row_picture) && !empty($row_picture) )
            {
            ?>
                <?php if( isset($_POST['action']) && $_POST['action']=="get_picture" )
                {
                ?>
                    <p>Id : <?= $row_picture['res_id_picture'] ?? "" ?></p>
                    <p>Uri : <?= $row_picture['res_uri_picture'] ?? "no uri" ?></p>
                    <p>Alt : <?= $row_picture['res_alt_picture'] ?? "no alt" ?></p>

                    <?php if( isset($row_picture['res_uri_picture']) && !empty($row_picture['res_uri_picture']) )
                    {
                    ?>
                        <img src="<?= $row_picture['res_uri_picture'] ?>" placeholder="<?=$row_picture['res_alt_picture'] ?? "" ?>"/>
                    <?php
                    }
                    ?>

                <?php
                }
                else if( isset($_POST['action']) && $_POST['action']=="add_picture" )
                {
                ?>
                    <p>Result Insert : <?= $row_picture['res_insert'] ?? "" ?></p>
                <?php
                }
                else if( isset($_POST['action']) && $_POST['action']=="delete_picture" )
                {
                ?>
                    <p>Result Delete : <?= $row_picture['res_delete'] ?? "" ?></p>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </div>
    </body>
</html>
