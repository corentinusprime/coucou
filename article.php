<?php
if (isset($_POST['valider'])) {
    $sujet =htmlentities($_POST['sujet']);
    $contenu =nl2br($_POST['contenu']);
    if (empty($sujet)) {
        echo 'Ecris un sujet stp. <br> ';
        $valideSujet=false;
    } else {
      if(strlen($sujet)>50){
        echo "Réduis ton texte ";
        $valideSujet=false;
      } else {
          echo "$sujet ";
          $valideSujet=true;
        }
    }
    if (empty($contenu)) {
        echo 'Ecris quelque chose ! <br> ';
    } else {
        echo "$contenu ";
    }
}    
    if($valideSujet && (!empty($contenu))) {
        $datePublication = date("Y-m-d H:i:s");
        $sql = $dbh->prepare("INSERT INTO article(`sujet`, `contenu`, `datePublication`) VALUES (:sujet, :contenu, :datePublication)");
        $sql->bindParam(':sujet', $sujet, PDO::PARAM_STR);
        $sql->bindParam(':contenu', $contenu, PDO::PARAM_STR);
        $sql->bindParam(':datePublication', $datePublication, PDO::PARAM_STR);
        $r = $sql->execute();
        if($r){
          echo " Envoie réussi gg";
        }
        else{
          echo " Echec de l'envoie, la honte";
        }
    }
    ?>
    <form action="index.php?page=article" method="post">
      <label for="exampleInputsujet" class="form-label mt-4">Sujet</label>
      <input name="sujet" type="sujet" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu veux parler de quoi ?">
    <div>
      <label for="exampleInputPassword1" class="form-label mt-4">Contenu</label>
      <textarea name="contenu" type="textearea" class="form-control" id="exampleInputPassword1" placeholder="Parle de ce que tu veux en rapport avec ton sujet ^^" autocomplete="off" rows="10"></textarea>
    </div>
    <button name=valider type="submit" class="btn btn-primary mt-4">Envoyer</button>
  </form> 