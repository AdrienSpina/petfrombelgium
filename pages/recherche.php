<?php // traitement du formulaire

if(isset($_GET['confirmer1']))
	{
			$query="SELECT * 
					FROM eleveur 
					WHERE localite = '".$_GET['localite']."' ;";
			if(sendQuery($query,$cnx,$result))
			{ 
			getData($result,$tab);
			$nb=count($tab);
			$cpt=0;
			 print $nb?> éleveur(s) trouvé(s)
			 <table class="tab_eleveur" cellpadding="10">
			<tr>
			<th>Numéro</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Localité</th>
			<th>Race</th>
			<th colspan="2">Description</th>
			</tr>
			<?php
			for($i=0;$i<$nb;$i++)
			{
			?>		
			<tr>
				 <td><?php print $tab[$i]['id_eleveur']; ?></td>
				 <td><?php print $tab[$i]['nom']; ?> </td>
				 <td><?php print $tab[$i]['prenom'];?></td>
				 <td><?php print $tab[$i]['localite']; ?> </td>
				 <td><?php print $tab[$i]['race'];?></td>
				 <td colspan="2"><?php print $tab[$i]['description'];?></td>
			</tr>
		<br />	
	    <?php 
			}
			?>
			</table>
			<?php
			}
			else
			{
				print "Nous avons détecté un problème, veuillez réessayer plus tard.";
			}		
	}
	if(isset($_GET['confirmer2']))
	{
			$query="SELECT * 
					FROM eleveur 
					WHERE id_eleveur = '".$_GET['num']."' ;";
			if(sendQuery($query,$cnx,$result))
			{ 
			getData($result,$tab);
			$nb=count($tab);
			$cpt=0;
			 print $nb?> éleveur(s) trouvé(s)
			 <table class="tab_eleveur" cellpadding="10">
			<tr>
			<th>Numéro</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Localité</th>
			<th>Race</th>
			<th colspan="2">Description</th>
			</tr>
			<?php
			for($i=0;$i<$nb;$i++)
			{
			?>		
			<tr>
				 <td><?php print $tab[$i]['id_eleveur']; ?></td>
				 <td><?php print $tab[$i]['nom']; ?> </td>
				 <td><?php print $tab[$i]['prenom'];?></td>
				 <td><?php print $tab[$i]['localite']; ?> </td>
				 <td><?php print $tab[$i]['race'];?></td>
				 <td colspan="2"><?php print $tab[$i]['description'];?></td>
			</tr>
		<br />	
	    <?php 
			}
			?>
			</table>
			<?php
			}
			else
			{
				print "Nous avons détecté un problème, veuillez réessayer plus tard.";
			}		
	}
	if(isset($_GET['confirmer3']))
	{
			$query="SELECT * 
					FROM eleveur 
					WHERE type = '".$_GET['type']."' ;";
			if(sendQuery($query,$cnx,$result))
			{ 
			getData($result,$tab);
			$nb=count($tab);
			$cpt=0;
			 print $nb?> éleveur(s) trouvé(s)
			 <table class="tab_eleveur" cellpadding="10">
			<tr>
			<th>Numéro</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Localité</th>
			<th>Race</th>
			<th colspan="2">Description</th>
			</tr>
			<?php
			for($i=0;$i<$nb;$i++)
			{
			?>		
			<tr>
				 <td><?php print $tab[$i]['id_eleveur']; ?></td>
				 <td><?php print $tab[$i]['nom']; ?> </td>
				 <td><?php print $tab[$i]['prenom'];?></td>
				 <td><?php print $tab[$i]['localite']; ?> </td>
				 <td><?php print $tab[$i]['race'];?></td>
				 <td colspan="2"><?php print $tab[$i]['description'];?></td>
			</tr>
		<br />	
	    <?php 
			}
			?>
			</table>
			<?php
			}
			else
			{
				print "Nous avons détecté un problème, veuillez réessayer plus tard.";
			}		
	}
	if(isset($_GET['confirmer4']))
	{
			$query="SELECT * 
					FROM eleveur 
					WHERE race = '".$_GET['race']."' ;";
			if(sendQuery($query,$cnx,$result))
			{ 
			getData($result,$tab);
			$nb=count($tab);
			$cpt=0;
			 print $nb?> éleveur(s) trouvé(s)
			 <table class="tab_eleveur" cellpadding="10">
			<tr>
			<th>Numéro</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Localité</th>
			<th>Race</th>
			<th colspan="2">Description</th>
			</tr>
			<?php
			for($i=0;$i<$nb;$i++)
			{
			?>		
			<tr>
				 <td><?php print $tab[$i]['id_eleveur']; ?></td>
				 <td><?php print $tab[$i]['nom']; ?> </td>
				 <td><?php print $tab[$i]['prenom'];?></td>
				 <td><?php print $tab[$i]['localite']; ?> </td>
				 <td><?php print $tab[$i]['race'];?></td>
				 <td colspan="2"><?php print $tab[$i]['description'];?></td>
			</tr>
		<br />	
	    <?php 
			}
			?>
			</table>
			<?php
			}
			else
			{
				print "Nous avons détecté un problème, veuillez réessayer plus tard.";
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
<h3 id="titreformulaire2">Formulaire de recherche avancée des éleveurs de PETfromBELGIUM</h3>
</br>
<fieldset class="contourformu3">
	<legend class="legendformu">Ville</legend>	
	<table>
		<form action="index.php" method="get">
			<tr>
				<td>
					<label for="Localite">Localité:</label>
				</td>
				<td>
					<input type="text" name="localite" id="localite" />
				</td>
			</tr>
			<tr>
			<td><input type="submit" name="confirmer1" id="confirmer1" value="Confirmer" /></td>
			<td><input type="reset" name="annuler" id="annuler" value="Annuler" /><td>
			</tr>
	</table>
		</form>
	</fieldset>
	</br>
	<fieldset class="contourformu3">
	<legend class="legendformu">Identifiant de l'éleveur</legend>	
	<table>
		<form action="index.php" method="get">
			<tr>
				<td><label for="Num">Num de l'eleveur</label></td>
				<td><input type="number" name="num" id="num" /></td>
			</tr>
			<tr>
			<td><input type="submit" name="confirmer2" id="confirmer2" value="Confirmer" /></td>
			<td><input type="reset" name="annuler" id="annuler" value="Annuler" /><td>
			</tr>
	</table>
		</form>
	</fieldset>
	</br>
	<fieldset class="contourformu3">
	<legend class="legendformu">Type</legend>	
	<table>
		<form action="index.php" method="get">
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
			</tr>
			<tr>
			<td><input type="submit" name="confirmer3" id="confirmer3" value="Confirmer" /></td>
			<td><input type="reset" name="annuler" id="annuler" value="Annuler" /><td>
			</tr>
	</table>
		</form>
	</fieldset>
	</br>
		<fieldset class="contourformu3">
	<legend class="legendformu">Race de l'animal</legend>	
	<table>
		<form action="index.php" method="get">
			<tr>
				<td>
					<label for="race">Race:</label>	
				</td>
				<td>
					<input type="text" name="race" id="race"/>
				</td>
			</tr>
			<tr>
			<td><input type="submit" name="confirmer4" id="confirmer4" value="Confirmer" /></td>
			<td><input type="reset" name="annuler" id="annuler" value="Annuler" /><td>
			</tr>
	</table>
		</form>
	</fieldset>
	</br>
	<aside class="pub">
			<img src="./images/pub.jpg" alt="pub" />
		</aside>