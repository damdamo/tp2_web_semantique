<?php
	include_once('semsol/ARC2.php'); /* ARC2 static class inclusion */ 

	$dbpconfig = array(
	"remote_store_endpoint" => "http://ub414.duckdns.org:8080/rdf4j-workbench/repositories/tp2_damien/query",
	);

	$store = ARC2::getRemoteStore($dbpconfig); 

	if ($errs = $store->getErrors()) {
		echo "<h1>getRemoteSotre error<h1>" ;
	}

	$query = '
		PREFIX : <http://megeve.com/>
		PREFIX P: <http://megeve.com/location/>
		PREFIX R: <http://megeve.com/Restaurant/>
		PREFIX H: <http://megeve.com/Hotels/>
		PREFIX rdf:      <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs:     <http://www.w3.org/2000/01/rdf-schema#>
		select distinct ?points ?long ?lat
		where {  
		
			?points a :Point.
			?points :lon ?long.
			?points :lat ?lat.
		}
		limit 100
	';


	$rows = $store->query($query, 'rows'); /* execute the query */
	
	if ($errs = $store->getErrors()) {
		echo "Query errors" ;
		print_r($errs);
	}

	print "<p> Les points à moins de ".$_POST["distanceMax"]." km sont: </p>";
	
	/* display the results in an HTML table */
	echo "<table border='1'>" ;
	print "<tr>
       <th>Points</th>
	   <th>Longitude</th>
	   <th>Latitude</th>
   </tr>
	";
	/* loop for each returned row */
	foreach( $rows as $row ) { 
		print "<tr>
			<td>" .$row['points'] . "</td>
			<td>" .$row['long'] . "</td>
			<td>" .$row['lat'] . "</td>
		</tr>";
	}
	echo "</table>"
	
?>

<br/><input type="button" name="pagePrincipale" value="Revenir sur la page principale" onclick="self.location.href='siteWeb.php'"> 
