<?php

if (isset($_POST['valider'])) {
    //var_dump($_POST);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $radio = $_POST['radio'];
    if (empty($email)) {
        echo 'Ecris un mail stp. <br> ';
    } else {
        echo "$email ";
    }
    if (empty($password)) {
        echo 'Ecris un mot de passe ! <br> ';
    } else {
        echo "$password ";
    }
    if (empty($nom)) {
        echo 'Ecris un nom !! <br> ';
    } else {
        echo "$nom ";
    }
    if (empty($prenom)) {
        echo 'Ecris un prénom, tu le fais exprès ?! <br> ';
    } else {
        echo "$prenom ";
    }
    if (empty($radio)) {
        echo 'COCHE LA CASE !!! <br> ';
    } else {
        echo "$radio";
    }
    //on protège l'inscription en vérifiant que les données ne sont pas vides 
    if ((!empty($email)) && (!empty($password)) && (!empty($nom)) && (!empty($prenom))) {
      //on prépare une requête d'insertion qui associe une colonne de la table avec une donnée 
        $sql = $dbh->prepare("INSERT INTO user(`nom`, `prenom`, `email`, `password`) VALUES (:nom, :prenom, :email, :password)");
        //j'associe une variable de la requête avec une variable php en précisant son type
        $sql->bindParam(':nom', $nom, PDO::PARAM_STR);
        $sql->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->bindParam(':password', $password, PDO::PARAM_STR);
        //j'execute la requête préparée et je mets le résultat dans $r
        $r = $sql->execute();
        //si $r = vrai, alors l'inscription est réussie
        if($r){
          echo " Inscription réussie gg";
        }
        else{
          echo " Echec de l'inscription, la honte";
        }
    }
}
?>
<h1 class="text-primary text-center">Inscription</h1>
    <div class="col-12 col-md-6">
    <form action="index.php?page=signup" method="post">
    <div>
      <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse mail">
    </div>
    <div>
      <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" autocomplete="off">
    </div>
    <div>
      <label for="exampleInputName" class="form-label mt-4">Nom</label>
      <input name="nom" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nom" autocomplete="off">
    </div>
    <div>
      <label for="exampleInputFirstName" class="form-label mt-4">Prénom</label>
      <input name="prenom" type="text" class="form-control" id="exampleInputPassword1" placeholder="Prénom" autocomplete="off">
    </div>
</div>
<div class="col-12 col-md-6">
      <legend class="mt-4">Genre</legend>
      <div class="form-check">
        <input name="radio" class="form-check-input" type="radio" name="optionsRadios" id="optionsRadios1" value="Homme " checked="">
        <label class="form-check-label" for="optionsRadios1">
            Homme
        </label>
      </div>
      <div class="form-check">
        <input name="radio" class="form-check-input" type="radio" name="optionsRadios" id="optionsRadios2" value="Femme ">
        <label class="form-check-label" for="optionsRadios2">
            Femme
        </label>
      </div>
      <div class="form-check disabled">
        <input name="radio" class="form-check-input" type="radio" name="optionsRadios" id="optionsRadios3" value="Autre">
        <label class="form-check-label" for="optionsRadios3">
          Autre
        </label>
      </div>
</div>
    <button name=valider type="submit" class="btn btn-primary mt-4">Se connecter</button>
</div>
</form>
