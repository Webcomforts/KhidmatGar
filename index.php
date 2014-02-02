<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Khidmatgar</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<script type="text/javascript">

function validate_signup()
{

	if(document.getElementById('appendedInputButton').value=="")
	{
		document.getElementById('appendedInputButton').focus();
		return false;
	}
	else
	{
		var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
		
		if(document.getElementById('appendedInputButton').value.search(emailRegEx) == -1)
		{
			document.getElementById('appendedInputButton').style.backgroundColor = '#e3e3e3';
			document.getElementById('appendedInputButton').focus();
			return false;
		}
		else
		{
			document.getElementById('subscribe').submit();
		}
	}
	
}


function validate_login()

{

	
	
	if(document.getElementById('inputEmail').value=="")
	{
		document.getElementById('inputEmail').focus();
		return false;
	}
	
	else
	{
		var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
		
		if(document.getElementById('inputEmail').value.search(emailRegEx) == -1)
		{
			document.getElementById('inputEmail').style.backgroundColor = '#e3e3e3';
			document.getElementById('inputEmail').focus();
			return false;
		}
		
	}
	if(document.getElementById('inputPassword').value=="")
	{
		document.getElementById('inputPassword').focus();
		return false;
	}
	else
		{
			document.getElementById('loginform').submit();
		}
}
</script>
<body style="background:url(images/bg-login.jpg) top left no-repeat">
	<div class="demo"><img src="images/mascot.jpg" width="496" height="248" /></div>
<div class="sign-up-in">
    	<div class="sign-up">
    		<div class="input-append">
  <form action="subscribe.php" id="subscribe" method="post" >
  
  <input class="span2" name="subscribe_email" id="appendedInputButton" placeholder="Email Address" type="text">
  
  <input type="hidden" name="bcheck_subscribe" value="true"  />
  
  <button class="btn" type="button" onclick="return validate_signup();">Submit</button>
  
  </form>
</div>
    	</div>
        <?php 
		if(isset($_GET['user']))
		{ 
			if($_GET['user']=='exists'){ echo '<p class="message_box">User already exists. Please login!</p>'; }
			if($_GET['user']=='invalid'){ echo '<p class="error_box">User Invalid. Please Try again!</p>'; }
			if($_GET['user']=='added'){ echo '<p class="message_box">Please check inbox for login details.</p>'; } 
		}
		?>
        
    	<div class="sign-in">
   	    	<img src="images/sign-in.jpg" width="78" height="25" />
            <form class="form-horizontal" action="validate.php" id="loginform" method="post">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Password"> <input type="hidden" name="bcheck_login" value="true"  />
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="button" onclick="return validate_login();" class="btn">Sign in</button>
      <button type="button" class="btn btn-link">Forgot Password</button>
    </div>
  </div>
</form>
        </div>
        <p>By signing up you indicate that you have read and agree to the <a href="#">Terms of Service.</a></p>
    </div>
</body>
</html>
