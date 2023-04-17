<?php
session_start();
if(isset($_SESSION['page']))
$_SESSION['page']=$_SESSION['page']+1;
else
$_SESSION['page']=0;
$page=$_SESSION['page'];
if($page==null)
{
echo "Welcome , You have visited <b>First time</b>";
$_SESSION['page']=1;
}
else
{
echo "You have visited <b> $page times</b>";
$_SESSION['page']= $page;
}
?>