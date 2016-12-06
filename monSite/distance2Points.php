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
		SELECT DISTINCT ?long1 ?lat1 ?long2 ?lat2
		WHERE {

			'.$_POST["point1"].' :lon ?long1.
			'.$_POST["point1"].' :lat ?lat1.
		  
			'.$_POST["point2"].' :lon ?long2.
			'.$_POST["point2"].' :lat ?lat2.
			
		}
		limit 100
	';


	$rows = $store->query($query, 'rows'); /* execute the query */
	
	if ($errs = $store->getErrors()) {
		echo "Query errors" ;
		print_r($errs);
	}

	print "<p> On obtient les coordonnées de nos points </p>";
	
	/* display the results in an HTML table */
	echo "<table border='1'>" ;
	print "<tr>
       <th>Point 1 longitude</th>
	   <th>Point 1 latitude</th>
	   <th>Point 2 longitude</th>
	   <th>Point 2 latitude</th>
	   
   </tr>
	";
	/* loop for each returned row */
	foreach( $rows as $row ) { 
		print "<tr>
			<td>" .$row['long1'] . "</td>
			<td>" .$row['lat1'] . "</td>
			<td>" .$row['long2'] . "</td>
			<td>" .$row['lat2'] . "</td>
		</tr>";
	}
	echo "</table>"
	
?>

<br/><input type="button" name="pagePrincipale" value="Revenir sur la page principale" onclick="self.location.href='siteWeb.php'"> 
