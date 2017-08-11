<!DOCTYPE HTML>
<html>
<head>
<?php
include("controller.php");
include("customer_head.php");
?>
<title>carsikho | <?php echo $cust_details->name; ?> | About Us</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/icon.png" />
<style type="text/css">
.heading{
	font-size: 1.2em;
	font-family: unset;
	color: #3F84B1;
}
#heading{
	font-size: 1.2em;
	font-family: unset;
	color: #3F84B1;
}
#data{
	font-size: 1.1em;
	font-family: cursive;
	color: #34ad00;
	letter-spacing: 1px;	
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
</head>
<body>
<?php
include("customer_menu.php");
?>
<!-- Main Contain -->

<div class="row wow fadeInRight animated" data-wow-delay=".1s" style="margin:10px;padding:10px;border-right-style:inset;border-bottom-style:inset;border-left-style:outset;border-top-style:outset;">
<div class="col-sm-2"><img src="../images/ab_2.jpg" height="150px" width="150px"></div>
<div class="col-sm-10">
		<p id="heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Main Purpose of application is to provide the best guidelines about the Motor Driving Training School. In the application, Motor Driving Training School can register their profile with the Motor Driving Training School’s License details and admin can check their profile and approve for the Carsikho.in. This website covers all the Professional Motor Driving Training School of India.
		</p>
</div>
</div>

<div class="row wow fadeInLeft animated" data-wow-delay=".1s"" style="margin:10px;padding:10px;border-right-style:inset;border-bottom-style:inset;border-left-style:outset;border-top-style:outset;">
<div class="col-sm-10">
	<p id="data">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By using the web-application, Motor Driving Training school can add car details which are available for the Motor Driving Training and set the schedule for the particular car according to their availability and admin can check car profile and approve for the Carsikho.in.
		</p>
</div>
<div class="col-sm-2"><img src="../images/ab_1.jpg" height="150px" width="150px"></div>
</div>

<div class="row wow fadeInRight animated" data-wow-delay=".1s"" style="margin:10px;padding:10px;border-right-style:inset;border-bottom-style:inset;border-left-style:outset;border-top-style:outset;">
<div class="col-sm-2"><img src="../images/ab_4.jpg" height="150px" width="150px"></div>
<div class="col-sm-10">
		<p id="heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The new functionality of Carsikho.in is the E-car Learning. Register Motor Driving Training school can upload their car training video for the customers and Register customer can show e-car learning video and can understand about car training.
		</p>
</div>
</div>

<div class="row wow fadeInLeft animated" data-wow-delay=".1s"" style="margin:10px;padding:10px;border-right-style:inset;border-bottom-style:inset;border-left-style:outset;border-top-style:outset;">
<div class="col-sm-10">
	<p id="data">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By using the web-application, Customer can register his/her profile with their four wheeler driving license details and admin can check his/her details and approve for the Carsikho.in. Customer can check Motor Driving Training School’s details according their name and area. After checking the details customer can book training according to defined schedule and make payment for the particular training schedule. Motor Driving Training School can check their booked customer details and Customer also can also view booked training details. 
		</p>
</div>
<div class="col-sm-2"><img src="../images/ab_3.jpg" height="150px" width="150px"></div>
</div>
<!-- /Main Contain -->
<!--- /copy-right ---->
<?php
include("customer_footer.php");
?>
</body>
</html>