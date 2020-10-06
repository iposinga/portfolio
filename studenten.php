<!DOCTYPE html>
<?php 
include_once('db.php');

if(dbConnect())
{
   if(isset($_GET['klas']))
   { 
	 	if(isset($_GET['cl']))
	   		$sql = "SELECT * FROM studenten LEFT OUTER JOIN domeinen ON st_id = dom_stid WHERE st_klas='".$_GET['klas']."' AND st_cluster='".$_GET['cl']."' ORDER BY st_achternaam";
		else
			$sql = "SELECT * FROM studenten LEFT OUTER JOIN domeinen ON st_id = dom_stid WHERE st_klas='".$_GET['klas']."' ORDER BY st_achternaam";
	}
	else 
		$sql = "SELECT * FROM studenten LEFT OUTER JOIN domeinen ON st_id = dom_stid ORDER BY st_klas, st_achternaam";
    dbQuery($sql);
    $domeinnamen = dbGetAll();
}
?>
<html lang="nl">
<head>
    <title>OSD's studenten</title>
    <meta http-equiv="Content-Type" content="text/html charset=utf-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		Studenten portfoliopproject OSD
		<nav>
			<button onclick=location("studenten.php?klas=B-ITA4-1a")>klas 1a</button><a href="studenten.php?klas=B-ITA4-1a&cl=CL1">cluster 1a-cl1</a><a href="studenten.php?klas=B-ITA4-1a&cl=CL2">cluster 1a-cl2</a><br>
			<a href="studenten.php?klas=B-ITA4-1b">klas 1b</a><a href="studenten.php?klas=B-ITA4-1b&cl=CL1">cluster 1a-cl1</a><a href="studenten.php?klas=B-ITA4-1b&cl=CL2">cluster 1b-cl2</a>
		</nav>
	</header>
	<section class="breed">
		<table border="0">
			<tr>
				<th></th>
				<th class="text-left">Klas</th>
				<th class="text-left">Cluster</th>
				<th class="text-left">Achternaam</th>
				<th class="text-left">Voornaam</th>
				<th class="text-left">Domein</th>
				<th class="text-left">Domeinnaam-provider</th>
			</tr>
			<tr>
				<td class="text-right">0.</td>
				<td colspan="2">docent</td>
				<td>Osinga</td>
				<td>Ids</td>
				<td><a href="http://www.idsosd.nl" target="_blank">idsosd.nl</a></td>
				<td>hostnet</td>
			</tr>
<?php	
	$teller=0;	
	while($teller < count($domeinnamen))
	{
		$nr=$teller+1;
		echo "<tr>";
		echo "<td class='text-right'>".$nr.". </td>";
		echo "<td>".$domeinnamen[$teller]['st_klas']."</td>";
		echo "<td>".$domeinnamen[$teller]['st_cluster']."</td>";
		echo "<td>".$domeinnamen[$teller]['st_achternaam']."</td>";
		echo "<td>".$domeinnamen[$teller]['st_roepnaam']." ".$domeinnamen[$teller]['st_tussenv']."</td>";
		echo "<td><a href='http://www.".$domeinnamen[$teller]['dom_domein']."' target='_blank'>".$domeinnamen[$teller]['dom_domein']."</a></td>";
		echo "<td>".$domeinnamen[$teller]['dom_provider']."</td>";
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