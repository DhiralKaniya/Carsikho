<!DOCTYPE HTML>
<html>
<head>
<title>carsikho | admin | Customer</title>
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
<h3>Customer Manage</h3>
</center>
<div class="pending-mdts-display" style="margin: 20px;overflow:auto;">
<table class="table hover">
	<caption>Block/	New Customers</caption>

		<tr>
			<td>Sr No.</td>
			<td>Customer Name</td>
			<td>DOB</td>
			<td>Email</td>
			<td>Contact No</td>
			<td>Address</td>
			<td>Date of Joing</td>
			<td>lic Pic</td>
			<td>Profile Pic</td>
			<td>Status</td>
		</tr>
		<?php 
		if(isset($cust_block_detail))
		{
			while($row=$cust_block_detail->fetch_object())
			{
				?>
				<tr>
				<td><?php echo $cbi+1; ?></td>
				<td><a href="customer.php?cstid=<?php echo $row->id; ?>#custdisp"><?php echo $row->name; ?></a></td>
				<td><?php echo $row->dob; ?></td>
				<td><?php echo $row->email; ?></td>
				<td><?php echo $row->contactno; ?></td>
				<td><?php echo $row->address; ?></td>
				<td><?php echo $row->regdate; ?></td>
				<td><img src="../customer/<?php echo $row->licensepic; ?>" height="50px" width="50px"></td>
				<td><img src="../customer/<?php echo $row->profilepic; ?>" height="50px" width="50px"></td>
				<td><a href="customer.php?custid=<?php echo $row->id; ?>&status=<?php echo $row->status; ?>"><?php echo $row->status; ?></a></td>
				</tr>
				<?php
				$cbi++;
				if($cbi%10==0)
				{
					break;
				}
			}
		}
		?>

</table>
<center><a href="customer.php?custdis2=<?php echo $cai-20; ?>"><span class="glyphicon glyphicon-arrow-left"></a>
		<a href="customer.php?custdis2=<?php echo $cai; ?>"><span class="glyphicon glyphicon-arrow-right"></a></center>
</div>

<div class="pending-mdts-display" style="margin: 20px;overflow:auto;">
<table class="table hover">
	<caption>Active Customers</caption>

		<tr>
			<td>Sr No.</td>
			<td>Customer Name</td>
			<td>DOB</td>
			<td>Email</td>
			<td>Contact No</td>
			<td>Address</td>
			<td>Date of Joing</td>
			<td>lic Pic</td>
			<td>Profile Pic</td>
			<td>Status</td>
		</tr>
		<?php 
		if(isset($cust_app_detail))
		{
			while($row=$cust_app_detail->fetch_object())
			{
				?>
				<tr>
				<td><?php echo $cai+1; ?></td>
				<td><a href="customer.php?cstid=<?php echo $row->id; ?>#custdisp"><?php echo $row->name; ?></a></td>
				<td><?php echo $row->dob; ?></td>
				<td><?php echo $row->email; ?></td>
				<td><?php echo $row->contactno; ?></td>
				<td><?php echo $row->address; ?></td>
				<td><?php echo $row->regdate; ?></td>
				<td><img src="../customer/<?php echo $row->licensepic; ?>" height="50px" width="50px"></td>
				<td><img src="../customer/<?php echo $row->profilepic; ?>" height="50px" width="50px"></td>
				<td><a href="customer.php?custid=<?php echo $row->id; ?>&status=<?php echo $row->status; ?>"><?php echo $row->status; ?></a></td>
				</tr>
				<?php
				$cai++;
				if($cai%10==0)
				{
					break;
				}
			}
		}
		?>
</table>
<center><a href="customer.php?custdis1=<?php echo $cai-20; ?>"><span class="glyphicon glyphicon-arrow-left"></a>
		<a href="customer.php?custdis1=<?php echo $cai; ?>"><span class="glyphicon glyphicon-arrow-right"></a></center>
</div>

<!-- form Display -->

<div style="margin:20px;">
<table class="table hover" id="custdisp">
<?php
if(isset($cust_display))
	{
		?>
		<caption><b>* <u><?php echo $cust_display->name; ?>'s Details</u></b></caption>
		<tr>
			<td>Date Of Birth</td>
			<td><?php echo $cust_display->dob; ?></td>
		</tr>
		<tr>
			<td>Email Id</td>	
			<td><?php echo $cust_display->email; ?></td>
		</tr>
		<tr>
			<td>Contact No </td>
			<td><?php echo $cust_display->contactno; ?></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><?php echo $cust_display->address; ?></td>
		</tr>
		<tr>
			<td>City</td>
			<td><?php echo $city_detail->cityname; ?></td>
		</tr>
		<tr>
			<td>Registration Date</td>
			<td><?php echo $cust_display->regdate; ?></td>
		</tr>
		<tr>
			<td>License Pic</td>
			<td><img src="../customer/<?php echo $cust_display->licensepic; ?>" height="250px" width="250px"></td>
		</tr>
		<tr>
			<td>Profile Pic</td>
			<td><img src="../customer/<?php echo $cust_display->profilepic; ?>" height="250px" width="250px"></td>
		</tr>
		<tr>
			<td>Status</td>
			<td><a href="customer.php?custid=<?php echo $cust_display->id; ?>&status=<?php echo $cust_display->status; ?>"><?php echo $cust_display->status; ?></a></td>
		</tr>
		<?php 
	}
?>
</table>
</div>
<!--- /footer-btm ---->
<?php
include("carsikho_footer.php");
?>
<!--- /copy-right ---->
</div>
</body>
</html>