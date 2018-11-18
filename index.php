<?php
//index.php

if(!isset($_COOKIE["type"]))
{
 header("location:login.php");
}else {
	 header("location:pages/dashboard.php");
}

?>
