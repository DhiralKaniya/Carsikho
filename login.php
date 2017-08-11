<!DOCTYPE HTML>
<html>
<head>
<title>Carsikho | Login</title>
<?php
include("controller.php");
include("carsikho_view.php");
?>
</head>
<body>
<?php
include("carsikho_head.php");
?>
<!-- if user nd email doesnot match then this will display error -->
<?php
if(isset($_SESSION['loginerror']))
{
	?>
    <div class="alert alert-danger">
    <center><h3><?php echo $_SESSION['loginerror']; ?></h3></center>
    </div>
    <?php
    //setcookie("loginerror","",-1,'/');
	unset($_SESSION['loginerror']);
}
?>
<!-- /error code -->
<!--login contain-->
<div height=100%>
<center>
<form method="post" name="loginform">
<div style="margin-bottom:100px;"></div>
<div style="margin-left:500px;padding:20px;margin-right:500px;border-left-style:inset;border-top-style:inset;border-right-style:outset;border-bottom-style:outset">
<h3 style="font-family: cursive;color: #FF4500; ">Login</h3>
<br/>
	<input type="textbox" placeholder="Enter EmailId" name="txtEmail" size="30"><br/><br/>
    <input type="password" placeholder="Enter Password" name="txtPass" size="30"><br/><br/>
    <input type="text" placeholder="captcha code" name="txtcaptcha" required size="24">--<img src="captcha_code.php"><br/><br/>
    <input type="submit" class="btn btn-success" value="login" style="width:20em;" name="login">
</form>
</div>
</center>

</div>
<div style="margin-bottom:150px"></div>
<!-- / login Contain-->
<!--- /footer-btm ---->
<?php
include("carsikho_footer.php");
?>
<!--- /copy-right ---->
</body>
</html>