<?php
	if( ! isset($_GET["url"])){
		echo "<h2 style='text-align: center; color: red;'>URL invalida!</h2>";
		die();
	}

	$url = $_GET["url"];

	$path = explode("http://swatimport.com/", $url)[1];

	if(! file_exists($path)){
		echo "<h2 style='text-align: center; color: red;'>URL invalida!</h2>";
		die();
	}	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Imagen en pantalla completa</title>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <style type="text/css">
  	body{ margin: 0; padding: 50px 0; background-color: rgba(20,25,35,0.9);}
  	.gallery { width: 50%; height: 600px; overflow: hidden; margin: 0 auto;}
  	.gallery img { width: auto; height: 100%; display: block; margin: 0 auto; }
  </style>
</head>
<body>
	<div class="gallery">
		<img src="<?=$url ?>" id="fullscreenimage" />
	</div>
</body>
</html>
