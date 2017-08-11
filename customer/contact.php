<!DOCTYPE HTML>
<html>
<head>
<?php
include("controller.php");
include("customer_head.php");
?>
<title>carsikho | <?php echo $cust_details->name; ?> | Contact</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/icon.png" />
</head>
<body>
<?php
include("customer_menu.php");
?>

<!--contnet-->
<div style="margin-top:50px">
<center>
<h3>Contact Us</h3>
<?php 
    if(isset($_SESSION['successful']))
    {
        ?>
        <div class="alert alert-success">
            <h2><?php echo $_SESSION['successful']; ?></h2>
        </div>
        <?php
        unset($_SESSION['feedback']);
    }
?>
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
        <td><textarea name="txtRev" rows="5" cols="40"></textarea></td>
    </tr>
    <tr>
    	<td>Email Id</td>
    	<td>:-</td>
    	<td><input type="email" name="txtEmail" size="28" value="<?php echo $cust_details->email; ?>" readonly></td>
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
include("customer_footer.php");
?>
<!--- /copy-right ---->
</body>
</html>