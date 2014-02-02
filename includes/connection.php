<?php
   
 
function make_connection()
{
	define("DB", "dilsonst_db");
	define("SR", "localhost");
	define("UN", "dilsonst_db");
	define("PW", "dt@db");
	$conn = mysql_connect(SR, UN, PW);
	$dB = mysql_select_db(DB, $conn);
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
		
	 
 
?>