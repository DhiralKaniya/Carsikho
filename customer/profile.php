<!DOCTYPE HTML>
<html>
<head>
<?php
include("controller.php");
include("customer_head.php");
?>
<title>carsikho | <?php echo $cust_details->name; ?> | Profile</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/icon.png" />
<style type="text/css">
#heading{
	font-size: 1.2em;
	font-family: unset;
	color: #3F84B1;
	cursor:pointer;
}
#data{
	font-size: 1.1em;
	font-family: cursive;
	color: #34ad00;
	letter-spacing: 1px;	
	cursor:pointer;
}
#lnk
{
	font-size: 1.0em;
	font-family: cursive;
	color: red;
	cursor: pointer;
	letter-spacing: 1.5px;	
	margin-bottom: 10px;
	margin-top: 10px;
}
</style>
<script type="text/javascript">
var hObject;
var dispid="update_display";
function getObject()
{
	if(window.XMLHttpRequest)
	{
		hObject=new XMLHttpRequest();
	}
	else if(window.ActiveXObject)
	{
		hObject=new ActiveXObject("Microsoft.XMLHTTP");
	}
	else
	{
		alert("Your Browser Does not support AJAX..Please use diff Browser");
	}
}
function genOutput(userurl,divid)
{
	//alert(divid);
	getObject();
	if(hObject!=null)
	{
		hObject.open("GET",userurl,true);
		hObject.send(null);
		hObject.onreadystatechange=function()
		{
			if(hObject.readyState==4)
			{
				document.getElementById(divid).innerHTML=hObject.responseText;
				//alert(divid);
			}
		}
	}
}
function setProfile()
{
	//alert("hello");
	userurl="controller.php?profilepic=true";
	genOutput(userurl,dispid);
}
function setUsername()
{
	userurl="controller.php?username=true"
	genOutput(userurl,dispid);
}
function setPassword()
{
	userurl="controller.php?password=true"
	genOutput(userurl,dispid);
}
function setAddress()
{
	userurl="controller.php?address=true"
	genOutput(userurl,dispid);
}
function setLicensepic()
{
	userurl="controller.php?licensepic=true"
	genOutput(userurl,dispid);
}
function setContactno()
{
	userurl="controller.php?contactno=true"
	genOutput(userurl,dispid);
}
function home()
{
	window.location="profile.php";
}
function oldpasscheck(pass)
{
	userurl="controller.php?oldcheck="+pass;
	genOutput(userurl,'passdisp');
}
</script>
</head>
<body>
<?php 
include("customer_menu.php");
?>
<!--- maint content -->

<center style="margin:20px;">
<h3 onclick="home()" style="cursor:pointer;">Update Your Profile</h3>
</center>
<?php 
	if(isset($_SESSION['error']))
	{
		?>
		<div class="alert alert-danger">
			<center><p id="lnk"><?php echo $_SESSION['error']; ?></p></center>
		</div>
		<?php
		unset($_SESSION['error']);
	}
?>
<div style="margin-bottom:80px">
	<div class="row" style="border-top-style:outset;border-bottom-style:inset;margin:10px;">
		<div class="col-sm-3" >
			<div class="row"><div class="col-sm-12" style="margin-top:20px;margin-left:20px;"><p id="heading" onclick="setProfile()">Change Your Profile Pic</p></div></div>
			<div class="row"><div class="col-sm-12" style="margin-top:30px;margin-left:20px;"><p id="heading" onclick="setUsername()">Change Your Username</p></div></div>
			<div class="row"><div class="col-sm-12" style="margin-top:30px;margin-left:20px;"><p id="heading" onclick="setPassword()">Change Your Password</p></div></div>
			<div class="row"><div class="col-sm-12" style="margin-top:30px;margin-left:20px;"><p id="heading" onclick="setAddress()">Change Your Address</p></div></div>
			<div class="row"><div class="col-sm-12" style="margin-top:30px;margin-left:20px;"><p id="heading" onclick="setLicensepic()">Change Your License Pic</p></div></div>
			<div class="row"><div class="col-sm-12" style="margin-top:30px;margin-left:20px;"><p id="heading" onclick="setContactno()">Change Your Contact No</p></div></div>
		</div>
		<div class="col-sm-9" id="update_display" style="border-left-style:outset;overflow:auto;">
			<div class="row">
				<div class="col-sm-5" align="center"><img src="<?php echo $cust_details->profilepic; ?>" style="border-radius:20px;margin:10px;" height="350px" width="350px;"></div>
				<div class="col-sm-7">
					<div class="row">
						<div class="col-sm-12" style="margin:20px;"><p id="data"><?php echo $cust_details->name; ?></p></div>
					</div>
					<div class="row">
						<div class="col-sm-12" style="margin:20px;"><p id="data"><?php echo $cust_details->email; ?></p></div>
					</div>
					<div class="row">
						<div class="col-sm-12" style="margin:20px;"><p id="data"><?php echo $cust_details->address; ?></p></div>
					</div>
					<div class="row">
						<div class="col-sm-12" style="margin:20px;"><p id="data"><?php echo $cust_details->contactno; ?></p></div>
					</div>
					<div class="row">
						<div class="col-sm-12" style="margin:20px;">
						<figure>	
							<figcaption><p id="lnk">License Pic</p></figcaption>	
							<img src="<?php echo $cust_details->licensepic; ?>" height="150px" width="150px">
						</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--- /main content -->
<!-- Copy-right -->
<?php 
include("customer_footer.php");
?>
<!--- /copy-right ---->
</div>
</body>
</html>