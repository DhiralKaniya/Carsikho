<!DOCTYPE HTML>
<html>
<head>
<?php
include("controller.php");
include("customer_head.php");
?>
<title>carsikho | <?php echo $cust_details->name; ?> | E-car_learning</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/icon.png" />
</head>
<body>
<?php 
include("customer_menu.php");
?>
<!--- maint content -->

<center style="margin:20px;">
<h3>E Car Video</h3>
</center>

<div class="ecarContain" style="margin:20px; overflow:auto;">
<table class="table-responsive" width="100%" align="center" >

<tr>
<th><b>*Government Video</b></th>
</tr>
	<td>
		<table align="center" class="table-hover" style="margin:10px;">
			<tr>
				<td><iframe width="250px" height="300px" src="https://www.youtube.com/embed/7EYLzGRX8r0?autoplay=0&autohide=2" frameborder="1" allowfullscreen style="margin:20px;"></iframe></td>
			</tr>
			<tr>
				<td align="center" style="width:30px;">Automated Drivng Test Track RTO</td>
			</tr>
			<tr>
				<td style="font-size:1.0em;" align="center">Video By:-Govt Of Gujarat</td>
			</tr>
		</table>
	</td>
<tr>
<td></td>
</tr>

<tr>
<th colspan="4"><b>*Motor Driving School's Video</b></th>
</tr>
	<?php 
		if(isset($video_details))
		{
			$i=0;
			?>
			<?php
			while($row=$video_details->fetch_object())
			{
			?>
				<td>
				<table align="center" class="table-hover">
					<tr>
						<td><iframe style="margin: 20px;" src="<?php echo $row->video_path; ?>?autoplay=0&autohide=2" height="300px" width="250px" frameborder=1 allowfullscreen></iframe></td>
					</tr>
					<tr>
						<td align="center" style="width:30px;"><?php echo $row->video_title; ?>-<?php echo $row->video_description; ?></td>
					</tr>
					<tr>
						<td style="font-size:1.0em;" align="center">Video By:-<?php echo $row->name; ?></td>
					</tr>
				</table>
				</td>
			<?php
			$i++;
				if($i%4==0)
				{
					?>
					</tr>
					<tr>
					<?php
				}
			}
			?>
			</tr>
			<?php
		}
	?>
</table>
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