<?php
include("controller.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Carsikho | Sign Up | MDTS Registration</title>
<?php 
include("carsikho_view.php");
?>
<!-- AJax Start -->
<script type="text/javascript">
var httpObject;
function getHttpObject()
{
	if(window.XMLHttpRequest)
	{
		httpObject=new XMLHttpRequest();
	}
	else if(window.ActiveXObject)
	{
		httpObject=new ActiveXObject("Microsoft.XMLHTTP");
	}
	else
	{
		alert("Your Browser Does not support AJAX..Please use diff Browser");
	}
}
function statename(cityid)
{
	//alert(cityid);
	getHttpObject();
	if(httpObject!=null)
	{
		httpObject.open("GET","controller.php?cityid="+cityid,true);
		httpObject.send(null);
		httpObject.onreadystatechange=function()
		{
			if(httpObject.readyState==4)
			{
				document.getElementById('state').innerHTML=httpObject.responseText;
			}
		}
	}
}
</script>
<!--/ajax End-->
</head>
<body>
<?php 
include("carsikho_head.php");
?> 
 <div class="error_blog">
 	<?php 
 		if(isset($_SESSION['error']))
 		{
 			?>
 			<div class="alert alert-danger">
 			<center><h3><?php echo $_SESSION['error']; ?></h3></center>
 			</div>
 			<?php
 			unset($_SESSION['error']);
 		}
 	?>
 </div>

<!-- MDTS Registration Form -->
<div class="Registration" style="overflow:auto;margin:20px;">
<h2 style="color:blue;margin-bottom:20px;">Motor Driving Training School Registration Form</h2>
  <p style="color:red">*Please Enter Valid Details Only</p>            
  <p style="color:red;margin-bottom:20px;">*Valid Motor Driving Training School will got Confirmation Message,Username and Password by Carsikho  within 24 hours</p>    
  <form name="mdtsreg" method="post" enctype="multipart/form-data">
  <table class="table table-condensed">
    	<tr>
        	<th>Motor Driving Training School Name</th>
            <td><input type="text" name="txtName" placeholder="Motor Driving Training School Name" size="83" pattern="^[a-zA-Z0-9 _@]+$" required></td>
        </tr>
        
        <tr>
        	<th>Contact Number</th>
            <td><input type="text" name="txtContact" placeholder="Motor Driving Trainig Contact Number" size="83" pattern="^[0-9]{10}$" required></td>
        </tr>
        
        <tr>
        	<th>Email Id</th>
            <td><input type="text" name="txtEmail" placeholder="Motor Driving Training School Email" size="83" pattern="^[a-zA-Z0-9 ._@]+$" required></td>
        </tr>
        <tr>
        	<th>Motor Driving School Headoffice Address</th>
            <td><textarea name="txtAdd" cols="85" rows="5" Placeholder="Motor Driving Training School Address" pattern="^[a-zA-Z0-9 _@]+$" required></textarea></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input type="password" name="txtPass" placeholder="Motor Driving Training School Password" size="83" pattern="^[a-zA-Z0-9 _@]{6,12}+$" required></td>
        </tr>
        <tr>
        	<th>Select City</th>
        	<td >
            	<select onChange="statename(this.value)" name="city">
                	<option value="1">Select City</option>
                    <!--city filling-->
               		<?php 
						while($fe=$city->fetch_object())
						{
							?>
                            <option value="<?php echo $fe->id; ?>"><?php echo $fe->cityname; ?></option>
                            <?php
						}
					?>
                </select>
            </td>
        </tr>
        <tr>
        	<td>State</td>
            <td id="state" name="txtState" size="83" placeholder="Select Your City"></td>
        </tr>
        <tr>
        	<th>Motor Driving Training School's License No/Pic</th>
            <td><input type="file" name="mdtslic" required></td>
        </tr>
        <tr>
        	<th>Upload Motor Driving Training School's Profile Pic</th>
            <td><input type="file" name="profilepic" required></td>
        </tr>
          <tr>
          	<th>Captcha Code</th>
        	<td>
        	<input type="text" placeholder="Enter captcha code" name="txtcaptcha" required>--
        	<img src="captcha_code.php">
        	</td>
        </tr>
        <tr>
        	<td></td>
            <td><input type="Submit" value="Register" name="register">
            <input type="Reset" value="Reset" name="Reset"></td>
        </tr>
  </table>
  </form>
</div>
<!-- /MDTS Registration Form-->
<!--- /footer-btm ---->
<?php 
include("carsikho_footer.php");
?>
<!--- /copy-right ---->
</div>
</body>
</html>