<?php
if (isset($_POST['valider'])) {
    //var_dump($_POST);
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($email)){
      echo 'Ecris un mail ! ';
    }
    else{
      echo "$email ";
    }
    if(empty($password)){
      echo 'Ecris un mot de passe !! ';
    }
    else{
      echo "$password ";
    }
}


?>
<form action="index.php?page=connect" method="post">
  <h1 class = "text-center">Connexion</h1>
    <div>
      <label for="exampleInputEmail1" class="form-label mt-4">Adresse mail</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse mail" name="AdresseMail">
    </div>
    <div>
      <label for="exampleInputPassword1" class="form-label mt-4">Mot de passe</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" autocomplete="off" name="Password">
    </div>
    <div>
      <button name="valider" type="submit" class="btn btn-primary m-4">Connexion</button>
    </div>
</form>
