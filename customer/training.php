<!DOCTYPE HTML>
<html>
<head>
<?php
include("controller.php");
include("customer_head.php");
?>
<title>Carsikho | <?php echo $cust_details->name; ?> | Training Details </title>
<link rel="shortcut icon" type="image/x-icon" href="../images/icon.png" />
<style type="text/css">
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
<!-- User Define AJAX -->

<script type="text/javascript">
var hObject;
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
function fnd(val)
{
	alert("hello");
	var user="controller.php?findmdts="+val;
	genOutput(user,'mdtsdisplay');
}
function output(value)
{
	//alert("hello");
	var user="controller.php?cardetail=<?php echo $_REQUEST['cardetail']; ?>&mdts=<?php echo $_REQUEST['mdts']; ?>&csid="+value;
	genOutput(user,'schedule_display');
}
function d_set(curr_date,day)
{
	var vurl="controller.php?curr_date="+curr_date+"&addday="+day;
	//alert(userurl);
	genOutput(vurl,'Up_date');
}
function checkava()
{
	var vurl;
	//alert("hello");
	vurl="controller.php?checkava=true&startdate="+document.getElementById('startdate').value+"&lastdate="+document.getElementById('lastdate').value+"&csid="+document.getElementById('txtCsid').value+"&mdts=1";
	//alert(userurl);
	genOutput(vurl,'btndis');
}
</script>
<script type="text/javascript">
var httpObject;
function gethttpObject()
{
	if(window.XMLHttpRequest)
	{
		httpObject=new XMLHttpRequest();
	}
	else if(window.ActiveXObject)
	{
		httpObject=new ActiveXObject("Microsoft.XMLHTTP");
	}
	else
	{
		alert("Your Browser Does not support AJAX..Please use diff Browser");
	}
}
function setOutput(vurl,did)
{
	//alert(did);
	gethttpObject();
	if(httpObject!=null)
	{
		httpObject.open("GET",vurl,true);
		httpObject.send(null);
		httpObject.onreadystatechange=function()
		{
			if(httpObject.readyState==4)
			{
				document.getElementById(did).innerHTML=httpObject.responseText;
			//	alert(did);
			}
		}
	}
}
function fnd(val)
{
	//alert("hello");
	var user="controller.php?findmdts="+val;
	//alert(user);
	setOutput(user,'mdtsdisplay');
}
</script>
</head>
<body style="overflow:none;">
<?php 
include("customer_menu.php");
?>
<!--- maint content -->
<div id="confi_details">
<?php	
if(isset($last_record))
{
	?>
	<div>
	<center style="margin:20px" class="wow fadeInRight animated" data-wow-delay=".1s">
	<h3>Pick Your Confirmation</h3>
	</center>
	<form method="post" enctype="multipart/form-data">
	<div class="row" style="margin:20px;">
		<div class="col-sm-3" align="center">
			<img src="../mdts/<?php echo $last_record->carpic; ?>" height="300px" width="200px">
		</div>

		<div class="col-sm-9" style="border-left-style:outset;">
			<div class="row" style="margin:20px;border-bottom-style:inset;">
				<div class="col-sm-4"><p id="heading">Your Training From</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $last_record->name; ?></p></div>
				<input type="hidden" name="txtCustname" value="<?php echo $cust_details->name; ?>" >
				<input type="hidden" name="txtBookingid" value="<?php echo $last_record->bookingid; ?>" >
				<input type="hidden" name="txtCustadress" value="<?php echo $cust_details->address; ?>" >
				<input type="hidden" name="txtCustcontactno" value="<?php echo $cust_details->contactno; ?>" >
				<input type="hidden" name="txtTraining" value="<?php echo $last_record->name; ?>">
			</div>
			<div class="row" style="margin:20px;border-bottom-style:inset;">
				<div class="col-sm-4"><p id="heading">Motor Driving Training School Address</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $last_record->address; ?></p></div>
				<input type="hidden" name="txtAddress" value="<?php echo $last_record->address; ?>">
			</div>
			<div class="row" style="margin:20px;border-bottom-style:inset;">
				<div class="col-sm-4"><p id="heading">Motor Driving Training Contact No</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $last_record->contactno; ?></p></div>
				<input type="hidden" name="txtContactno" value="<?php echo $last_record->contactno; ?>">
			</div>
			<div class="row" style="margin:20px;border-bottom-style:inset;">
				<div class="col-sm-4"><p id="heading">Your Training Car</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $last_record->carname; ?></p></div>
				<input type="hidden" name="txtCarname" value="<?php echo $last_record->carname; ?>">
			</div>
			<div class="row" style="margin:20px;border-bottom-style:inset;">
				<div class="col-sm-4"><p id="heading">Your Training CarNumber</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $last_record->carnumber; ?></p></div>
				<input type="hidden" name="txtCarnumber" value="<?php echo $last_record->carnumber; ?>">
			</div>
			<div class="row" style="margin:20px;border-bottom-style:inset;">
				<div class="col-sm-4"><p id="heading">Your Pick up point</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $last_record->picuppoint; ?></p></div>
				<input type="hidden" name="txtPicuppoint" value="<?php echo $last_record->picuppoint; ?>">
			</div>
			<div class="row" style="margin:20px;border-bottom-style:inset;">
				<div class="col-sm-4"><p id="heading">Your Training Booking Date</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $last_record->booking_date; ?></p></div>
				<input type="hidden" name="txtBookingdate" value="<?php echo $last_record->booking_date; ?>">
			</div>
			<div class="row" style="margin:20px;border-bottom-style:inset;">
				<div class="col-sm-4"><p id="heading">Your Training Start Date</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $last_record->training_to; ?></p></div>
				<input type="hidden" name="txtStartdate" value="<?php echo $last_record->training_to; ?>">
			</div>
			<div class="row" style="margin:20px;border-bottom-style:inset;">
				<div class="col-sm-4"><p id="heading">Your Training End Date</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $last_record->training_from; ?></p></div>
				<input type="hidden" name="txtEnddate" value="<?php echo $last_record->training_from; ?>">
			</div>
			<div class="row" style="margin:20px;border-bottom-style:inset;">
				<div class="col-sm-4"><p id="heading">Your Training Time</p></div>
				<div class="col-sm-8"><p id="data">Sharp at <?php echo $last_record->mdtstime; ?></p></div>
				<input type="hidden" name="txtMdtstime" value="<?php echo $last_record->mdtstime; ?>">
			</div>
			<div class="row" style="margin:20px;border-bottom-style:inset;">
				<div class="col-sm-4"><p id="heading">Your Training Price</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $last_record->price; ?></p></div>
				<input type="hidden" name="txtPrice" value="<?php echo $last_record->price; ?>">
			</div>
			<div class="row" style="margin:20px;border-bottom-style:inset;">
				<div class="Col-sm-12"><input type="submit" class="btn btn-success" name="pdfgen" Value="Get Your Invoice Copy"></div>
			</div>
		</div>
	</form>
	</div>
	<?php
}
else if(isset($_REQUEST['view_mdtsid']))
	{
		?>
<center style="margin:20px" class="wow fadeInRight animated" data-wow-delay=".1s">
<h3><?php echo $mdts_details->name; ?>'s Details</h3>
</center>
		<div class="row wow fadeInUp animated" data-wow-delay=".1s" style="margin:20px;">
			<div class="col-sm-4" style="border-right-style:inset;" align="center">
				<img src="../mdts/<?php echo $mdts_details->profilepic; ?>" height="250px"></img>
			</div>
			<div class="col-sm-8">
			<!-- caption basic info -->
			<div class="row">
				<div class="col-sm-12"><p id="lnk">Basic Informartion</p></div>
			</div>
			<!-- basic info display -->
				<div class="row">
					<div class="col-sm-2">
						<p id="heading">Address</p>
					</div>
					<div class="col-sm-10">
						<p id="data"><?php echo $mdts_details->address; ?></p>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-2">
						<p id="heading">Contact No</p>
					</div>
					<div class="col-sm-10">
						<p id="data"><?php echo $mdts_details->contactno; ?></p>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-2">
						<p id="heading">Email ID</p>
					</div>
					<div class="col-sm-10">
						<p id="data"><?php echo $mdts_details->email; ?></p>
					</div>
				</div>
				<!-- Branch Details -->
			<div class="row">
				<div class="col-sm-12"><p id="lnk">Branches Details</p></div>
			</div>
			<?php 
				if(mysqli_num_rows($branch_details)==0)
				{
					?>
					<div class="row">
						<div class="col-sm-12">
							<p id="lnk"><?php echo $mdts_details->name; ?> does not have any Branch..!</p>
						</div>
					</div>
					<?php
				}
				else
				{
					?>
					<div>
					<div class="row">
							<div class="col-sm-3"><p id="heading">Branch Name</p></div>
							<div class="col-sm-2"><p id="heading">Contact no</p></div>
							<div class="col-sm-4"><p id="heading">Email Id</p></div>
							<div class="col-sm-3"><p id="heading">address</p></div>
					</div>
					<?php
					while($row=$branch_details->fetch_object())
					{
						?>
						<div class="row">
							<div class="col-sm-3"><p id="data"><?php echo $row->branchname; ?></p></div>
							<div class="col-sm-2"><p id="data"><?php echo $row->contactno; ?></p></div>
							<div class="col-sm-4"><p id="data"><?php echo $row->emailid; ?></p></div>
							<div class="col-sm-3"><p id="data"><?php echo $row->address; ?></p></div>
						</div>
						<?php
					}
					?>
					</div>
					<?php
				}
			?>
			</div>
		</div>
	<?php
		if(isset($car_details))
		{
			?>
			<div class="container">
			<div class="row wow fadeInLeft animated" data-wow-delay=".3s" style="overflow:none;margin-bottom:20px;margin-top:20px;">
			<div class="col-sm-12">
			<?php
			if(mysqli_num_rows($car_details)==0)
			{
				?>
				<div class="row">
					<div class="col-sm-12" align="center">
						<p id="lnk"><?php echo $mdts_details->name; ?>'s does not have any Training car</p>
					</div>
				</div>
				<?php
			}
			else
			{
				?>
				<div class="row">
					<div class="col-sm-12" align="center">
						<p id="lnk"><?php echo $mdts_details->name; ?>'s Training car</p>
					</div>
				</div>
				<div class="row">
					<?php 
						$i=0;
						while($row=$car_details->fetch_object())
						{
							?>
			 				<div class="col-sm-3" align="center" style="border-right-style:inset;border-left-style:outset;">	
							<figure>
								<img src="../mdts/<?php echo $row->carpic; ?>" style="margin:10px;" height="125px"></img>
								<figcaption><a href="training.php?cardetail=<?php echo $row->carid; ?>&mdts=<?php echo $_REQUEST['view_mdtsid']; ?>"><p id="data"><?php echo $row->carname; ?></p></a></figcaption>
							</figure>
							</div>
							<?php
							$i++;
							if($i%4==0)
							{
								?>
								</div>
								<div class="row">
								<?php
							}
						}
					?>
				</div>
			
				<?php
			}
			?>
			</div>
			</div>
			</div>
			<?php
		}
		?>
		<?php
	}
	else if(isset($_REQUEST['cardetail'])&&isset($_REQUEST['mdts']))
	{
		$_SESSION['mdts']=$_REQUEST['mdts'];
		?>
		<form method="post" enctype="multipart/form-data">
		<center style="margin:20px;" class="wow fadeInRight animated" data-wow-delay=".3s">
		<h3>Details of <?php echo $car_detail->carname; ?> of <?php echo $mdts_details->name; ?></h3>
		</center>
		<div class="row wow fadeInRight animated" data-wow-delay=".3s">
			<div class="col-sm-5" style="border-right-style:inset;border-bottom-style:inset;border-left-style:outset;margin:20px;" align="center">
			<figure>
				<img src="../mdts/<?php echo $car_detail->carpic; ?>" style="margin:20px;" height="250px">
			</figure>
			</div>
			<div class="col-sm-6">
				<div class="row" style="margin:20px;">
					<div class="col-sm-4"><p id="heading">Car Model Name</p></div>
					<div class="col-sm-8"><p id="data"><?php echo $car_detail->carname; ?></p></div>
				</div>
				<div class="row" style="margin:20px;">
					<div class="col-sm-4"><p id="heading">Car Number</p></div>
					<div class="col-sm-8"><p id="data"><?php echo $car_detail->carnumber; ?></p></div>
				</div>
				<div id="schedule_display">
					<?php 
						if(mysqli_num_rows($car_schedule)==0)
						{
							?>
							<div class="row">
								<div class="col-sm-12"><p id="lnk"><?php echo $car_detail->carname; ?> does now have schedule for Training</p></div>
							</div>
							<?php
						}
						else
						{
							?>
							<div class="row" style="margin:30px;">
							<div class="row">
								<div class="col-sm-5" align="center"><p id="heading">Timing</p></div>
								<div class="col-sm-3" align="center"><p id="heading">Training Day</p></div>
								<div class="col-sm-3" align="center"><p id="heading">Price</p></div>
								<div class="col-sm-1" align="center"></div>
							</div>
							<?php
							while($row=$car_schedule->fetch_object())
							{
								?>
								<div class="row" style="margin-top:10px;">
									<div class="col-sm-5" align="center"><p id="data"><?php echo $row->time; ?></p></div>
									<div class="col-sm-3" align="center"><p id="data"><?php echo $row->noofday; ?></p></div>
									<div class="col-sm-3" align="center"><p id="data"><?php echo $row->price; ?></p></div>
									<div class="col-sm-1" align="center"><a id="lnk" onclick="output('<?php echo $row->csid; ?>')">Book</a></div>
								</div>
								<?php
							}
							?>
							</div>
							<?php
						}
					?>
				</div>
			</div>
		</div>
		</form>
		<?php
	}
	else
	{
		if(isset($nr_mdts))
		{
			?>
<center class="wow fadeInDown animated" data-wow-delay=".1s" style="margin:20px;">
<h3>Motor Driving Training Schools to your Nearest Area</h3>
<form enctype="multipart/form-data" method="post">
<input type="text" onkeyup="fnd(this.value)" size="50"><span class="glyphicon glyphicon-search" style="margin:10px;border-style:groove;padding:3px;"></span>

</form>
</center>

<div id="mdtsdisplay">
			<?php
			while($row=$nr_mdts->fetch_object())
			{
				?>
				<div class="row wow fadeInDown animated" data-wow-delay=".3s" style="margin:20px;border-bottom-style:inset;order-right-style:inset;border-left-style:outset;border-width:5px;"> 
					<div class="col-sm-3" style="margin-bottom:20px;border-right-style:inset;" align="center"><img src="../mdts/<?php echo $row->profilepic; ?>" height="125em"></div>
					<div class="col-sm-8">
						<div class="row">
							<div class="col-sm-3"><p id="heading">Name</p></div>
							<div class="col-sm-6"><p id="data"><?php echo $row->name; ?></p></div>
							<div class="col-sm-3" align="right"><a href="training.php?view_mdtsid=<?php echo $row->id; ?>" id="lnk">View Details</a></div>
						</div>
						<div class="row">
							<div class="col-sm-3"><p id="heading">Address</p></div>
							<div class="col-sm-9"><p id="data"><?php echo $row->address; ?></p></div>
						</div>
						<div class="row">
							<div class="col-sm-3"><p id="heading">Email Address</p></div>
								<div class="col-sm-9"><p id="data"><?php echo $row->email; ?></p></div>
						</div>
						<div class="row">
							<div class="col-sm-3"><p id="heading">contact No</p></div>
							<div class="col-sm-9"><p id="data"><?php echo $row->contactno; ?></p></div>
						</div>
					</div>
				</div>
				<?php
			}
			while($row=$other_mdts->fetch_object())
			{
				?>
				<div class="row wow fadeInDown animated" data-wow-delay=".3s" style="margin:20px;border-bottom-style:inset;order-right-style:inset;border-left-style:outset;border-width:5px;"> 
					<div class="col-sm-3" style="margin-bottom:20px;border-right-style:inset;" align="center"><img src="../mdts/<?php echo $row->profilepic; ?>" height="125em"></div>
					<div class="col-sm-8">
						<div class="row">
							<div class="col-sm-3"><p id="heading">Name</p></div>
							<div class="col-sm-6"><p id="data"><?php echo $row->name; ?></p></div>
							<div class="col-sm-3" align="right"><a href="training.php?view_mdtsid=<?php echo $row->id; ?>" id="lnk">View Details</a></div>
						</div>
						<div class="row">
							<div class="col-sm-3"><p id="heading">Address</p></div>
							<div class="col-sm-9"><p id="data"><?php echo $row->address; ?></p></div>
						</div>
						<div class="row">
							<div class="col-sm-3"><p id="heading">Email Address</p></div>
								<div class="col-sm-9"><p id="data"><?php echo $row->email; ?></p></div>
						</div>
						<div class="row">
							<div class="col-sm-3"><p id="heading">contact No</p></div>
							<div class="col-sm-9"><p id="data"><?php echo $row->contactno; ?></p></div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
			<?php
		}
	}
?>
</div>
<!--- /main content -->
<!-- Copy-right -->
<?php 
include("customer_footer.php");
?>
<!--- /copy-right ---->
<!--- /copy-right ---->
</body>
</html>