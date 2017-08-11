<!DOCTYPE HTML>
<html>
<head>
<title>carsikho | admin | e car Video</title>
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
<center style="margin: 20px">
<h3>E car Learning Details </h3>
</center>
<?php
	if(isset($_SESSION['error']))
	{
		?>
		<div class="alert alert-danger">
		<center>
			<?php
			echo $_SESSION['error'];
			?>
		</center>
		</div>
		<?php
		unset($_SESSION['error']);
	}
?>

<div class="display" style="margin:20px;overflow:auto;"" >
<?php	
	if(isset($vid_detail))
	{
		?>
		<form method="post">
			<table class="table-responsive" align="center">
			<?php
			while($row=$vid_detail->fetch_object())
			{
				?>
				<tr>
					<td rowspan="6"><iframe style="margin: 20px;" src="<?php echo $row->video_path; ?> autoplay=0&autohide=2" height="250px" width="250px" allowfullscreen></iframe></td>
				</tr>
				<tr>
					<td><textarea rows="3" name="video_path" cols="50"><?php echo $row->video_path; ?></textarea></td>
					<td><input type="hidden" name="video_id" value="<?php echo $row->video_id; ?>"></td>
				</tr>
				<tr>
					<td><input type="text" value="<?php echo $row->video_title ?>" readonly size="50"></td>
				</tr>
				<tr>
					<td><input type="text" value="<?php echo $row->video_description; ?>" readonly size="50"></td>
				</tr>
				<tr>
					<td><input type="text" value="<?php echo $row->video_tags; ?>" readonly size="50"></td>
				</tr>
				<tr>
					<td><input type="text" value="<?php echo $row->status; ?>" size="50" readonly></td>
				</tr>
				<tr>
					<td align="center" colspan="2"><input type="submit" name="updlink" value="Update Details"></td>
				</tr>
				<?php 
			}
			?>
			</table>
		</form>
		<?php
	}
	else
	{
	if(isset($blk_video_dis))
	{
		?>
		<table class="table-responsive" width="100%">
		<caption>New/Block Video</caption>
		<tr>
			<?php
			$i=0;
			while($row=$blk_video_dis->fetch_object())
			{
				?>
				<td>
				<table class="table table-bordered">
					<tr>
					<td align="center"><iframe style="margin: 20px;" src="<?php echo $row->video_path; ?>?autoplay=0&autohide=2" height="250px" width="250px" allowfullscreen></iframe></td>
					</tr>
					<tr>
						<td align="center"><?php echo $row->video_title; ?>-<a href="ecar.php?videoid=<?php echo $row->video_id; ?>&status=<?php echo $row->status; ?>"><?php echo $row->status; ?></a>--<a href="ecar.php?updvideo=<?php echo $row->video_id; ?>">update</a></td>
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
		</table>	
		<?php
	}
	if(isset($act_video_dis))
	{
		?>
		<table class="table-responsive" width="100%">
		<caption>Active Video</caption>
		<tr>
			<?php
			$i=0;
			while($row=$act_video_dis->fetch_object())
			{
				?>
				<td>
				<table class="table table-bordered">
					<tr>
					<td align="center"><iframe style="margin: 20px;" src="<?php echo $row->video_path; ?>?autoplay=0&autohide=2" height="250px" width="250px" allowfullscreen></iframe></td>
					</tr>
					<tr>
						<td align="center"><?php echo $row->video_title; ?>-<a href="mdts.php?videoid=<?php echo $row->video_id; ?>&status=<?php echo $row->status; ?>"><?php echo $row->status; ?></a>-<a href="ecar.php?updvideo=<?php echo $row->video_id; ?>">update</a></td>
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
		</table>	
		<?php
	}
}
	?>
</div>


<!--- /footer-btm ---->
<?php
include("carsikho_footer.php");
?>
<!--- /copy-right ---->
</div>
</body>
</html>