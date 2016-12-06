<?php
	include_once('semsol/ARC2.php'); /* ARC2 static class inclusion */ 

	$dbpconfig = array(
	"remote_store_endpoint" => "http://ub414.duckdns.org:8080/rdf4j-workbench/repositories/tp2_damien/query",
	);

	$store = ARC2::getRemoteStore($dbpconfig); 

	if ($errs = $store->getErrors()) {
		echo "<h1>getRemoteSotre error<h1>" ;
	}
	
	//NE GERE PAS ENCORE LE CAS ALL A DEFINIR!

	$query = '
		PREFIX : <http://megeve.com/>
		PREFIX P: <http://megeve.com/location/>
		PREFIX R: <http://megeve.com/Restaurant/>
		PREFIX H: <http://megeve.com/Hotels/>
		PREFIX rdf:      <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs:     <http://www.w3.org/2000/01/rdf-schema#>
		select distinct ?hotelOuResto
		where {  
		
			?hotelOuResto a :'.$_POST["hotelOuResto"].'.
			?hotelOuResto :star "'.$_POST["nbEtoiles"].'"^^xsd:integer.
			?hotelOuResto :isAt '.$_POST["place"].'.
			
		}
		limit 100
	';

	// '.$_POST["pointDepart"].' :'.$_POST["choixAcces"].' ?pointArrive

	$rows = $store->query($query, 'rows'); /* execute the query */
	
	if ($errs = $store->getErrors()) {
		echo "Query errors" ;
		print_r($errs);
	}

	print "<p> La liste des ".$_POST["hotelOuResto"]." est: </p>";
	
	/* display the results in an HTML table */
	echo "<table border='1'>" ;
	print "
		<tr>
		   <th>Listes des ".$_POST["hotelOuResto"]."</th>
	   </tr>
	";
	/* loop for each returned row */
	foreach( $rows as $row ) { 
		print "
		<tr>
			<td>" .$row['hotelOuResto'] . "</td>
		</tr>";
	}
	echo "</table>"
	
?>

<br/><input type="button" name="pagePrincipale" value="Revenir sur la page principale" onclick="self.location.href='siteWeb.php'"> 
