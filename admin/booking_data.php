<?php 
$conn=mysqli_connect("localhost","root","","carsikho") or die(mysqli_error());
$qry="select tc.name as custname,tm.name as mdtsname,tcar.carname,tcar.carnumber,ts.mdtstime,booking_date,training_to,training_from,picuppoint from tbl_booking tb,tbl_customer tc,tbl_car tcar,tbl_car_schedule tcs,tbl_schedule ts,tbl_mdts tm where tb.customerid=tc.id and tb.csid=tcs.csid and tcs.mdtsid=tm.id and tcs.carid=tcar.carid and tcs.scheduleid=ts.schid order by booking_date DESC";
$book_rec=$conn->query($qry) or die("excel converting problem");
?>
<html>
<body>
<table>
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
</body>
</html>

