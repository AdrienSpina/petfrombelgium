<?php
function sendData($query,$cnx){
    $result = mysqli_query($cnx,$query);	
	if($result){			
		return true;
	}	
	return false; 
}
?>
<?php
function sendQuery($query,$cnx,&$result){
		$result = mysqli_query($cnx, $query);
		if($result){			
		  return $result;
		}
		else { 
         return false;
       } 
   }
?>
<?php
function getData($result, &$tab){
 // conversion de la variable $tab en tableau
	$tab = array();	
 for ($i=0; $i < mysqli_num_rows($result); $i++) {
   $tab[$i]=mysqli_fetch_array($result);
 }
}
?>
