<?php
session_start();
@$db = mysql_connect ("localhost","root","");
mysql_select_db ("bd",$db);
?>