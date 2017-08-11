<!DOCTYPE HTML>
<html>
<head>
<title>Carsikho | FAQ </title>
<?php
include("controller.php");
include("carsikho_view.php");
?>
<!-- User Define AJAX -->
<script type="text/javascript">
var httpObject;
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
function setOutput(value)
{
	getHttpObject();
	if(httpObject!=null)
	{
		httpObject.open("GET","controller.php?findfaq="+value,true);
		httpObject.send(null);
		//windows.location("customer.php#custdisp");
		httpObject.onreadystatechange=function()
		{
			if(httpObject.readyState==4)
			{
				document.getElementById('tbl_contain').innerHTML=httpObject.responseText;
				//alert(url);
			}
		}
	}
}
</script>
<!--//end-animate-->
</head>
<body>
<!-- top-header -->
<?php
include("carsikho_head.php");
?>
<!-- Main Content -->

<div style="margin:20px;">
<form name="add" method="post">
<label style="font-color:blue;">Search :- <input type="text" onkeyup="setOutput(this.value)" size="50"></label>
	<table id="tbl_contain" class="table-condensed" align="center" style="overflow:auto;" width="100%">
	<?php
	if(isset($faqdetail))
		{
			?>
			<tr>
					<td colspan="2"><hr></td>
				</tr>
			<?php
				while($row=$faqdetail->fetch_object())
				{

				?>
				<tr>
					<td>Q<?php echo $i+1;?>.</td>
					<td><?php echo $row->question; ?></td>
				</tr>
				<tr>
					<td>A<?php echo $i+1;?>.</td>
					<td><?php echo $row->answer; ?></td>
				</tr>
				<tr>
					<td colspan="2"><hr></td>
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
		<center><a href="faq.php?disid=<?php echo $i-20; ?>"><span class="glyphicon glyphicon-arrow-left"></a>
		<a href="faq.php?disid=<?php echo $i; ?>"><span class="glyphicon glyphicon-arrow-right"></a></center>
</form>
</div>


<!-- / Main content -->
<!-- copy right -->
<?php
include("carsikho_footer.php");
?>
<!--- /copy-right ---->
</div>
</body>
</html>