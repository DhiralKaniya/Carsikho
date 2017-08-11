<!DOCTYPE HTML>
<html>
<head>
<title>carsikho | admin | FAQ</title>
<?php
include("controller.php");
include("carsikho_view.php");
?>
<!-- AJAX -->
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
function setOutput(url,disid)
{
	getHttpObject();
	if(httpObject!=null)
	{
		httpObject.open("GET",url,true);
		httpObject.send(null);
		httpObject.onreadystatechange=function()
		{
			if(httpObject.readyState==4)
			{
				document.getElementById(disid).innerHTML=httpObject.responseText;
			}
		}
	}
}
function newFaq()
{
	setOutput("controller.php?newFaq=true","tbl_contain");
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
<h3>FAQ Manage</h3>
</center>

<!-- FAQ Contain -->
<div align="right" style="margin: 20px;">
<form method="post">
	<input type="button" value="Add FAQ" name="addfaq" onclick="newFaq()">
</form>
</div>

<div>
<form name="add" method="post">

	<?php
	/* FAQ Update */
	 	if(isset($upd_res))
		{
			?>
			<table class="table-condensed" align="center" style="margin:20px;overflow:auto;" id="tbl_contain">
			<input type="hidden" value="<?php echo $upd_res->faqid; ?>" name="txtFaqid">
				<tr>
					<td style="margin:10px;">Question</td>
					<td style="margin:10px;"><textarea name="txtQuestion" placeholder="Enter Question" required cols="50"><?php echo $upd_res->question; ?></textarea></td>
				</tr>
				<tr>
					<td style="margin:10px;">Answer</td>
					<td style="margin:10px;"><textarea name="txtAnswer" placeholder="Enter Answer" required cols="50"><?php echo $upd_res->answer; ?></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td style="margin:10px;"><input type="Submit" value="Update FAQ" name="updFaq"></td>
				</tr>
			</table>
			<?php
		}
		else if(isset($faqdetail))
		{
			/* FAQ Add */
			?>
			<table class="table-condensed" align="center" style="margin:20px;" id="tbl_contain">
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
					<td><a href="faq.php?faqupd=<?php echo $row->faqid; ?> ">Edit</a></td>
				</tr>
				<tr>
					<td>A<?php echo $i+1;?>.</td>
					<td><?php echo $row->answer; ?></td>
					<td><a href="faq.php?faqdel=<?php echo $row->faqid; ?> ">Delete</a></td>
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
			?>
		</table>
		<center><a href="faq.php?disid=<?php echo $i-20; ?>"><span class="glyphicon glyphicon-arrow-left"></a>
		<a href="faq.php?disid=<?php echo $i; ?>"><span class="glyphicon glyphicon-arrow-right"></a></center>
			<?php
		}
	?>
</form>
</div>

</div>

<!-- FAQ Contain-->

<!--- /footer-btm ---->
<?php
include("carsikho_footer.php");
?>
<!--- /copy-right ---->
</div>
</body>
</html>