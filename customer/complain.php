<!DOCTYPE HTML>
<html>
<head>
<?php
include("controller.php");
include("customer_head.php");
?>
<title>carsikho | <?php echo $cust_details->name; ?> | Support</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/icon.png" />
<style type="text/css">
#heading{
	font-size: 1.2em;
	font-family: unset;
	color: #3F84B1;
	cursor:pointer;
}
#data{
	font-size: 1.1em;
	font-family: cursive;
	color: #34ad00;
	letter-spacing: 1px;	
	cursor:pointer;
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
<script type="text/javascript">
var HttpObject,vurl;
function genHttpobject()
{
	if(window.XMLHttpRequest)
	{
		HttpObject=new XMLHttpRequest();
	}
	else if(window.ActiveXObject)
	{
		HttpObject=new ActiveXObject("Microsoft.XMLHTTP");
	}
	else
	{
		alert("Your Browser Does not support AJAX..Please use diff Browser");
	}
}
function genComplain(vurl1,display_id)
{
	//alert("hell0");
	genHttpobject();
	if(HttpObject!=null)
	{
		HttpObject.open("GET",vurl1,true);
		HttpObject.send(null);
		HttpObject.onreadystatechange=function()
		{
			if(HttpObject.readyState==4)
			{
				document.getElementById(display_id).innerHTML=HttpObject.responseText;
			}
		}
	}
}
function newTicket()
{
	vurl="controller.php?ticket=true";
	genComplain(vurl,'ticket_display');
}
function prevTicket()
{
	vurl="controller.php?oldticket=true";
	genComplain(vurl,'ticket_display');
}
function complain_detail(cmpid)
{
	//alert(cmpid);
	vurl="controller.php?viewticket="+cmpid;
	//alert(vurl);
	genComplain(vurl,'ticket_display');		
}
</script>
</head>
<body>
<?php 
include("customer_menu.php");
?>
<!--- maint content -->

<center style="margin:20px;">
<h3>Raise Your Complain</h3>
</center>

<div class="row">
	<div class="col-sm-12">
		<form name="post">
		<center><input type="text" size="50" id="sch" placeholder="Enter Your Complain Id"><span class="glyphicon glyphicon-search" style="margin:10px;border-style:groove;padding:3px;" onclick="complain_detail(document.getElementById('sch').value)"></span></center>
		</form>
	</div>
</div>

<div class="row" style="border-style:outset;margin:10px;">
	<div class="col-sm-3">
		<div class="row">
			<div class="col-sm-11"  style="margin:20px;border-bottom-style:inset;"><p id="heading" style="cursor:pointer;" onClick="newTicket()">Open New Ticket</p></div>
		</div>
		<div class="row">
			<div class="col-sm-11"  style="margin:20px;border-bottom-style:inset;"><p id="heading" onclick="prevTicket()" style="cursor:pointer;">Your Privious Complain</p></div>
		</div>
	</div>
	<div class="col-sm-9" style="border-left-style:outset;overflow:auto;" height="100%" id="ticket_display">
		<?php 
		if(mysqli_num_rows($complain_details)==0)
		{
			?>
				<div class="row">
					<div class="col-sm-9"><center><p id="ink">You Dont have any Privious Complain</p></center></div>
				</div>
			<?php
		}
		else
		{
			?>
			<div class="row" style="border-bottom-style:inset;margin-bottom:20px;">
				<div class="col-sm-3"><p id="heading" >Complain ID</p></div>
				<div class="col-sm-3"><p id="heading">Complain Subject</p></div>
				<div class="col-sm-3"><p id="heading">Complain</p></div>
				<div class="col-sm-3"><p id="heading">Solution</p></div>
			</div>
			<?php
			while($row=$complain_details->fetch_object())			
			{
				?>
				<div class="row" style="border-bottom-style:inset;margin-bottom:20px;">
					<div class="col-sm-3"><p id="data"><?php echo $row->complainid; ?></p></div>
					<div class="col-sm-3"><p id="data"><?php echo $row->subject; ?></p></div>
					<div class="col-sm-3"><p id="data"><?php echo $row->complain; ?></p></div>
					<div class="col-sm-3"><p id="data"><?php echo $row->solution; ?></p></div>
				</div>
				<?php
			}
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