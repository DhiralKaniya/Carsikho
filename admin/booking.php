<!DOCTYPE HTML>
<html>
<head>
<title>carsikho | admin | booking</title>
<?php
include("controller.php");
include("carsikho_view.php");
?>
<!-- Custom Theme files -->
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
</head>
<body>
<!-- top-header -->
<?php
include("admin_menu.php");
?>
<!--Main Contain-->
<center style="margin: 20px">
<h3>Booking Details</h3>
</center>
<div style="margin:20px;overflow:auto;">
	<table id="example" class="table-hover">
	<caption><a href="booking.php?dis_history=true"><span class="glyphicon glyphicon-save" style="float:right;cursor:pointer;"> Download</span></a></caption>
		<thead>
		<tr role="row">
			<th>Sr No</th>
			<th>Customer</th>
			<th>MDTSName</th>
			<th>CarModel</th>
			<th>CarName</th>
			<th>Timing</th>
			<th>Boking_date</th>
			<th>Training_start</th>
			<th>Training_end</th>
			<th>Pic_UP_Point</th>
		</tr>
		</thead>
		<tbody >
				<?php 
				$i=1;
				while($row=$book_rec->fetch_object())
				{
					?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row->custname; ?></td>
						<td><?php echo $row->mdtsname; ?></td>
						<td><?php echo $row->carname; ?></td>
						<td><?php echo $row->carnumber; ?></td>
						<td><?php echo $row->mdtstime; ?></td>
						<td><?php echo $row->booking_date; ?></td>
						<td><?php echo $row->training_to; ?></td>
						<td><?php echo $row->training_from; ?></td>
						<td><?php echo $row->picuppoint; ?></td>
					</tr>
					<?php
				}
				?>
		</tbody>
	</table>
</div>
		
<!-- /Main Contain -->

<!--- /footer-btm ---->
<?php
include("carsikho_footer.php");
?>
<!--- /copy-right ---->
</div>
</body>
</html>