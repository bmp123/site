<?php
	@include ("../db.php");
	@include ("../tpl/header_shab.php");
	@include ("../tpl/footer_shab.php");
	$resulte = mysql_query ("SELECT * FROM  `post` ORDER BY  `id` DESC LIMIT 1");
	$mirrowe = mysql_fetch_array($resulte);
	$filee = '../post/'.$mirrowe['id'].".php";
    $id = $mirrowe['id'];
$resultee = mysql_query ("UPDATE `post` SET href = '$id.php' WHERE id = '$id' ");
	@$currente = file_get_contents($filee);
	$currente .= "<?php
		header(\"Content-Type: text/html; charset=utf-8\");
		?>
		<html>
<head>
    <link href=\"../css/main.css\" rel=\"stylesheet\">
    <link href=\"../css/slider.css\" rel=\"stylesheet\">
    <script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-latest.min.js\"></script>
</head>
    <body>
			".$header."
            <div class=\"body\">
			<div class=\"conteiner_solo\"> 
			<div class=\"solo_category\">".$mirrowe['category']." </div>
            <div class=\"solo_name\">".$mirrowe['name']." </div>
            
			<img class=\"solo_picture\" src=\"../img/pictures/".$mirrowe['picture']."\">
            <div class=\"solo_opisanie\">".$mirrowe['opisanie']." </div>
			</div> 
</div>
			".$footer."
			</div>          <!--background-->
			</body>
			</html>";
	file_put_contents($filee, $currente);	
	@header("Location: index.php");
?>