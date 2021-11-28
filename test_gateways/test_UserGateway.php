<?php
  require_once('../Jobs/Picture.php');
  require_once('../Jobs/User.php');
  require_once('../Gateway/UserGateway.php');

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
