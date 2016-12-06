<?php
	include_once('semsol/ARC2.php'); /* ARC2 static class inclusion */ 

	$dbpconfig = array(
	"remote_store_endpoint" => "http://ub414.duckdns.org:8080/rdf4j-workbench/repositories/tp2_damien/query",
	);

	$store = ARC2::getRemoteStore($dbpconfig); 

	if ($errs = $store->getErrors()) {
		echo "<h1>getRemoteSotre error<h1>" ;
	}
	
		/*
		{P:Comble :'.$_POST["niveau1"].' ?a}
		UNION
		{P:Comble :'.$_POST["niveau2"].' ?a}
		*/

	$query = '
		PREFIX : <http://megeve.com/>
		PREFIX P: <http://megeve.com/location/>
		PREFIX R: <http://megeve.com/Restaurant/>
		PREFIX H: <http://megeve.com/Hotels/>
		PREFIX rdf:      <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs:     <http://www.w3.org/2000/01/rdf-schema#>
		select distinct ?pointArrive
		where {  
		  '.$_POST["pointDepart"].' :'.$_POST["choixAcces"].' ?pointArrive
		}
		limit 100
	';


	$rows = $store->query($query, 'rows'); /* execute the query */
	
	if ($errs = $store->getErrors()) {
		echo "Query errors" ;
		print_r($errs);
	}

	print "<p> En partant de ' ".$_POST["pointDepart"]." ' en utilisant les ' ".$_POST["choixAcces"]." ' il est possible d'aller à: </p>";
	
	/* display the results in an HTML table */
	echo "<table border='1'>" ;
	print "<tr>
       <th>Points d'arrivées</th>
   </tr>
	";
	/* loop for each returned row */
	foreach( $rows as $row ) { 
		print "<tr>
			<td>" .$row['pointArrive'] . "</td>
		</tr>";
	}
	echo "</table>"
	
?>

<br/><input type="button" name="pagePrincipale" value="Revenir sur la page principale" onclick="self.location.href='siteWeb.php'"> 
