<?php 

include "includes/functions.php";

make_connection(); 

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
	
	 
	if(form.page_heading.value == '')
	{
		form.page_heading.focus();
		form.page_heading.style.backgroundColor='#e8e8e8';
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
	
	echo $ParentRS = Run("select id, title from tblcategories "); 
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
           <td align="left"  > <input type="file" name="banner" id="banner"   style="padding-top:5px;" value=""    /></td>
         </tr>
          <tr>
            <td align="right" width="98" style="vertical-align:top" > Details </td>
            <td align="left"  ><textarea  cols="66" rows="8" id="page_heading" name="page_heading" style="font-size:12px;"></textarea> 
              &nbsp;</td>
          </tr>
    
  
    
      
     
  <tr>
    <td align="right" width="98" class="form_labels" >&nbsp;</td>
    <td align="left"  ><input type="submit" value="Submit Information" onClick="return validate_ad(document.getElementById('newsForm'));" style="padding:5px;" />  <input type="hidden" value="true" name="bcheck" />
  
    </td>
    </tr>
</table>
</form>
 
<div style="clear:both;">&nbsp;</div>
</div>

<div id="sideBar">

<h3>Latest Solutions</h3>

<hr  />




<img src="images/temp/02.jpg" style="float:left; padding-right:4px;" />
<a href="#">Web Based Attendence managment system for Schools and Colleges. </a>

<div style="clear:both">&nbsp;</div>


<img src="images/temp/02.jpg" style="float:left; padding-right:4px;" />
<a href="#">Web Based Attendence managment system for Schools and Colleges.</a>

<div style="clear:both">&nbsp;</div>


<img src="images/temp/02.jpg" style="float:left; padding-right:4px;" />
<a href="#">Web Based Attendence managment system for Schools and Colleges.</a>

<div style="clear:both">&nbsp;</div>


</div>

<div style="clear:both">&nbsp;</div>

</div>


<?php include "Footer.php"; ?>