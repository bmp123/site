<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
if (empty($_SESSION['login']) and empty($_SESSION['id'])){
	$name = $_POST['name']; 
	$opisanie = $_POST['opisanie']; 
    $category = $_POST['category'];
    
	$name = trim($name);	//удаляет лишние пробелы, tab'ы, enter'ы
	$name = stripslashes($name); //удаляет обратные слеши
	$name = htmlspecialchars($name);	//удаляет html разметку

	$opisanie = trim($opisanie);	//удаляет лишние пробелы, tab'ы, enter'ы
	$opisanie = stripslashes($opisanie);	//удаляет обратные слеши
	$opisanie = htmlspecialchars($opisanie);	//удаляет html разметку
    
    $category = trim($category);	//удаляет лишние пробелы, tab'ы, enter'ы
	$category = stripslashes($category);	//удаляет обратные слеши
	$category = htmlspecialchars($category);	//удаляет html разметку
list($width,$height) = getimagesize($_FILES['upload']['tmp_name']);
	//	вычисление новых размеров, при ширине 800
	$new_width = 800;
	$coef = $width / $new_width;
	$new_height = $height / $coef;
	//создание новой картинки
	$newsize = imagecreatetruecolor($new_width, $new_height);
	//загружено без ошибок?
	if($_FILES['upload']['error'] == 0){
		$new_name = time();
		$temp = $_FILES['upload']['tmp_name'];
		$type_img = $_FILES['upload']['type'];
		$img_error = 'ok';						 /*Не забудь подключить*/
		switch ($type_img) {
			case 'image/jpeg':
				$file_type = ".jpg";
				$name_file = $new_name.$file_type;
				$image = imagecreatefromjpeg($temp);
				imagecopyresampled($newsize, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
				imagejpeg($newsize, '../img/pictures/'.$name_file);
			break;
			case 'image/png':
				$file_type = ".png";
				$name_file = $new_name.$file_type;
				$image = imagecreatefrompng($temp);
				imagecopyresampled($newsize, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
				imagepng($newsize, '../img/pictures/'.$name_file);
				break;
			case 'image/gif':
				$file_type = ".gif";
				$name_file = $new_name.$file_type;
				$image = imagecreatefromgif($temp);
				imagecopyresampled($newsize, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
				imagegif($newsize, '../img/pictures/'.$name_file);
				break;
			default:
				$img_error = "Неизвестный тип файла";  /*Не забудь подключить*/
				break;
		}
	}
	else{
		$img_error = "Файл загружен с ошибкой ".$_FILES['upload']['error']; /*Не забудь подключить*/
	}
	include ("../db.php");
		$result = mysql_query ("INSERT INTO `post` (name,opisanie,category,picture) VALUES('$name', '$opisanie','$category' ,'$name_file')");
		if ($result == true){
			unset($name_file, $file_type, $new_name, $temp);
			//создание страниц под новости
			header("Location: post_shablon.php");
		} 
		else{
		}		
}
else{
	exit("Ничего не опубликованно, ибо только админ и, возможно, Нео в силах свершить предначертанное.");
}	
?>