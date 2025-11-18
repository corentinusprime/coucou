<?php
    //fonction qui permet d'afficher le contenu d'une variable y compris les tableaux
    //var_dump($_GET);
     require_once 'header.php';
     require_once 'db/mariadb.php';
?>
<?php
if($dbh!=null){

//vérifie si la clé 'page' existe dans le tableau $_GET
    if(isset($_GET['page'])){
        //récupère la valeur qui correspond à la clé dans $_GET
        $page=$_GET['page'];
    }
    else{
        //si la clé 'page' n'existe pas, nous irons sur la page 'home'
        $page='home';
    }
   //si le fichier php de la page existe, 
    if(file_exists($page.'.php')){
        //on l'appelle
        require_once $page.'.php';
    }
    else{
        //sinon on appelle la page 'error404'
        require_once 'error404.php';   
    }
}else{
    require_once 'maintenance.php';
}

?>

<?php
    require_once 'footer.php';
?>