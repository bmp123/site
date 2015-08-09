<?
session_start();
header('Content-Type: text/html; charset=utf-8');
include("tpl/header.php");
include("db.php");
include("tpl/header_shab.php");
echo"$header";
if(!empty ($_SESSION['login'])){
echo"<div id=\"welcom\">Добро пожаловать!";
    echo"<a href=\"../exit.php\">Выход</a>";
    echo"<a onclick=\"$(\".content\").animsition({
}).one('animsition.start',function(){
  ...
})\" class=\"pa\" href=\"persarea/\"><div id=\"txt_pa\">Личный кабинет</div></a>";
    echo"</div>";
}else{
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
              exit("<meta http-equiv='refresh' content='0; url= index.php'>");         
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
}
        ?>
<div class="body">
   <!--slider-->
    <script type="text/javascript" src="js/slider.js"></script>
    <div id="fon_slider">
<div id="slider">
    <ul>
		<li><img class="slide" src="img/slider/1.png" alt=""></li>
		<li><img class="slide" src="img/slider/2.png" alt=""></li>
		<li><img class="slide" src="img/slider/3.png" alt=""></li>
		<li><img class="slide" src="img/slider/4.png" alt=""></li>
		<li><img class="slide" src="img/slider/5.png" alt=""></li>
	</ul>
    </div>
        </div>
    <!--slider-->
    <div id="upload">
    <?
        $query = mysql_query("SELECT * FROM `post` ORDER BY `id` DESC LIMIT 10");
$result = mysql_fetch_array($query);
if(!empty($query)){
    
do{
    echo"<a id=\"con_a\" href=\"post/".$result['href']."\">";
    echo"<div id=\"conteiner\">";
    //echo"<div id=\"name\">".$result['name']."</div>";
    echo"<div id=\"pict\"><img id=\"picture\" src=\"img/pictures/".$result['picture']."\"></div>";
    echo"</div></a>";
}while($result = mysql_fetch_array($query));
}
else{

}
        ?>
    
    </div>
   
</div>
<div class="footer"></div>
<?
include("tpl/footer.php");
?>