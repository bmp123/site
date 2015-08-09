<?
session_start();
header("Content-Type: text/html; charset=utf-8");
include("../tpl/header.php");
include("../db.php");
include("../tpl/header_shab.php");
echo"$header";
?>
    <div class="body">
    <div id="upload">
         Регистрация
                <div id="registration_block">
                    
                    <form name="registrat" method="post">
                        <div id="error-box"></div>
                    <input class="reg_places" type="text" name="log" id="log" required placeholder="Логин">
                        <div id="error-box"></div>
                    <input class="reg_places" type="email" name="email" id="email" required placeholder="Емайл">
                        <div id="error-box"></div>
                    <input class="reg_places" type="password" name="pass" id="pass" required placeholder="Пароль">
                        <div id="error-box"></div>
                    <input class="reg_places" type="password" name="pass2" id="pass2" required placeholder="Повторите пароль">
        
                        <input class="registr_button" type="submit" name="registration" id="submit" value="Зарегистрироваться">
                    </form>
            
                    
            </div>
            <!--Content end-->
    
    </div>
</div>
   </div>
<div class="footer"></div>

    <?

if(!empty ($_POST['registration'])){
    $password=$_POST['pass'];
    $password2=$_POST['pass2'];
    if($password == $password2){
    $login=$_POST['log'];
    $email=$_POST['email'];
        $query = mysql_query("SELECT `login` FROM `users` WHERE login = '$login'",$db);
        $result = mysql_fetch_array($query);
        if(empty ($result)){
        $query1 = mysql_query("INSERT INTO `users` (login,email,password) VALUES('$login', '$email', '$password')");
            if(query1 == true){
            unset($name, $login, $email, $city, $number, $password, $password2,$_POST);
            exit("<meta http-equiv='refresh' content='0; url= ../index.php'>");
            }
        }
    }else{
    exit("1");
    }
}
?>            