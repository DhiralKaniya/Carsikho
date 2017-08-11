<!DOCTYPE HTML>
<html>
<head>
<title>Carsikho | Online Carsikho</title>
<?php
include("controller.php");
include("carsikho_view.php");
?>
</head>
<body>
<?php
include("carsikho_head.php");
?>

<!--contnet-->
<div style="margin-top:50px">
<center>
<h3>Contact Us</h3>
<form name="problem" method="post">
	<table class="table table-hover" style="overflow:auto;width:30%;margin:20px;float:center;overflow:auto;">
    <tr>
    	<th>Email Us</th>
        <td>:-</td>
        <td>info@carsikho.co.in</td>
    </tr>
    <tr>
    	<th>Whatsapp us </th>
         <td>:-</td>
        <td>9033250554</td>
    </tr>
    <tr>
    	<th>Facebook</th>
                <td>:-</td>
        <td>Carsikho</td>
    </tr>
    <tr>
    	<td>Write your Feedback</td>
        <td>:-</td>
        <td><textarea name="txtRev" rows="3" cols="30"></textarea></td>
    </tr>
    <tr>
    	<td>Email Id</td>
    	<td>:-</td>
    	<td><input type="email" name="txtEmail" size="28"></td>
    </tr>
    <tr>
    	<td></td>
        <td></td>
        <td><input type="submit" value="Feedback" name="feedback"></td>
    </tr>
    </table>
    </form>
</center>
</div>
<!--/content-->
<!--- /footer-btm ---->
<?php
include("carsikho_footer.php");
?>
<!--- /copy-right ---->
</body>
</html>