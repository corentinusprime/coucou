<?php
// essaie de faire le code qui est dans le bloc try
try {
    //se connecte à la base de données et stocke la connection dans dans $dbh
    $dbh = new PDO('mysql:host=localhost;dbname=phpcours', 'login4443', 'bbOHElvPTZMUuGY');
} catch (PDOException $e) {
    //comme la connection n'a pas fonctionné je stocke null dans $dbh
    $dbh= null;
}

?>