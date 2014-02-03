<?php 

include "includes/functions.php";
include("includes/class.upload.php");
make_connection(); 

$bcheck = $_POST['bcheck'];

if($bcheck=='true'){
	extract($_POST, EXTR_OVERWRITE);
	 
	
	$title = cleanString($title);
	$page_heading = cleanString($page_heading);
	
	$strSQL = "insert into tblproblems set title ='$title', details ='$details', parent_id ='$parent_id'    ";
	Run($strSQL);
	
	$ID = mysql_insert_id();	
	
		
	if($_FILES['banner']['name']!=''){
	 list($ImageWidth, $ImageHeight) = getimagesize($_FILES['banner']['tmp_name']);
		
		$title_img = str_replace(" ", "_", cleanString($title)); 
		$title_img = str_replace(":", "_", $title_img);
		 
		$_FILES['banner']['name']=strtolower($_FILES['banner']['name']);
		$_FILES['banner']['name']=explode("." , $_FILES['banner']['name']);
		$_FILES['banner']['name']="problem_in_pakistan_".$ID.".".$_FILES['banner']['name'][1];
		
		$Pic = $_FILES['banner']['name'];
		$Pic = ereg_replace("-","_",$Pic);
		$Pic = ereg_replace(" ","_",$Pic);
		$Pic1 = $_FILES['banner']; 
		//echo $Pic1; 
		$target_path2 ="problems/";
		$handle = new upload($Pic1);
		
		if($ImageWidth < 800){
			
			if ($handle->uploaded) {
			
			$handle->image_resize       	= false;
			$handle->process("$target_path2");
			}
		
		}
		else
		{
			
			$newImageHeight = ( $ImageHeight * 800 ) / $ImageWidth; 
			if ($handle->uploaded) {
			
			$handle->image_resize       	= true;
			$handle->image_x            	= 800;
			$handle->image_y        		= $newImageHeight;	
			$handle->process("$target_path2");
			}

			}
		 
		
		// save image name in database
		$pic_sql = "update tblproblems set picture= '$Pic' where id = $ID";
		Run($pic_sql);
	 
	
}	
	 redirect_to('home.php', 'problem', 'added');
}

include "MasterTop.php"; ?>


<div id="content">

<div id="listing">

<script type="text/javascript">
function validate_ad(form)
{
	if(form.title.value == '')
	{
		form.title.focus();
		form.title.style.backgroundColor='#e8e8e8';
		return false;
	}
	
	 
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
    <td align="right" width="98" class="form_labels">Category&nbsp;</td>
    <td width="511" align="left"  ><select name="parent_id" id="parent_id" style="width:472px;"  >
      
    <?php 
	
	$ParentRS = Run("select id, title from tblcategories "); 
	while($ParentROW = GetRow($ParentRS)){
	
	
	?>
 	
    <option value="<?php echo $ParentROW['id']; ?>"><?php echo $ParentROW['title']; ?></option>
      
      <?php 
	  
	}
	  
	  ?>
      </select>&nbsp;</td>
  </tr>
    
    <tr>
           <td align="right" width="98" class="form_labels" > Title</td>
           <td align="left"  ><input type="text" name="title" id="title" value="" size="72" />
             &nbsp;<font style="color:#8c3131;   ">*</font></td>
         </tr>
          <tr>
           <td align="right" width="98" class="form_labels" > Picture:</td>
           <td align="left"  > <input type="file" name="banner" id="banner"     value=""    /></td>
         </tr>
          <tr>
            <td align="right" width="98" style="vertical-align:top" > Details </td>
            <td align="left"  ><textarea  cols="66" rows="8"   name="details" style="font-size:12px;"></textarea> 
              &nbsp;</td>
          </tr>
    
  
    
      
     
  <tr>
    <td align="right" width="98" class="form_labels" >&nbsp;</td>
    <td align="left"  ><input type="submit" value="Submit Problem" onClick="return validate_ad(document.getElementById('newsForm'));" style="padding:5px;" />  <input type="hidden" value="true" name="bcheck" />
  
    </td>
    </tr>
</table>
</form>
 
<div style="clear:both;">&nbsp;</div>
</div>

<?php include "SideBar.php"; ?>

<?php include "Footer.php"; ?>