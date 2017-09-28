<?php // traitement du formulaire

if(isset($_GET['confirmer']))
	{
	if($_GET['nom']=="")
		{
			$erreur_nom="Nom manquant";
			print $erreur_nom;
		}
	else
		{
			$query="insert into eleveur(nom,prenom,localite,type,race,description)
			values('".$_GET['nom']."','".$_GET['prenom']."','".$_GET['localite']."','".$_GET['type']."','".$_GET['race']."','".$_GET['description']."')";
			//print $query;
			//$result=mysqli_query($cnx,$query);
			if(sendData($query,$cnx))
			{
				?>
				<script>
					alert('Votre inscription est confirmée !');
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert('Nous avons détecté un problème, veuillez réessayer plus tard.');
				</script>
				<?php
			}
		}		
	}
?>
<?php
	$query="select * from animaux";
	//$res=mysqli_query($cnx,$query);
	if(sendQuery($query,$cnx,$res))
	{
		getData($res,$tabAnimaux);
		$nb=count($tabAnimaux);
	}
?>
<h3 id="titreformulaire">Formulaire d'inscription à PETfromBELGIUM dédié aux éleveurs d'animaux de compagnie.</h3>
</br>
<fieldset class="contourformu">
	<legend class="legendformu">Informations personnelles</legend>	
	<table class="formulaire" cellpadding="8">
		<form action="index.php" method="get">
			<tr>
				<td>
					<label for="Nom">Nom:</label>	
				</td>
				<td>
					<input type="text" name="nom" id="nom" />
				</td>
				<td>
					<label for="prenom">Prénom:</label>	
				</td>
				<td>
					<input type="text" name="prenom" id="prenom" />
				</td>
				<td>
					<label for="Localite">Localité:</label>
				</td>
				<td>
					<input type="text" name="localite" id="localite" />
			</tr>
	</table>
	</fieldset>
	</br>
	<fieldset class="contourformu">
	<legend class="legendformu">Elevage</legend>
	<table class="formulaire" cellpadding="10">
			<tr>
				<td>
					<label for="type">Type:</label>	
				</td>
				<td>
				<select name="type">
					<option value="Votre choix ?">Votre choix ?</option>
					<?php
						for($i=0;$i<$nb;$i++)
					{ ?>
						<option value="<?php print $tabAnimaux[$i]['id_type']; ?>">
						<?php print $tabAnimaux[$i]['Type']; ?></option>
					<?php } ?>	
				</select>
				</td>
				<td>
					<label for="race">Race:</label>	
				</td>
				<td>
					<input type="text" name="race" id="race"/>
				</td>
			</tr>
			<tr>
			</tr>
			<tr>
				<textarea rows="5" cols="108" name="description" placeholder="Description de l'élevage :" id="airedetext"></textarea>
			</tr>
	</table>	
	</fieldset>	
	<br/>
	<div id="confirmation">
	<fieldset class="contourformu">
	<legend class="legendformu">Enregistremement</legend>
		<table class="formulaire" cellpadding="10" width="100">
		<tr>
			<td><input type="submit" name="confirmer" id="confirmer" value="Confirmer" /></td>
			<td><input type="reset" name="annuler" id="annuler" value="Annuler" /><td>
		</tr>	
		</table>	
	</fieldset>
	</div>
	</form>
	<aside class="pub">
			<img src="./images/pub.jpg" alt="pub" />
	</aside>