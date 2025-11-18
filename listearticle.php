<h1>Liste des articles</h1>
<?php
$sql = 'SELECT sujet, contenu, datePublication FROM article ORDER BY datePublication desc';
echo "<table> <tr> <th>Sujet</th> <th>Date de publication</th> </tr>";
foreach ($dbh->query($sql) as $row) {
    echo "<tr> <td>";
    echo $row['sujet'] . "\t";
    echo "</td> <td>";
    echo $row['datePublication'] . "\t";
    echo "</td> </tr>";
}
echo "</table>";
?>