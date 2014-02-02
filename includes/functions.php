<?php 
error_reporting(0); 
session_start(); 
 
function make_connection()
{
	define("DB", "khidmtgar_db");
	define("SR", "localhost");
	define("UN", "root");
	define("PW", "");
	$conn = mysql_connect(SR, UN, PW);
	$dB = mysql_select_db(DB, $conn);
}

function check_email_address()
{
	return 1;
}		
function Run($strSQL)
{
	$RS =  mysql_query($strSQL)  ; //or die(mysql_error().": ".$strSQL)
	return $RS;
}
	
function Records($RS)
{
	return mysql_num_rows($RS);
}

function GetRow($RS)
{
	return mysql_fetch_array($RS, MYSQL_ASSOC);
}
	
function cleanString($string)
{
	$string = str_replace("'", "", $string);
	$string = str_replace("<", "", $string);
	$string = str_replace(">", "", $string);
	$string = str_replace("#", "", $string);
	$string = str_replace("-", "", $string);
	$string = str_replace('"', '', $string);
	$string = str_replace('?', '', $string);
	return $string;
}
		 

function redirect_to($PAGE, $ID, $MSG)
{
	echo "<script type='text/javascript'> document.location = '$PAGE?$ID=$MSG' ; </script>";
	header("$PAGE?$ID=$msg");
	exit;
}
		 
		
?>