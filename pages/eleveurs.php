<?php
if(isset($_GET['action']))
{
    if($_GET['action']=="affichedescription")
	{
    $query2="update eleveur set OK_descri=1 where id_eleveur=".$_GET['id'];
	}
    if($_GET['action']=="Reinitialiser")
    { 
	$query2="update eleveur set OK_descri=0";  
    }
	if(!sendData($query2,$cnx)) 
	{
	  print "probleme";
	}
}
?>
<?php
 $query="select * from eleveur";
 //$result=mysqli_query($cnx,$query);
 if(sendQuery($query,$cnx,$result))
 {  /*s'il y a un résultat, je peux l'obtenir en exploitant $result*/
    getData($result,$tab);
	$nb=count($tab); 

 ?>
	<h4 class="titre_animaux">Il y a <?php print $nb?> éleveurs inscrits sur le site :</h4>
	
	 <?php 
		$cpt=0;
        for($i=0;$i<$nb;$i++)
        {
			if($tab[$i]['OK_descri']==0)
			{?>
		   <table class="tab_eleveur" cellpadding="20">
		<tr>
			<th>Numero</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Localité</th>
			<th>Race</th>
			<th>Type</th>
			<th>Description</th>
		</tr>
		<tr>
			<?php $cpt++; ?>
			 <td><?php print $tab[$i]['id_eleveur']; ?></td>
			 <td class="nom_eleveur"><?php print $tab[$i]['nom']; ?> </td>
		     <td><?php print $tab[$i]['prenom'];?></td>
			 <td class="local_eleveur"><?php print $tab[$i]['localite']; ?> </td>
			 <td><?php print $tab[$i]['race'];?></td>
			 <?php
			 if($tab[$i]['type']==1)
			 {
				?><td class="type_eleveur">Basse-cour</td><?php
			 }
			 if($tab[$i]['type']==2)
			 {
				?><td class="type_eleveur">Chat</td><?php
			 }
			 if($tab[$i]['type']==3)
			 {
				?><td class="type_eleveur">Cheval</td><?php
			 }
			 if($tab[$i]['type']==4)
			 {
				?><td class="type_eleveur">Chien</td><?php
			 }
			 if($tab[$i]['type']==5)
			 {
				?><td class="type_eleveur">Poisson</td><?php
			 }
			 if($tab[$i]['type']==6)
			 {
				?><td class="type_eleveur">Reptile</td><?php
			 }
			 if($tab[$i]['type']==7)
			 {
				?><td class="type_eleveur">Rongeur</td><?php
			 }
			 if($tab[$i]['type']==8)
			 {
				?><td class="type_eleveur">Oiseau</td><?php
			 }
			?>
			<td><a href="index.php?action=affichedescription&id=<?php print $tab[$i]['id_eleveur'];?>">En savoir plus</a></td>
        </tr>
		</table>
		<br />		
	    <?php 
			}
			if($tab[$i]['OK_descri']==1)
			{?>
		   <table class="tab_eleveur" cellpadding="20">
		<tr>
			<th>Numero</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Localité</th>
			<th>Race</th>
			<th>Type</th>
			<th>Description</th>
		</tr>
		<tr>
			<?php $cpt++; ?>
			 <td><?php print $tab[$i]['id_eleveur']; ?></td>
			 <td class="nom_eleveur"><?php print $tab[$i]['nom']; ?> </td>
		     <td><?php print $tab[$i]['prenom'];?></td>
			 <td class="local_eleveur"><?php print $tab[$i]['localite']; ?> </td>
			 <td><?php print $tab[$i]['race'];?></td>
			 <?php
			 if($tab[$i]['type']==1)
			 {
				?><td class="type_eleveur">Basse-cour</td><?php
			 }
			 if($tab[$i]['type']==2)
			 {
				?><td class="type_eleveur">Chat</td><?php
			 }
			 if($tab[$i]['type']==3)
			 {
				?><td class="type_eleveur">Cheval</td><?php
			 }
			 if($tab[$i]['type']==4)
			 {
				?><td class="type_eleveur">Chien</td><?php
			 }
			 if($tab[$i]['type']==5)
			 {
				?><td class="type_eleveur">Poisson</td><?php
			 }
			 if($tab[$i]['type']==6)
			 {
				?><td class="type_eleveur">Reptile</td><?php
			 }
			 if($tab[$i]['type']==7)
			 {
				?><td class="type_eleveur">Rongeur</td><?php
			 }
			 if($tab[$i]['type']==8)
			 {
				?><td class="type_eleveur">Oiseau</td><?php
			 }
			?>
			<td><?php print $tab[$i]['description'];?></td>
        </tr>
		</table>
		<br />		
	    <?php 
			}
		}
		?>
		<td colspan="4"><a href="index.php?action=Reinitialiser">R&eacute;initialiser</a></td>
		<aside class="pub">
			<img src="./images/pub.jpg" alt="pub" />
		</aside>
	<?php
	}
?>
