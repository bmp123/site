<?
header('Content-Type: text/html; charset=utf-8');
include("../db.php");
include("../tpl/header.php");
include("../tpl/header_shab.php");
echo"$header";
?>
<div class="body">
    <div id="upload">
    <?
if(empty($_GET)){
        $query = mysql_query("SELECT * FROM `post` ORDER BY `id` DESC LIMIT 10");
$result = mysql_fetch_array($query);
if(!empty($query)){
    echo'<div id="clear">';
do{ 
    echo"<a id=\"con_a\" href=\"http://site.ru/category/?name=".$result['category']."\"><div id=\"div_cat\">".$result['category']."</div></a>";
    
}while($result = mysql_fetch_array($query));
    echo'<div style="clear:both;"></div>';
    echo'</div>';
}
else{

}
}
if(!empty($_GET)){
    $id = $_GET['name'];
$query = mysql_query("SELECT * FROM `post` WHERE category = '$id'");
$result = mysql_fetch_array($query);
     $query1 = mysql_query("SELECT * FROM `chbox` WHERE id_user = '1' && cat = '$id'");
@$result1 = mysql_fetch_array($query1);
    echo"<p>$id</p>";
     $q=1;
    
do{
    echo"<a id=\"a_con\" href=\"../post/".$result['href']."\">";
    echo"<div id=\"conteiner\">";
    //echo"<div id=\"category\">".$result['category']."</div>";
    //echo"<div id=\"name\">".$result['name']."</div>";
   // echo"<div id=\"opisanie\">".$result['opisanie']."</div>";
    echo"<form action=\"save.php\" method=\"post\">";
    echo"<input type=\"checkbox\" id=\"".$result['id']."\" name=\"ch\">";
    echo"<input name=\"checked\" type=\"hidden\" value=\"".$result['id']."\">";
     echo"<input name=\"checked2\" type=\"hidden\" value=\"".$result['category']."\">";
    echo"<input type=\"submit\" style=\"visibility: visible;\" name=\"check\" id=\"".$result['id'].$q."\">";
    echo"</form>";
    echo"<div id=\"pict\"><img id=\"picture\" src=\"../img/pictures/".$result['picture']."\"></div>";
    echo"</div></a>";
}while($result = mysql_fetch_array($query));
    if(!empty($result1['ch'])){
    do{
    echo"<script>
document.getElementById(".$result1['ch'].").checked=true;
document.getElementById(".$result1['ch'].$q.").type = 'hidden';
</script>";
    }while($result1 = mysql_fetch_array($query1));}
    else{
       
    do{
    echo"<script>
 document.getElementById(".$result1['ch'].").checked=false;
document.getElementById(".$result1['ch'].$q.").type = 'submit';
</script>";
    }while($result1 = mysql_fetch_array($query1));}
}
else{

}


        ?>
    
    </div>
   
</div>
    <div class="footer"></div>
        
        
    </body>
</html>