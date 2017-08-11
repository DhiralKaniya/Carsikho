<!DOCTYPE HTML>
<html>
<head>
<?php
include("controller.php");
include("customer_head.php");
?>
<title>carsikho | <?php echo $cust_details->name; ?> | Details</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/icon.png" />
<script src="../js/jquery-1.12.0.min.js"></script>
<link href="table/jquery.dataTables.min.css"  type="text/css" rel="stylesheet" />
 <script type="text/javascript" src="table/jquery.dataTables.min.js"></script>
    <script>
	$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>
<style type="text/css">
#heading{
	font-size: 1.2em;
	font-family: unset;
	color: #3F84B1;
}
</style>
</head>
<body>
<?php 
include("customer_menu.php");
?>
<!--- maint content -->

<center style="margin:20px;">
<h3>Your Training Details</h3>
</center>
<div class="row" style="overflow:auto;margin:10px;">
<div class="col-sm-12">
	<?php 
	if(mysqli_num_rows($booked_details)==0)
	{
		?>
		<center style="margin-top:20px;border-bottom-style:inset;border-top-style:outset;margin-bottom:300px;">
		<a id="heading" href="training.php">Opps !!., You Dont have booked any type of Training on carsikho...</a>
		</center>
		<?php
	}
	else
	{
	?>
		<table id="example" class="table-hover" style="overflow:auto;">
			<thead>
			<tr role="row">
				<th>Sr No</th>
				<th>MDTSName</th>
				<th>Address</th>
				<th>Contactno</th>
				<th>CarModel</th>
				<th>CarNumber</th>
				<th>Timing</th>
				<th>Boking_date</th>
				<th>Training_start</th>
				<th>Training_end</th>
				<th>Pick_UP_Point</th>
				<th>Invoice</th>
			</tr>
			</thead>
			<?php 
			$i=1;
				while($row=$booked_details->fetch_object())
				{
					?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row->name; ?></td>
						<td><?php echo $row->address; ?></td>
						<td><?php echo $row->contactno; ?></td>
						<td><?php echo $row->carname; ?></td>
						<td><?php echo $row->carnumber; ?></td>
						<td><?php echo $row->mdtstime; ?></td>
						<td><?php echo $row->booking_date; ?></td>
						<td><?php echo $row->training_to; ?></td>
						<td><?php echo $row->training_from; ?></td>
						<td><?php echo $row->picuppoint; ?></td>
						<td><a target="_blank" href="../invoice/<?php echo $row->invoice; ?>"><?php echo $row->invoice; ?></a></td>
					</tr>	
					<?php
				}
			?>
		</table>
	<?php 
	}
	?>
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