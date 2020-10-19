<!DOCTYPE html>
<?php
include_once('db.php');

if(dbConnect())
{
    $sql = "SELECT * FROM logboek ORDER BY log_datum";
    dbQuery($sql);
    //de gevonden records worden in de array $logboekitems gezet; $logboekitems is een array met arrays; elke array in $logboekitems is een gevonden record uit de tabel logboek
    $logboekitems = dbGetAll();
    //$logboekitems[0] is het eerste record, $logboekitems[1] is het tweede record enz.
    //$logboekitems[0]['log_datum'] geeft de waarde van het veld 'log-datum' van het eerste record
}
?>
<html lang="nl">
<head>
    <title>OSD's logboek</title>
    <meta http-equiv="Content-Type" content="text/html charset=utf-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Logboek portfolioproject OSD</h1>
    <nav>
    </nav>
</header>
<section class="breed">
    <table border="0">
        <tr>
            <th class="text-left">Datum</th>
            <th class="text-left">Logboekitem</th>
        </tr>
        <?php
        $teller=0;
        while($teller < count($logboekitems))
        {
            echo "<tr>";
            echo "<td style='vertical-align: top'>".$logboekitems[$teller]['log_datum']."</td>";
            echo "<td>".nl2br($logboekitems[$teller]['log_item'])."</td>";
            echo "</tr>";
            $teller++;
        }
        ?>
    </table>
</section>
<footer>
</footer>
</body>
</html>
