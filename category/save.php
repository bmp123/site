<?
$id = $_POST['checked'];
$id2 = $_POST['checked2'];
if(!empty($_POST['check'])){
    include("../db.php");
    $result = mysql_query("INSERT INTO `chbox` (ch,id_user,cat) VALUES ('$id','1','$id2')");
    header("Location: http://site.ru/category/");
}
?>