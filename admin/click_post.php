<?php 
session_start();
header('Content-Type: text/html; charset=utf-8');
include("../tpl/header.php");
include("../tpl/header_shab.php");
include("../db.php");
echo"$header";
	if (!empty($_SESSION['login'])){
        echo"<div id=\"welcom\">Добро пожаловать!";
    echo"<a href=\"../exit.php\">Выход</a>";
    echo"<a onclick=\"$(\".content\").animsition({
}).one('animsition.start',function(){
  ...
})\" class=\"pa\" href=\"persarea/\"><div id=\"txt_pa\">Личный кабинет</div></a>";
    echo"</div>";
	echo'<div id="alert_all">
	<form action="post.php" method="post" enctype="multipart/form-data">
	<p class="news_nead_p">Добавление нового киндера</p><br>
	<input class="name" name="name" type="text" required placeholder="имя" maxlength="100"><br>
	<textarea maxlength="10000" class="opisanie" name="opisanie" type="textarea" required placeholder="описание"></textarea><br>
    <input class="category" name="category" type="text" required placeholder="категория" maxlength="100"><br>
	<input class="upload" name="upload" required type="file"><br>
	<input id="post_btn" class="btn" value="Пост" name="post_news" type="submit">
	</form></div>';
	}
	else{
        echo"$login";
if(isset($_POST)){
    if(!empty($_POST)){
        $postlog = $_POST['login_place'];
        $postpas = $_POST['password_place'];
$query = mysql_query("SELECT * FROM users WHERE login = '$postlog'");
        $result = mysql_fetch_array($query);
        if(!empty($result)){
        $postpass = $result['password'];
        if($postpas == $postpass){
        $_SESSION['password'] =                   $result['password'];
        $_SESSION['login'] = $result['login'];
            echo"<script>
document.getElementById(\"error-box_index\).style('visibility') = 'hidden';
</script>";
              exit("<meta http-equiv='refresh' content='0;'>");         
        }
            else{
            }
        }
        else{
        
        }
    }else{
    echo"<script>
document.getElementById('error-box_index').style('visibility') = 'visible';
</script>";
        unset($_POST);
    }
}
		echo "<div id=\"alert_all\"><center>Только администратор может видеть, что скрывает эта страница</center></duv>";
		exit();
	}
?>