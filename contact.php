<?php

if (isset($_POST['valider'])) {
    $sujet =htmlentities($_POST['sujet']);
    $email = $_POST['email'];
    $contenu =nl2br($_POST['contenu']);
    if (empty($sujet)) {
        echo 'Ecris un sujet ! <br> ';
    } else {
        echo "$sujet ";
    }
    if (empty($email)) {
        echo 'Ecris ton email !! <br> ';
    } else {
        echo "$email ";
    }
    if (empty($contenu)) {
        echo 'Ecris un contenu, tu le fais exprès ?! <br> ';
    } else {
        echo "$contenu ";
    }
    }
    if ((!empty($sujet)) && (!empty($email)) && (!empty($contenu))) {
        $sql = $dbh->prepare("INSERT INTO Contact( `sujet`, `email`, `contenu`) VALUES (:sujet, :email, :contenu)");
        $sql->bindParam(':sujet', $sujet, PDO::PARAM_STR);
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->bindParam(':contenu', $sujet, PDO::PARAM_STR);
        $r = $sql->execute();
        if($r){
          echo " Inscription réussie gg";
        }
        else{
          echo " Echec de l'inscription, la honte";
        }
    }
?>
<h1 class="text-primary text-center">Contact</h1>
    <div class="col-12 ">
    <form action="index.php?page=contact" method="post">
    <div>
      <label for="exampleInputPassword1" class="form-label mt-4">Sujet</label>
      <input name="sujet" type="sujet" class="form-control" id="exampleInputPassword1" placeholder="Sujet" autocomplete="off">
    </div>
    <div>
      <label for="exampleInputName" class="form-label mt-4">Email</label>
      <input name="email" type="text" class="form-control" id="exampleInputPassword1" placeholder="Adresse mail" autocomplete="off">
    </div>
    <div>
      <label for="exampleInputFirstName" class="form-label mt-4">Contenu</label>
      <textarea name="contenu" type="textearea" class="form-control" id="exampleInputPassword1" placeholder="Parle de ce que tu veux en rapport avec ton sujet ^^" autocomplete="off" rows="10"></textarea>
    </div>
</div>
</div>
    <button name=valider type="submit" class="btn btn-primary mt-4">Valider</button>
</div>
</form>
