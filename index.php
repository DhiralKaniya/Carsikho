<!DOCTYPE HTML>
<html>
<head>
<title>Carsikho | Online Carsikho</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.png" />
<?php 
include("carsikho_view.php");
include('controller.php');
?>
</head>
<body style="margin:auto;">
<?php
include("carsikho_head.php");
?>

<!-- banner ---->
<div class="banner">
	<!-- <div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> Carsikho.com</h1>
	</div>-->
</div>
<div class="container">
	<div class="col-md-5 bann-info1 wow fadeInLeft animated" data-wow-delay=".5s">
		<i class="fa fa-columns"></i>
		<h3>INDIA'S BEST MOTOR DRINING TRAINING ASSCOCIATION</h3>
	</div>
    <div class="col-md-5 bann-info1 wow fadeInLeft animated" data-wow-delay=".5s">
		<i class="fa fa-columns"></i>
		<h3>INDIA'S BEST MOTOR DRIVING TRAINING SCHOOL</h3>
	</div>
	</div>
	<div class="clearfix"></div>
</div>
<!--- /banner ---->
<!--- rupes ---->
<div class="container">
	<div class="rupes">
		<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
				<a href=""><i class="fa fa-usd"></i></a>
			</div>
			<div class="rup-rgt">
				<h3>OFFERS WILL ANNOUCED SOON</h3>
				<h4><a href="offers.html">BOOKED SMART</a></h4>
				<p>Book Using SAFE PAYMENT GATEWAYS</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
				<a href=""><i class="fa fa-h-square"></i></a>
			</div>
			<div class="rup-rgt">
				<h3>HIGHWAY CAR LEARINING</h3>
				<h4><a href="">MOTOR DRIVING TRAINING SCHOOL AROUND THE WORLD</a></h4>
				<p></p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
				<a href="offers.html"><i class="fa fa-mobile"></i></a>
			</div>
			<div class="rup-rgt">
				<h3>CARSIKHO in <br>ANDRIOD & IOS</h3>
				<h4>Will available in soon</h4>
				<p></p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--- /rupes ---->
<!---holiday---->
<div class="container">
	<div class="holiday">
		<div class="col-md-3 holiday-left animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
			<img src="images/4.jpg" class="img-responsive" alt="">
		</div>
		<div class="col-md-6 holiday-mid animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
		<h3>Summer Motor Driving Training Packages</h3>
		<p>Pick-up Drop Services...<br>Unlimited Killometer...<br>Professional & Verified Trainer..</p>
		</div>
		<div class="col-md-3 holiday-left animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
			<img src="images/5.jpg" class="img-responsive" alt="">
		</div>
			<div class="clearfix"></div>
	</div>
</div>
<!---/holiday---->
<!--- routes ---->
<div class="routes">
	<div class="container">
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="#"><i class="fa fa-truck"></i></a>
			</div>
			<div class="rou-rgt wow fadeInDown animated" data-wow-delay=".5s">
				<h3><?php echo $total_mdts; ?></h3>
				<p>Motor Driving Training Schools</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left">
			<div class="rou-left">
				<a href="#"><i class="fa fa-user"></i></a>
			</div>
			<div class="rou-rgt">
				<h3><?php echo $total_cust; ?></h3>
				<p>Customer</p>
                
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="#"><i class="fa fa-ticket"></i></a>
			</div>
			<div class="rou-rgt">
				<h3><?php echo $total_appoint; ?></h3>
				<p>Booking Sold</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--- /routes ---->
<!---copy-right ---->
<?php
include("carsikho_footer.php");
?>
<!--- /copy-right ---->
</body>
</html>