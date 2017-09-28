<?php
// ATTENTION, cette page a un probleme d'actualisation de la base de donnée.
// Tout fonctionne correctement mais il faut cliquer deux fois sur chaque bouton pour obtenir un affichage.
$query="SELECT *
		FROM animaux";
 if(sendQuery($query,$cnx,$result))
{  
    getData($result,$tab);
	$nb=count($tab);
if(isset($_GET['bouton']))
	{
		$z = 0;
		$a = 0;
		for($a=0;$a<$nb;$a++)
		{
			if($_GET['choix'] == $tab[$a]['Type'])
				{
				$z=$a+1;
				}
		}
		$query="insert into numeleveur(choixtype, numtype)
		values ('".$_GET['choix']."', '".$z."')";
			if(sendData($query,$cnx))
			{
			}	
			?>
			<script>
				alert('Votre demande a été envoyé au serveur.. Veuillez recliquer une nouvelle fois merci.');
			</script>
			<?php
			$query="SELECT *
					FROM numeleveur";
			if(sendQuery($query,$cnx,$result))
			{
				getData($result,$tab3);
			}
			$query="SELECT id_eleveur
					FROM eleveur, numeleveur
					WHERE eleveur.type = numeleveur.numtype";
			if(sendQuery($query,$cnx,$result))
			{  
				getData($result,$tab2);
				$nb2=count($tab2);
			}
			$nomani=$tab3[0]['choixtype'];
			$query='DELETE FROM numeleveur
					WHERE choixtype="'.$nomani.'" ';
			if(sendQuery($query,$cnx,$result))
			{  
			}
			$query='update animaux set eleveur_ok=1 where Type="'.$nomani.'" ';
			if(sendQuery($query,$cnx,$result))
			{  
			}
	}
}
    ?> 
	<h4 class="titre_animaux">Les animaux de compagnies les plus courants :</h4>
	<table class="tab_animaux" cellpadding="20">
	 <?php 
        for($i=0;$i<$nb;$i++)
        {
			if($tab[$i]['descri_ok']==0 && $tab[$i]['eleveur_ok']==0)
			{
           ?>
		   <form method="get">
			 <tr>
			 <td class="type_animal"><label><input type="text" name="choix" value="<?php print $tab[$i]['Type'];?>"><label></td>
		     <td><img src="./images/<?php print $tab[$i]['Photo'];?>"/></td>
			 <td class="descri_animal"><a href="index.php?action=affichedescri&id=<?php print $tab[$i]['id_type'];?>">En savoir plus</a></td>
			<td><input type="submit" name="bouton" value="Numeros des éleveurs de ce type"></td>
             </tr>	
			 </form>
	    <?php 
			}
			if($tab[$i]['descri_ok']==1 && $tab[$i]['eleveur_ok']==0)
			{
				?>
				<form method="get">
				<tr>
				<td class="type_animal"><label><input type="text" name="choix" value="<?php print $tab[$i]['Type']; ?>"><label></td>
				<td><img src="./images/<?php print $tab[$i]['Photo'];?>"/></td>
				<td class="descri_animal"><?php print $tab[$i]['Descriptif'];?></td>
				<td><input type="submit" name="bouton" value="Numeros des éleveurs de ce type"></td>
				</tr>
				</form>
				<?php
			}
			if($tab[$i]['descri_ok']==0 && $tab[$i]['eleveur_ok']==1)
			{
				?>
				<tr>
				<td class="type_animal"><?php print $tab[$i]['Type']; ?></td>
				<td><img src="./images/<?php print $tab[$i]['Photo'];?>"/></td>
				<td class="descri_animal"><a href="index.php?action=affichedescri&id=<?php print $tab[$i]['id_type'];?>">En savoir plus</a></td>
				<td class="descri_animal"><?php 
				for($m=0;$m<$nb2;$m++)
				{
				?>
				<table class="Tabnum">
				<?php
				print $tab2[$m]['id_eleveur'];
				?>
				</table>
				<?php
				}
				$nb2= 0;
				?></td>
				</tr>
				<?php
			}
			if($tab[$i]['descri_ok']==1 && $tab[$i]['eleveur_ok']==1)
			{
				?>
				<form method="get">
				<tr>
				<td class="type_animal"><?php print $tab[$i]['Type']; ?></td>
				<td><img src="./images/<?php print $tab[$i]['Photo'];?>"/></td>
				<td class="descri_animal"><?php print $tab[$i]['Descriptif'];?></td>
				<td class="descri_animal"><?php 
				for($j=0;$j<$nb2;$j++)
				{
				?>
				<table class="Tabnum">
				<?php
				print "numéro ".$tab2[$j]['id_eleveur'];
				?>
				</table>
				<?php
				}
				$nb2= 0;
				?></td>
				</tr>
				<?php
			}
		}
		?>
		<td colspan="4"><a href="index.php?action=Reinitialiser">R&eacute;initialiser</a></td>
		<?php
		if(isset($_GET['action']))
{
    if($_GET['action']=="affichedescri")
	{
    $query2="update animaux set descri_ok=1 where id_type=".$_GET['id'];
	}
    if($_GET['action']=="Reinitialiser")
    { 
	$query2="update animaux set descri_ok=0 , eleveur_ok=0";  
    }
	if(!sendData($query2,$cnx)) 
	{
	  print "probleme";
	}
}
?>
	</table>
