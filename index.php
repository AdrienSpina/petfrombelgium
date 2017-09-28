<?php
  session_start();
?>
<?php
	if(file_exists("./lib/php/connect.php"))
	{
		include "./lib/php/connect.php";
	}
	if (file_exists ("./lib/php/fonctions.php"))
	{
		include "./lib/php/fonctions.php";
	}
?>  
<!DOCTYPE html>
<html>
	<head>
		<title>PETfromBELGIUM</title>
		<link rel="stylesheet" type="text/css" href="./lib/css/PETfromBELGIUM.css" />
		<meta charset="utf-8" />
	</head>
	<body>

	<div id="wrapper">
	  <header>
		<figure id="banniere2"> 
			<img src="./images/banniere2.jpg" alt="bannière" />
		</figure>  
		<h3 id="enseigne"><a href="index.php?page=accueil.php">PET's from BELGIUM</a></h3>
	  </header>  
	  <nav id="menu">
	     <?php 
		   if (file_exists("./lib/php/menu.php")){
		   include "./lib/php/menu.php";
		   }
		 ?>  
		  
	  
	  </nav>
	  <section id="contenu">
		<section id="main">
	   <?php 
	   /* le contenu change en fonction de la navigation*/
	   if(!isset($_SESSION['page'])){
	     $_SESSION['page']="./pages/accueil.php";
		}
      else{		
	   
	   if(isset($_GET['page'])){
	      //print $_GET['page'];
          $_SESSION['page']="./pages/".$_GET['page'];
		  }
		}  
				  
		//print $_SESSION['page'];  
	if(file_exists($_SESSION['page']))
	{ include $_SESSION['page'];
	}
	 else 
        print "OUPS!!!!!";		 
		
       ?>			
		</section>
	  </section>
</br>	  
	  <footer>
		<p>
	    Webmaster - <a href="mailto:adrien.spina@gmail.com">Contacter</a>
		</p>
	  </footer>
	</div>
</body>
</html>	