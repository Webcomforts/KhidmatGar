<?php 
 
include "includes/functions.php";

make_connection(); 

extract($_POST, EXTR_OVERWRITE);
 
if($bcheck_subscribe=='true')
{
  
 
  
  if(check_email_address($subscribe_email)==1)
  {

	$subsscribe_check = "select email from tblmembers where email = '$subscribe_email' ";
  	$subsscribe_check_res  = Run($subsscribe_check);
  
  	if(Records($subsscribe_check_res)!=0)
  	{
  		redirect_to('index.php', 'user', 'exists');
  	}
    else 
  	{
   	$subsscribe = "insert into tblmembers set email = '$subscribe_email', status=1 ";
 	Run($subsscribe);
   	redirect_to('index.php', 'user', 'added');  	 
  	}
  }
  else 
  {
  redirect_to('index.php', 'user', 'invalid');
  }
}
else
{
echo "You are not allowed to be here.."; exit; 
}

 ?>