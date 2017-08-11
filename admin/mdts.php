<!DOCTYPE HTML>
<html>
<head>
<title>carsikho | admin | MDTS</title>
<?php
include("controller.php");
include("carsikho_view.php");
?>
<!-- User Define AJAX -->
<script type="text/javascript">
var httpObject;
var prev_detail,i;
function getHttpObject()
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
function setOutput(url,divid)
{
	//alert(url);
	getHttpObject();
	if(httpObject!=null)
	{
		httpObject.open("GET",url,true);
		httpObject.send(null);
		//windows.location("customer.php#custdisp");
		httpObject.onreadystatechange=function()
		{
			if(httpObject.readyState==4)
			{
				document.getElementById(divid).innerHTML=httpObject.responseText;
			}
		}
	}
}
function setDetails(value,display,mdtid)
{
	if(prev_detail=='schdetails' && i==1)
	{
		i=0;
		unsetDetails('schdetails','schedule',mdtid);
	}
	else if(value=="schdetails")
	{
		i=1;
		setOutput("controller.php?schedule=true&mdtid="+mdtid+"#"+display,display);	
	}
	if(prev_detail=='general' && i==1)
	{
		i=0;
		unsetDetails('general',display,mdtid);
	}
	else if(value=="general")
	{
		i=1;
		setOutput("controller.php?general=true&mdtid="+mdtid+"#"+display,display);
	}
	if(prev_detail=='cardetails' && i==1)
	{
		i=0;
		unsetDetails('cardetails',display,mdtid);
	}
	else if(value=="cardetails")
	{
		i=1;
		setOutput("controller.php?car=true&mdtid="+mdtid+"#"+display,display);	
	}
	if(prev_detail=='ecar' && i==1)
	{
		i=0;
		unsetDetails('ecar',display,mdtid);
	}
	else if(value=="ecar")
	{
		i=1
		setOutput("controller.php?ecar=true&mdtid="+mdtid+"#"+display,display);	
	}
	prev_detail=value;
}
function unsetDetails(value,display,mdtid)
{
	setOutput("controller.php?contain="+value+"&mdtid="+mdtid+"#"+display,display);	
}
function setcarsch(value,display,mdtid,carid)
{
	setOutput("controller.php?contain="+value+"&mdtid="+mdtid+"&carid="+carid,display);	
}
</script>
</head>
<body>
<!-- top-header -->
<?php
include("admin_menu.php");
?>
<!--Main Contain-->
<center style="margin: 10px;">
<h3>Motor Driving Training School Manage</h3>
</center> 	

<div class="pending-mdts-display" style="margin:20px;overflow:auto;">
<table class="table hover">
	<caption>New/Block Training School</caption>

		<tr>
			<td>Sr No.</td>
			<td>MDTS Name</td>
			<td>Address</td>
			<td>Contact No</td>
			<td>Email</td>
			<td>Date of Joing</td>
			<td>lic Pic</td>
			<td>Profile Pic</td>
			<td>Status</td>
		</tr>
		<?php 
		if(isset($mdts_block_detail))
		{
			while($row=$mdts_block_detail->fetch_object())
			{
				?>
				<tr>
				<td><?php echo $mbi+1; ?></td>
				<td><a href="mdts.php?mdtid=<?php echo $row->id; ?>#mdtsdisp"><?php echo $row->name; ?></a></td>
				<td><?php echo $row->address; ?></td>
				<td><?php echo $row->contactno; ?></td>
				<td><?php echo $row->email; ?></td>
				<td><?php echo $row->regdate; ?></td>
				<td><img src="../mdts/<?php echo $row->licensepic; ?>" height="50px" width="50px"></td>
				<td><img src="../mdts/<?php echo $row->profilepic; ?>" height="50px" width="50px"></td>
				<td><a href="mdts.php?mdtsid=<?php echo $row->id; ?>&status=<?php echo $row->status; ?>"><?php echo $row->status; ?></a></td>
				</tr>
				<?php
				$mbi++;
				if($mbi%10==0)
				{
					break;
				}
			}
		}
		?>
</table>
<center><a href="mdts.php?mdtsdis2=<?php echo $mbi-20; ?>"><span class="glyphicon glyphicon-arrow-left"></a>
		<a href="mdts.php?mdtsdis2=<?php echo $mbi; ?>"><span class="glyphicon glyphicon-arrow-right"></a></center>
</div>

