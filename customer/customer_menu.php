<script type="text/javascript">
	$("document").ready(function()
	{
		$(".pro_button").click(function()
		{
			$(".profile_contain").toggle("show");
		});
	});
</script>
<style type="text/css">
	.profile_contain
	{
		display: none;
		position: absolute;
		z-index: 1;
		background: white;
		font-color:blue;
		cursor: pointer;
		width: 5em;
		height: 3em;
		right: 7.5em;
		top:2.2em;
		border-size:0.5;
		border-color: #3F84B1;
		box-shadow: 5px 5px 5px 5px rgba(0,0,0,0.3);
		text-align: center;
	}
	.profile_contain .show
	{
		display: inline-block;
	}
</style>
<div class="profile_contain">
		<a href="logout.php"><span class="glyphicon glyphicon-log-out"></span><button style="background:#fff; border-width:0px; ">Logout</button></a><br/>
		<a href="profile.php"><span class="glyphicon glyphicon-dashboard"></span> Profile</a>
</div>
<div class="top-header">
	<div class="container">
		<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 
			<li class="tol">Toll Number : Availale Shortly</li>				

			<li class="sig"><div style="margin-right:20px;">
				<div class="abc">
					<span class="pro_button" id="profile" style="heigth: 20em; width: 20em; cursor: pointer;">
						<img id="logo" src="<?php echo $cust_details->profilepic; ?>" height="30em" width="30em"></img>
					</span>
				</div>
			</li>
        </ul>
		<div class="clearfix"></div>
	</div>
	</li>
</div>
<!--- /top-header ---->
<!--- header ---->
<div class="header">
	<div class="container">
		<div class="logo wow fadeInDown animated" data-wow-delay=".5s">
			<a href="../index.php">Carsikho <span>Any Body Can Drive</span></a>	
		</div>
		<div class="lock fadeInDown animated" data-wow-delay=".5s"> 
			<li><i class="fa fa-lock"></i></li>
            <li><div class="securetxt">SAFE &amp; SECURE<br> ONLINE PAYMENTS</div></li>
			<div class="clearfix"></div>
		</div>
</div>

<!--- /header ---->
<!--- footer-btm ---->
<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
	<div class="navigation">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1" style="margin-left:20px;margin-right:20px;">
					<nav class="cl-effect-1">
						<ul class="nav navbar-nav">
							<li><a href="about.php"><spam class="glyphicon glyphicon-equalizer"> AboutUs</spam></a></li>
							<li><a href="ecar.php"><spam class="glyphicon glyphicon-expand"> E-car-learning</spam></a></li>
							<li><a href="training.php"><spam class="glyphicon glyphicon-map-marker"> Training-School</spam></a></li>
							<li><a href="details.php"><spam class="glyphicon glyphicon-align-justify "> Training-Details</spam></a></li>
							<li><a href="test.php"><spam class="glyphicon glyphicon-hourglass"> Online-Test-Practice</spam></a></li>
							<li><a href="profile.php"><spam class="glyphicon glyphicon-user"> Profile</spam></a></li>
							<li><a href="faq.php"><spam class="glyphicon glyphicon-question-sign"> FAQ</spam></a></li>
							<li><a href="contact.php"><spam class="glyphicon glyphicon-phone"> Contactus</spam></a></li>
                            <li><a href="complain.php"><spam class="glyphicon glyphicon-alert"> Support</spam></a></li>                    
						</ul>
					</nav>
				</div><!-- /.navbar-collapse -->	
			</nav>
	
		<div class="clearfix"></div>
	</div>
</div>
</div>
