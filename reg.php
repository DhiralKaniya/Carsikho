<!DOCTYPE HTML>
<html>
<head>
<title>Carsikho | Sign up | Customer Registration</title>
<?php
include("controller.php");
include("carsikho_view.php");
?>
<!-- bootstrap Userdefine -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
function setOutput(userUrl,divid)
{
    getHttpObject();
    if(httpObject!=null)
    {
        httpObject.open("GET",userUrl,true);
        httpObject.send(null);
        httpObject.onreadystatechange=function()
        {
            if(httpObject.readyState==4)
            {
                document.getElementById(divid).innerHTML=httpObject.responseText;
               // alert(divid);
            }
        }
    }
}
function license(value)
{
    //alert(value);
    var vurl;
    if(value=="yes")
    {
        vurl="controller.php?license=true";
    }
    else
    {
        vurl="controller.php?license=false";
    }
    setOutput(vurl,'lic_detail');
}
function month_display(year)
{
    var vurl="controller.php?dis_year="+year;
    setOutput(vurl,'month');
}
function date_display(month)
{
    var yr=document.getElementById('year').value;
    var vurl="controller.php?dis_day=true&month="+month+"&year="+yr;
    setOutput(vurl,'dt');
}
</script>
</head>
<body>
<!-- top-header -->
<?php
include("carsikho_head.php");
?>
<!-- Reg Form -->
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
<div class="Customer_Registration" style="overflow:auto;margin:20px;">
<h3 style="color:blue;">Customer Registration Form</h3>
  <p style="color:red;margin-top:20px;">*Please Enter Valid Details Only</p>            
  <p style="color:red;">*Only 18+ age and four wheeler+ License(LMV+) customer can fill this form </p>
  <p style="color:red;margin-bottom:20px;">*Customer will Confirmation message within 2 hours by the Carsikho</p>
<form name="userform" method="post" enctype="multipart/form-data">
	<table class="table table-condensed" aling="center">
    	<tr>
        	<th>Your Name</th>
            <td><input type="text" name="txtName" placeholder="Enter Your Name" size="50" required pattern="^[a-zA-Z0-9 _@#$!.,/]+$"></td>
        </tr>
        <tr>
        	<th>Birthdate</th>
            <td>
                <select id="year" name="year" onchange="month_display(this.value)" style="width:10%;" required>
                    <option> - Year - </option> 
                    <?php
                    $maxYear=2002;
                    $minYear=1900;
                        while($maxYear>$minYear)
                        {
                            ?>
                            <option value="<?php echo $maxYear; ?>"><?php echo $maxYear; ?></option>
                            <?php
                        $maxYear--;
                        }
                    ?>
                </select>
                <select id="month" name="month" style="width:10%;" onchange="date_display(this.value)" required>
                    <option> - Month - </option> 
                </select>
                <select id="dt" name="dt" style="width:10%;" required>
                    <option> - Date - </option> 
                </select>
            </td>   
        </tr>
        <tr>
        	<th>Your Email</th>
            <td><input type="email" name="txtEmail" placeholder="Enter Your Email" size="50" required></td>
        </tr>
        <tr>
        	<th>Password</th>
            <td><input type="Password" name="txtPass" placeholder="Enter your Pass" pattern="^[a-zA-Z0-9 _@#$!.,/]+$" size="50"><p style="color:red">password must be between 6 to 12 character with numeric,alphabatic and special characters</p></td>
        </tr>
        <tr>
        	<th>Confirm Password</th>
        	<td><input type="Password" name="txtConfpass" placeholder="Password should be match" size="50" pattern="^[a-zA-Z0-9 _@#$!.,/]+$" required></td>
        </tr>
        <tr>
        	<th>Contact no</th>
            <td><input type="text" name="txtContact" placeholder="Enter your Contact" size="50" required pattern="^[0-9]{10}$"></td>
        </tr>
        <tr>
        	<th>Address</th>
            <td><textarea name="txtAdd" cols="53" rows="7" placeholder="Enter Your Address" pattern="^[a-zA-Z0-9 _@#$!.,/]+$" required></textarea></td>
        </tr>
        <tr>
        	<td>City</td>
            <td>
            	<select onChange="statename(this.value)" required name="city" style="width:400px;">
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
        	<th>State</th>
            <td id="state"></td>
        </tr>

        <tr>
        	<th>Profile Pic</th>
            <td><input type="file" name="profilepic" required><p style="color:red;margin:10px">Profile Pic Must be in JPG or JPEG format Only</p></td>
        </tr>
        <tr>
            <th>Do You have license ?</th>
            <td><input type="radio" name="a" value="yes" onclick="license(this.value)">Yes
                <input type="radio" name="a" value="no" onclick="license(this.value)" checked>No</td>
            
        </tr>
        <tr id="lic_detail">

        </tr>
        <tr>
          	<th>Captcha Code</th>
        	<td>
        	<input type="text" placeholder="Enter captcha code" name="txtcaptcha" required>--
        	<img src="captcha_code.php">
        	</td>
        </tr>

        <tr>
        <td></td><td>
        <input type="submit" name="signup" value="Register">
        <input type="reset" name="reset" value="reset">
        </td>
        </tr>
    </table>
</form>
</div>
<!-- /Reg Form -->
<!--- /footer-btm ---->
<?php
include("carsikho_footer.php");
?>
<!--- /copy-right ---->
</div>
</body>
</html>