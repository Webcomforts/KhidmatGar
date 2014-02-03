<?php 

include "includes/functions.php";
include("includes/class.upload.php");
make_connection(); 


$ID = cleanString($_GET['problem']);
$ID; 

$bcheck = $_POST['bcheck'];

if($bcheck=='true'){
	extract($_POST, EXTR_OVERWRITE);
	 
	
	$details = cleanString($details);
	$email = $_SESSION['inputEmail']; 
	
	$strSQL = "insert into tblsolutions set problem_id ='$ID', member_id ='$email', details ='$details'    ";  
	Run($strSQL);
	
	$ID = mysql_insert_id();	
	
		
	if($_FILES['banner']['name']!=''){
	 list($ImageWidth, $ImageHeight) = getimagesize($_FILES['banner']['tmp_name']);
		
		$title_img = str_replace(" ", "_", cleanString($title)); 
		$title_img = str_replace(":", "_", $title_img);
		 
		$_FILES['banner']['name']=strtolower($_FILES['banner']['name']);
		$_FILES['banner']['name']=explode("." , $_FILES['banner']['name']);
		$_FILES['banner']['name']="solutions_in_pakistan_".$ID.".".$_FILES['banner']['name'][1];
		
		$Pic = $_FILES['banner']['name'];
		$Pic = ereg_replace("-","_",$Pic);
		$Pic = ereg_replace(" ","_",$Pic);
		$Pic1 = $_FILES['banner']; 
		//echo $Pic1; 
		$target_path2 ="solutions/";
		$handle = new upload($Pic1);
		
		 	
			if ($handle->uploaded) {
			
			$handle->image_resize       	= false;
			$handle->process("$target_path2");
			}
		 
		
		// save image name in database
		$pic_sql = "update tblsolutions set picture= '$Pic' where id = $ID";
		Run($pic_sql);
	 
	
}	
	 redirect_to('home.php', 'soltion', 'added');
}

include "MasterTop.php"; ?>


<div id="content">

<div id="listing">

<script type="text/javascript">
function validate_ad(form)
{
	 
	 
	if(form.details.value == '')
	{
		form.details.focus();
		form.details.style.backgroundColor='#e8e8e8';
		return false;
	}
 
	else{
		 document.getElementById('newsForm').submit(); 
		}
}
</script>
<form method="post" id="newsForm" action=""  enctype="multipart/form-data" style="float:left; width:644px;">  <table width="644" border="0" cellspacing="5" cellpadding="5" > 
         <tr>
    <td align="right" width="98" class="form_labels">Problem&nbsp;</td>
    <td width="511" align="left"  > 
    <?php 
	
$PRS = Run("select title from tblproblems where id = '$ID' "); 
$PROW = GetRow($PRS); 

echo $PROW ['title'];
 
	  
	  ?>
      </select>&nbsp;</td>
  </tr>
    
   
          <tr>
           <td align="right" width="98" class="form_labels" > Solution:</td>
           <td align="left"  > <input type="file" name="banner" id="banner"     value=""    /></td>
         </tr>
          <tr>
            <td align="right" width="98" style="vertical-align:top" > Describe:</td>
            <td align="left"  ><textarea  cols="66" rows="8"   name="details" style="font-size:12px;"></textarea> 
              &nbsp;</td>
          </tr>
    
  
    
      
     
  <tr>
    <td align="right" width="98" class="form_labels" >&nbsp;</td>
    <td align="left"  ><input type="submit" value="Submit Solution" onClick="return validate_ad(document.getElementById('newsForm'));" style="padding:5px;" />  <input type="hidden" value="true" name="bcheck" />
  
    </td>
    </tr>
</table>
</form>
 
<div style="clear:both;">&nbsp;</div>
</div>
<?php include "SideBar.php"; ?>

<?php include "Footer.php"; ?>