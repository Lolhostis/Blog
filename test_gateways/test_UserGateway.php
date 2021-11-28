<?php
  require_once('../Jobs/Picture.php');
  require_once('../Jobs/User.php');
  require_once('../Gateways/UserGateway.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Testing UserGateway</title>
        </style>
    </head>
    <body>
        <form method="POST" action="test_CommentGateway.php">
            <p>Pseudo : <input type="TEXT" name="id" value=""/></p>
            <p>Password : <input type="password" name="date" value=""/></p>
            <p>Email : <input type="email" name="content" value=""/></p>
            <p>Is_admin :
              <div class="myStyle">
                <input name="isAdmin" type="radio">
                  <label>Yes</label><br>
                  <input name="isAdmin" type="radio" checked>
                  <label>No</label><br>
                  <br><br>
                </input>
              </div>
            </p>


            <p><input type="SUBMIT" name="action" value="Create instance"/></p>
            <p><input type="SUBMIT" name="action" value="Consult BDD"/></p>
            <input type="reset">
        </form>


        <?php
            if( isset($_POST['id']) ) {
            $cgw = new CommentGateway();
            if( $_POST['action']=="Create instance" ) {
              $p = new Picture($_POST['id_picture']);
              $u = new User("panda_masque", "chatonchaton", $p);
              $c = new Comment($_POST['id'], $_POST['content'], $_POST['date'], "", $u);
              $n = new News("1", "news de test 1", $_POST['date'], "titre de la news 1", $u);
              $cgw->insert_comment($c, $n);
        }
        if( $_POST['action']=="Consulter BDD" ) {
          //require('consultation.php');
        }
        $_POST = [];
            }
        ?>
    </body>
</html>




 public function showListUsers(){
    echo "Users list : \n"
    foreach ($userList as $ligne) {
      $tUsers[] = $ligne;
        foreach ($ligne as $champ) {
          echo $champ . "\t";
        }
      echo "\n";
    }
  }

try {
  $con = new Connection($dsn, $user, $password);

  $tUsers = new array();

  $usergt = new UserGateway($con);

  //Addition of 3 users
  $profile_picture = new Picture(1);
  $myUser = new User('bob_l_eponge', '123', $profile_picture, false);
  Array $userList = $usergt.insert($myUser);
  showListUsers();

  $profile_picture2 = new Picture(2);
  $myUser2 = new User('dark_sasuke', 'rdgf', $profile_picture2, false);
  Array $userList = $usergt.insert($myUser2);
  showListUsers();

  $profile_picture3 = new Picture(3, "../Views/Resources/Pictures/heart.jpg", "Une patate");
  $myUser3 = new User('Chpatata', 'ChpatataLaBest<3', $profile_picture3, true, "chapatata.labest@sfr.fr");
  Array $userList = $usergt.insert($myUser3);
  showListUsers();

  //A user is updated
  $oldLogin = $myUser2->getPseudo();
  $myUser2->setPseudo("Aranude");
  Array $userList = $usergt.update($myUser2->getPseudo(),$ myUser2);
  showListUsers();

  //A user is deleted
  Array $userList = $usergt.delete($myUser2->getPseudo());
  showListUsers();
}

?>
