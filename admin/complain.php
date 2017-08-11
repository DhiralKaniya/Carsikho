<!DOCTYPE HTML>
<html>
<head>
<title>carsikho | admin | online Carshikho</title>
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
<h3>Complain Manage</h3>
</center>

<div class="pending-complain-display" style="margin: 20px;overflow:auto;">
	<table class="table hover">
	<caption><b>* <u> Pending Complain</b></u></caption>
		<tr>
			<td>Sr No.</td>
			<td>Customer Name</td>
			<td>Customer Email Id</td>
			<td>Contact No</td>
			<td>Complain</td>
			<td>Complain Date</td>
			<td>Complain Status</td>
		</tr>
		<?php 
		if(isset($pen_complain))
		{
			while($row=$pen_complain->fetch_object())
			{
				?>
				<tr>
				<td><?php echo $i+1; ?></td>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->email ?></td>
				<td><?php echo $row->contactno; ?></td>
				<td><?php echo $row->complain; ?></td>
				<td><?php echo $row->complain_date; ?></td>
				<td><?php echo $row->status; ?></td>
				</tr>
				<?php
				$i++;
				if($i%10==0)
				{
					break;
				}
			}
		}
		?>
	</table>
	<center><a href="complain.php?disid1=<?php echo $i-20; ?>"><span class="glyphicon glyphicon-arrow-left"></a>
		<a href="complain.php?disid1=<?php echo $i; ?>"><span class="glyphicon glyphicon-arrow-right"></a></center>
</div>

<div class="Attend-complain-display" style="margin: 20px;overflow:auto;">
	<table class="table hover">
	<caption><b>* <u> Attended Complain</b></u></caption>
		<tr>
			<td>Sr No.</td>
			<td>Customer Name</td>
			<td>Customer Email Id</td>
			<td>Contact No</td>
			<td>Complain</td>
			<td>Solution</td>
			<td>Attended_date</td>
			<td>Complain Status</td>
		</tr>
		<?php 
		if(isset($att_complain))
		{
			$j=0;
			while($row=$att_complain->fetch_object())
			{
				?>
				<tr>
				<td><?php echo $j+1; ?></td>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->email ?></td>
				<td><?php echo $row->contactno; ?></td>
				<td><?php echo $row->complain; ?></td>
				<td><?php echo $row->solution; ?></td>
				<td><?php echo $row->attended_date; ?></td>
				<td><?php echo $row->status; ?></td>
				</tr>
				<?php
				$j++;
				if($j%10==0)
				{
					break;
				}
			}
		}
		?>
	</table>
	<center><a href="complain.php?disid2=<?php echo $j-20; ?>"><span class="glyphicon glyphicon-arrow-left"></a>
		<a href="complain.php?disid2=<?php echo $j; ?>"><span class="glyphicon glyphicon-arrow-right"></a></center>
</div>

<!--- /footer-btm ---->
<?php
include("carsikho_footer.php");
?>
<!--- /copy-right ---->
</div>
</body>
</html>