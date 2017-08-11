<!DOCTYPE HTML>
<html>
<head>
<title>carsikho | admin Home</title>
<?php
include("controller.php");
include("carsikho_view.php");
?>
</head>
<body>
<!-- top-header -->
<?php
include("admin_menu.php");
?>
<!--Main Contain-->
<center style="margin: 10px;">
<h3>Welcome Admin to Carsikho</h3>
</center>
<!-- Total Contain -->
<div width="100%">
<div class="routes">
	<div class="container">
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="mdts.php"><img src="../images/bulding.png" height="50px" width="50px"></img></a>
			</div>
			<div class="rou-rgt wow fadeInDown animated" data-wow-delay=".5s">
				<h3><?php echo $total_mdts; ?></h3>
				<p>Motor Driving Training Schools arround India</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="customer.php"><i class="fa fa-user"></i></a>
			</div>
			<div class="rou-rgt">
				<h3><?php echo $total_cust; ?></h3>
				<p>Customer arround India</p>
                
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="booking.php"><i class="fa fa-ticket"></i></a>
			</div>
			<div class="rou-rgt">
				<h3><?php echo $total_appoint; ?></h3>
				<p>Total Booking</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="routes" width="100%">
	<div class="container">
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="mdts.php#mdtsdisp"><img src="../images/car.png" height="50px" width="50px"></img></a>
			</div>
			<div class="rou-rgt wow fadeInDown animated" data-wow-delay=".5s">
				<h3><?php echo $total_car; ?></h3>
				<p>Total Training car</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left">
			<div class="rou-left">
				<a href="ecar.php"><img src="../images/play-button.png" height="50px" width="50px"></img></a>
			</div>
			<div class="rou-rgt">
				<h3><?php echo $total_video; ?></h3>
				<p>E car videos</p>
                
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="#"><img src="../images/city.png" height="50px" width="50px"></img></a>
			</div>
			<div class="rou-rgt">
				<h3><?php echo $total_city; ?></h3>
				<p>City Cover</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<!-- /Total Contain-->
<!-- Feedback Contain-->

<div width="100%" style="overflow:scroll;">
<?php
	if(isset($fdback))
	{
		?>
		
		<table class="table-striped" align="center" width="100%" style="margin:20px; border-style: dashed;overflow:auto;" border="1">
				<tr>
					<td colspan="4"><center><h3>Feedback Details</h3></center></td>
				</tr>
				<tr>
					<td>Sr No</td>
					<td>Feedback</td>
					<td>Email Id</td>
					<td>Feedback Date</td>
				</tr>
				<?php
				$i=1;
				while($row=$fdback->fetch_object())
				{
					?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row->feedback; ?></td>
						<td><?php echo $row->emailid; ?></td>
						<td><?php echo $row->date; ?></td>
					</tr>
					<?php
					if($i==10)
					{
						break;
					}
				}
				?>
		</table>
	<?php 
}
?>
</div>
<!-- /Feedback Contain-->
<!--- /footer-btm ---->
<?php
include("carsikho_footer.php");
?>
<!--- /copy-right ---->
</div>
</body>
</html>