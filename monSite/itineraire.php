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
		select distinct ?voisins
		where {  
		
			?voisins a :Point.
			{'.$_POST["pointDep"].' :greenRun ?voisins}
			UNION
			{'.$_POST["pointDep"].' :blueRun ?voisins}
			UNION
			{'.$_POST["pointDep"].' :redRun ?voisins}
			UNION
			{'.$_POST["pointDep"].' :blackRun ?voisins}
			UNION
			{'.$_POST["pointDep"].' :lift ?voisins}.
		}
		limit 100
	';


	$rows = $store->query($query, 'rows'); /* execute the query */
	
	if ($errs = $store->getErrors()) {
		echo "Query errors" ;
		print_r($errs);
	}

	print "<p> Le chemin permettant d'aller de ".$_POST["pointDep"]." à ".$_POST["pointFin"]." est: </p>";
	
	/* display the results in an HTML table */
	echo "<table border='1'>" ;
	print "<tr>
       <th>Voisins</th>
   </tr>
	";
	/* loop for each returned row */
	foreach( $rows as $row ) { 
		print "<tr>
			<td>" .$row['voisins'] . "</td>
		</tr>";
	}
	echo "</table>"
	
?>

<br/><input type="button" name="pagePrincipale" value="Revenir sur la page principale" onclick="self.location.href='siteWeb.php'"> 