<div class="approve-mdts-display" style="margin:20px;overflow:auto;">
<table class="table hover">
	<caption>Active Training School</caption>
		<tr>
			<td>Sr No.</td>
			<td>MDTS Name</td>
			<td>Address</td>
			<td>Contact No</td>
			<td>Email</td>
			<td>Date-of-Joing</td>
			<td>lic Pic</td>
			<td>Profile Pic</td>
			<td>Status</td>
		</tr>
		<?php 
		if(isset($mdts_app_detail))
		{
			while($row=$mdts_app_detail->fetch_object())
			{
				?>
				<tr>
				<td><?php echo $mai+1; ?></td>
				<td><a href="mdts.php?mdtid=<?php echo $row->id; ?>#mdtsdisp"><?php echo $row->name; ?></a></td>
				<td><?php echo $row->address; ?></td>
				<td><?php echo $row->contactno; ?></td>
				<td><?php echo $row->email; ?></td>
				<td><?php echo $row->regdate; ?></td>
				<td><img src="../mdts/<?php echo $row->licensepic; ?>" height="50px" width="50px"></td>
				<td><img src="../mdts/<?php echo $row->profilepic; ?>" height="50px" width="50px"></td>
				<td><a href="mdts.php?mdtsid=<?php echo $row->id; ?>&status=<?php echo $row->status; ?>"><?php echo $row->status; ?></a></td>
				</tr>
				<?php
				$mai++;
				if($mai%10==0)
				{
					break;
				}
			}
		}
		?>
</table>
<center><a href="mdts.php?mdtsdis1=<?php echo $mai-20; ?>"><span class="glyphicon glyphicon-arrow-left"></a>
		<a href="mdts.php?mdtsid1=<?php echo $mai; ?>"><span class="glyphicon glyphicon-arrow-right"></a></center>
</div>
<!-- form Display -->

<?php
if(isset($mdts_display))
	{
		?>
<div style="margin:20px;">
<table class="table hover" id="mdtsdisp">
<caption><b>* <u><?php echo $mdts_display->name; ?>'s Details</u></b></caption>
	<tr>
	<td colspan="4" onClick="setDetails('general','basic',<?php echo $_REQUEST['mdtid']; ?>)"><font id="cnt" style="cursor:pointer;">* <u>Basic Details</u></font>
		<table class="table hover" id="basic">		
		<tr>
				<td>Email Id</td>	
				<td><?php echo $mdts_display->email; ?></td>
				<td>Status</td>
				<td><a href="mdts.php?mdtsid=<?php echo $mdts_display->id; ?>&status=<?php echo $mdts_display->status; ?>"><?php echo $mdts_display->status; ?></a></td>
			</tr>
			<tr>
				<td>Contact No </td>
				<td><?php echo $mdts_display->contactno; ?></td>
				<td>Address</td>
				<td><?php echo $mdts_display->address; ?></td>
			</tr>
			<tr>
				<td>City</td>
				<td><?php echo $city_detail->cityname; ?></td>
				<td>Registration Date</td>
				<td><?php echo $mdts_display->regdate; ?></td>
			</tr>
			<tr>
				<td>License Pic</td>
				<td><img src="../mdts/<?php echo $mdts_display->licensepic; ?>" height="250px" width="250px"></td>
				<td>Profile Pic</td>
				<td><img src="../mdts/<?php echo $mdts_display->profilepic; ?>" height="250px" width="250px"></td>
			</tr>
		</table>
	</td>
	</tr>

	<tr>
	<td colspan="4" onClick="setDetails('cardetails','car','<?php echo $_REQUEST['mdtid']; ?>')"><font id="cnt" style="cursor:pointer;">* <u>Car Details</u></font>
		<table class="table hover" id="car">
		</table>
	</td>
	</tr>

	<tr>
	<td colspan="4" onClick="setDetails('schdetails','schedule',<?php echo $_REQUEST['mdtid']; ?>)"><font style="cursor:pointer;">* <u>Schedule Details</u></font>
		<div id="schedule">
		</div>
	</td>
	</tr>

	<tr>
	<td colspan="4" onClick="setDetails('ecar','e_car',<?php echo $_REQUEST['mdtid']; ?>)"><font style="cursor:pointer;">* <u>E-Car Videos</u></font>
		<table class="table hover" id="e_car">
		</table>
	</td>
	</tr>

</table>
</div>
<?php 
}
?>
<!--- /footer-btm ---->
<?php
include("carsikho_footer.php");
?>
<!--- /copy-right ---->
</div>
</body>
</html>