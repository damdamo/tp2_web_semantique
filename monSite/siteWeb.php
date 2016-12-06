<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Web semantique</title>
		
    </head>

	
    <body>
		
		<h1> TP2 WEB SEMANTIQUE <h1>
		<h2>Cabot Florian / Morard Damien </h2>
		
		<h3>Connaître tous les points possibles à partir d'un endroit et d'un type de piste donnée </h3>
		<form method="post" action="pointsDisponible.php">
		   <p>
			   <label for="pointDepart">Point de depart</label><br />
			   <select name="pointDepart" id="pointDepart">
				   <option value="P:Ideal">Ideal</option>
				   <option value="P:Comble">Comble</option>
				   <option value="P:Mandarine">Mandarine</option>
				   <option value="P:Sanglier">Sanglier</option>
				   <option value="P:Brigants">Brigants</option>
				   <option value="P:Vorasset">Vorasset</option>
				   <option value="P:Etudiants">Etudiants</option>
				   <option value="P:Grand-Bois">Grand-Bois</option>
				   <option value="P:Ourson">Ourson</option>
				   <option value="P:Mont-Joux">Mont-Joux</option>
			   </select>
			   
			   <br/>
			   <br/>
			   
			   <label for="choixAcces">Choix de connexion</label><br />
			   <select name="choixAcces" id="choixAcces">
				   <option value="lift">Remonté</option>
				   <option value="greenRun">Piste verte</option>
				   <option value="blueRun">Piste bleu</option>
				   <option value="redRun">Piste rouge</option>
				   <option value="blackRun">Piste noir</option>
			   </select>
			   
			   <br/>
			   <br/>
			   
			   <input type="submit" value="Envoyer" />
		   </p>
		</form>
		
		<br/>
		
		<h3>Permet de calculer le nombre de pistes d'une couleur ou de toutes</h3>
		<!-- LA VARIABLE ALL est interprété comme toutes les pistes -->
		<form method="post" action="countPiste.php">
		   <p>
			   <label for="countPiste">Point de depart</label><br />
			   <select name="countPiste" id="countPiste">
				   <option value="All">All</option>
				   <option value="greenRun">Pistes vertes</option>
				   <option value="blueRun">Pistes bleues</option>
				   <option value="redRun">Pistes rouges</option>
				   <option value="blackRun">Pistes noires</option>
			   </select>
			   <br/>
			   <br/>
			   <input type="submit" value="Envoyer" />
		   </p>
		</form>
		
		</br>
		
		<h3>Trouve un hôtel ou un restaurant pour un endroit et un nombre d'étoiles défini</h3>
		<form method="post" action="hotelRestaurant.php">
		   <p>
			   <label for="hotelOuResto">Hôtel ou Restaurant</label><br />
			   <select name="hotelOuResto" id="hotelOuResto">
				   <option value="Hotel">Hôtel</option>
				   <option value="Restaurant">Restaurant</option>
			   </select>
			   
			   <br/>
			   <br/>
			   
			   <label for="nbEtoiles">Nombre d'étoiles</label><br />
			   <select name="nbEtoiles" id="nbEtoiles">
					<option value="allEtoiles">all</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
			   </select>
			   
			   <br/>
			   <br/>
			   
			   <label for="place">Localisation</label><br />
			   <select name="place" id="place">
					<option value="allPlaces">All</option>
					<option value="P:Ideal">Ideal</option>
					<option value="P:Comble">Comble</option>
					<option value="P:Mandarine">Mandarine</option>
					<option value="P:Sanglier">Sanglier</option>
					<option value="P:Brigants">Brigants</option>
					<option value="P:Vorasset">Vorasset</option>
					<option value="P:Etudiants">Etudiants</option>
					<option value="P:Grand-Bois">Grand-Bois</option>
					<option value="P:Ourson">Ourson</option>
					<option value="P:Mont-Joux">Mont-Joux</option>
			   </select>
			   
			   <br/>
			   <br/>
			   
			   <input type="submit" value="Envoyer" />
		   </p>
		</form>
		
				<br/>
				
		<h3>Permet de calculer la distance entre deux points</h3>
		<form method="post" action="distance2Points.php">
		   <p>
			   <label for="point1">Point de depart</label><br />
			   <select name="point1" id="point1">
					<option value="P:Ideal">Ideal</option>
					<option value="P:Comble">Comble</option>
					<option value="P:Mandarine">Mandarine</option>
					<option value="P:Sanglier">Sanglier</option>
					<option value="P:Brigants">Brigants</option>
					<option value="P:Vorasset">Vorasset</option>
					<option value="P:Etudiants">Etudiants</option>
					<option value="P:Grand-Bois">Grand-Bois</option>
					<option value="P:Ourson">Ourson</option>
					<option value="P:Mont-Joux">Mont-Joux</option>
			   </select>
			   <br/>
			   <br/>
			   <label for="point2">Point d'arrivé</label><br />
			   <select name="point2" id="point2">
					<option value="P:Mont-Joux">Mont-Joux</option>
					<option value="P:Comble">Comble</option>
					<option value="P:Mandarine">Mandarine</option>
					<option value="P:Sanglier">Sanglier</option>
					<option value="P:Brigants">Brigants</option>
					<option value="P:Vorasset">Vorasset</option>
					<option value="P:Etudiants">Etudiants</option>
					<option value="P:Grand-Bois">Grand-Bois</option>
					<option value="P:Ourson">Ourson</option>
					<option value="P:Ideal">Ideal</option>
			   </select>
			   <br/>
			   <br/>
			   <input type="submit" value="Envoyer" />
		   </p>
		</form>
		
		</br>
		
		<h3>Permet de trouver tous les hôtels et restaurants voisins par rapport à un point</h3>
		<form method="post" action="voisinsHotelEtResto.php">
		   <p>
			   <label for="pointSource">Point source</label><br />
			   <select name="pointSource" id="pointSource">
					<option value="P:Ideal">Ideal</option>
					<option value="P:Comble">Comble</option>
					<option value="P:Mandarine">Mandarine</option>
					<option value="P:Sanglier">Sanglier</option>
					<option value="P:Brigants">Brigants</option>
					<option value="P:Vorasset">Vorasset</option>
					<option value="P:Etudiants">Etudiants</option>
					<option value="P:Grand-Bois">Grand-Bois</option>
					<option value="P:Ourson">Ourson</option>
					<option value="P:Mont-Joux">Mont-Joux</option>
			   </select>
			   <br/>
			   <br/>
			   <input type="submit" value="Envoyer" />
		   </p>
		</form>
		
    </body>
</html>