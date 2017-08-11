<!DOCTYPE HTML>
<html>
<head>
<title>carsikho | admin | TEST</title>
<?php
include("controller.php");
include("carsikho_view.php");
?>
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
<?php
include("admin_menu.php");
?>
<!-- top-header -->


<!--Main Contain-->
<center style="margin: 10px;">
<h3>TEST Manage</h3>
</center>
<div style="margin:10px;">
<?php
if(isset($_REQUEST['add_question']))
{
	?>
	<form method="post" enctype="multipart/form-data">	
		<table class="table table-hover" style="margin:10px;">
			<tr>
				<td>Question </td>
				<td colspan=3>
					<textarea cols="50" name="question" rows="5" required></textarea>
				</td>
			</tr>
			<tr>
				<td>Option1</td>
				<td>
					<textarea cols="50" name="option1" rows="5" required></textarea>
				</td>
				<td>Option2</td>
				<td>
					<textarea cols="50" name="option2" rows="5" required></textarea>
				</td>
			</tr>
			<tr>
				<td>Option3</td>
				<td>
					<textarea cols="50" name="option3" rows="5" required></textarea>
				</td>
				<td>Option4</td>
				<td>
					<textarea cols="50" name="option4" rows="5" required></textarea>
				</td>
			</tr>
			<tr>
				<td>Question ICON</td>
				<td colspan="3"><input type="file" name="iconpage"></td>
			</tr>
			<tr>
				<td>Answer</td>
				<td colspan="3"><input type="text" name="answer" required></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="3"><input type="submit" value="Add Question" name="que_add"></td>
			</tr>
		</table>
	</form>
	<?php
}
else if(isset($_REQUEST['upd_question']))
{
	?>
	<form method="post" enctype="multipart/form-data">	
		<table class="table table-hover" style="margin:10px;">
			<tr>
				<td>Question Id</td>
				<td colspan=3><input type="Text" name="questionid" value="<?php echo $question->questionid; ?>" size="50" readonly></td>
			</tr>
			<tr>
				<td>Question </td>
				<td colspan=3>
					<textarea cols="50" name="question" rows="5" required><?php echo $question->question; ?></textarea>
				</td>
			</tr>
			<tr>
				<td>Option1</td>
				<td>
					<textarea cols="50" name="option1" rows="5" required><?php echo $question->option1; ?></textarea>
				</td>
				<td>Option2</td>
				<td>
					<textarea cols="50" name="option2" rows="5" required><?php echo $question->option2; ?></textarea>
				</td>
			</tr>
			<tr>
				<td>Option3</td>
				<td>
					<textarea cols="50" name="option3" rows="5" required><?php echo $question->option3; ?></textarea>
				</td>
				<td>Option4</td>
				<td>
					<textarea cols="50" name="option4" rows="5" required><?php echo $question->option4; ?></textarea>
				</td>
			</tr>
			<tr>
				<td>Question ICON</td>
				<td colspan="3"><input type="file" name="iconpage"></td>
			</tr>
			<tr>
				<td>Answer</td>
				<td colspan="3"><input type="text" name="answer" required value="<?php echo $question->answer; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="3"><input type="submit" value="update" name="que_update"></td>
			</tr>
		</table>
	</form>
	<?php
}
else
{
?>
<a href="test.php?add_question=true">Add Question</a>
<table id="example">
	<thead>
		<tr>
			<th>Sr No.</th>
			<th>Question</th>
			<th>Option1</th>
			<th>Option2</th>
			<th>Option3</th>
			<th>Option4</th>
			<th>Answer</th>
			<th>Icon</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if(isset($test)){
			$i=1;
			while($row=$test->fetch_object())
			{
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $row->question; ?></td>
					<td><?php echo $row->option1; ?></td>
					<td><?php echo $row->option2; ?></td>
					<td><?php echo $row->option3; ?></td>
					<td><?php echo $row->option4; ?></td>
					<td><?php echo $row->answer; ?></td>
					<td>
					<?php
						if(!$row->img=="")
						{
							?>
							<img src="../<?php echo $row->img; ?>" height="50px" width="50px">
							<?php	
						}
					?>
					</td>
					<td><a href="test.php?upd_question=<?php echo $row->questionid; ?>">Edit</a></td>
					<td><a href="test.php?del_question=<?php echo $row->questionid; ?>">Delete</a></td>
				</tr>
				<?php
			}
		}
		?>
	</tbody>
</table>
<?php
}
?>
</div>
<!--- /footer-btm ---->
<?php
include("carsikho_footer.php");
?>
</body>
</html>