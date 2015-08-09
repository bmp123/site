<?
session_start();
header('Content-Type: text/html; charset=utf-8');
include("../tpl/header.php");
include("../tpl/header_shab.php");
include("../db.php");
echo"$header";
if(!empty ($_SESSION['login'])){
echo"<div id=\"welcom\">Добро пожаловать!";
    echo"<a href=\"../exit.php\">Выход</a>";
    echo"<a onclick=\"$(\".content\").animsition({
}).one('animsition.start',function(){
  ...
})\" class=\"pa\" href=\"persarea/\"><div id=\"txt_pa\">Личный кабинет</div></a>";
    echo"</div>";
    echo'<div class="body">
    <div id="admin">
        <form action="click_post.php" method="post">
        <input type="submit" id="add" value="Добавить"></form>
        <form action="remove.php" method="post"><input type="submit" id="remove" value="Редактировать">
        </form>
    </div>
   
</div>
<div class="footer"></div>
</body>
</html>';
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
}
?>
