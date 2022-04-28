<?php
$dbhost= 'localhost';
$dbuser='root';
$dbpass='';
$db= 'iwitnezdb' ;

if($connect = mysqli_connect($dbhost,$dbuser,$dbpass,$db)){
}else{
	die('couldn\'t connect');
}
?>