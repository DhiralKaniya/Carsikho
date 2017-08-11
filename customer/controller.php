<?php
session_start();
include("model.php");
date_default_timezone_set('Asia/Kolkata');
$current_date=date("d-m-Y");
/*-if customer try to direct login to the page-*/
if(!isset($_SESSION['customerid']))
{
	header('location:../index.php');
}
else
{
	$custid=$_SESSION['customerid'];
	$obj=new customer;
	$obj1=new connection;
	$conn=$obj1->db_connect();
	/* Fetch Customer Details */
	$data=array("id"=>$_SESSION['customerid']);
	$cust=$obj->search($conn,$data,'tbl_customer');
	$cust_details=$cust->fetch_object();

	/* Ecar Details */

	$data=array("status"=>"active");
	$video_details=$obj->search_video($conn);

	/* Fetching Customer Nearest Training School according to city */
	$data=array("cityid"=>$cust_details->cityid,"status"=>"active");
	$nr_mdts=$obj->search($conn,$data,'tbl_mdts');
	$other_mdts=$obj->not_search($conn,$cust_details->cityid,'tbl_mdts');

	/* Booked Details */
	$data=array("customerid"=>$custid);
	$booked_details=$obj->search_booking($conn,$custid);
	/* mdts details */

	/* Complain Details */
	$data=array("customerid"=>$custid);
	$complain_details=$obj->search($conn,$data,'tbl_complain');

	/* Test Module */
	/* Test Result */
	if(isset($_REQUEST['result']))
	{
		if($_REQUEST['correct']==11)
		{
			?>
			<div class="row">
				<div class="col-sm-12"><p id="lnk" aling="center">You have Passed in Practice Test Successfully</p></div>
			</div>
			<?php
		}
		else
		{
			?>
			<div class="row">
				<div class="col-sm-12"><p id="lnk" aling="center">Opppsss !!! You have failed Click to start Practice again</p></div>
			</div>
			<?php 
		}
		?>
		<div class="row">
			<div class="col-sm-4"><p id="heading">Your Attended Question</p></div>
			<div class="col-sm-8"><p id="data"><?php echo $_REQUEST['question'] ?></p></div>
		</div>
		<div class="row">
			<div class="col-sm-4"><p id="heading">Your Correct Answer</p></div>
			<div class="col-sm-8"><p id="data"><?php echo $_REQUEST['correct']; ?></p></div>
		</div>
		<div class="row">
			<div class="col-sm-4"><p id="heading">Your Wrong Answer</p></div>
			<div class="col-sm-8"><p id="data"><?php echo $_REQUEST['wrong']; ?></p></div>
		</div>
		<?php
	}
	if(isset($_REQUEST['startTest']))
	{
		$fetch_test=$obj->test_search($conn,'tbl_test');
		$_SESSION['testquestion']=$fetch_test;
		while($row=$fetch_test->fetch_object())
		{
			?>
			<div style="border-style:inset;">
			<div class="row" style="margin:10px;border-bottom-style:inset;">
				<div class="col-sm-2"><p id="heading">Your True Answer</p></div>
				<div class="col-sm-2"><p id="data"><?php echo $_REQUEST['correct']; ?></p></div>
				<div class="col-sm-2"><p id="heading">Your Wrong Answer</p></div>
				<div class="col-sm-2"><p id="data"><?php echo $_REQUEST['wrong']; ?></p></div>
				<div class="col-sm-2"><p id="heading">Your Remaining Question</p></div>
				<div class="col-sm-2"><p id="data"><?php echo 16-$_REQUEST['questionno']; ?></p></div>
			</div>
			<div class="Row" style="height:75px;">
				<div class="col-sm-10" id="heading">Q<?php echo $_REQUEST['questionno']; ?>) <?php echo $row->question; ?></div>
				<div class="col-sm-2">
					<?php
					if(!$row->img=="")
					{
						?>
						<img src="../<?php echo $row->img; ?>" style="height:5em;width:5em;">
						<?php
					}
					?>
				</div>
			</div>
			<div class="Row" style="height:75px;border-top-style:outset;margin:20px;">
				<div class="col-sm-10" id="heading"><div id="a1">A1) <?php echo $row->option1; ?></div></div>
				<div class="col-sm-2"><input type="radio" id="op1" value="a" name="tmp"></div>
			</div>
			<div class="Row" style="height:75px;border-top-style:outset;margin:20px;">
				<div class="col-sm-10" id="heading"><div id="a2">A2) <?php echo $row->option2; ?></div></div>
				<div class="col-sm-2" ><input type="radio" id="op2" value="b" name="tmp"></div>
			</div>
			<div class="Row" style="height:75px;border-top-style:outset;margin:20px;">
				<div class="col-sm-10" id="heading"><div id="a3">A3) <?php echo $row->option3; ?></div></div>
				<div class="col-sm-2"><input type="radio" id="op3" value="c" name="tmp"></div>
			</div>
			<div class="Row" style="height:75px;border-top-style:outset;margin:20px;">
				<div class="col-sm-10" id="heading"><div id="a4">A4) <?php echo $row->option4; ?></div></div>
				<div class="col-sm-2"><input type="radio" id="op4" value="d" name="tmp"></div>
			</div>
			<div class="Row" style="margin:20px;">
				<div class="col-sm-10"></div>
				<div class="col-sm-2"><input type="button" class="btn btn-success" value="Next" onClick="nextTime()"></div>
				<input type="hidden" value="<?php echo $row->answer; ?>" id="answer">
			</div>
			</div>
			<?php
			break;
		}
	}
	if(isset($_REQUEST['view_mdtsid']))
	{
		$data=array("id"=>$_REQUEST['view_mdtsid']);
		$mdts_fetch=$obj->search($conn,$data,'tbl_mdts');		
		$mdts_details=$mdts_fetch->fetch_object();
		$data=array("mdtsid"=>$_REQUEST['view_mdtsid']);
		$car_details=$obj->search($conn,$data,'tbl_car');
		$data=array("mdtsid"=>$_REQUEST['view_mdtsid'],"status"=>"active");
		$branch_details=$obj->search($conn,$data,'tbl_branch');
	}
	/* car details */
	if(isset($_REQUEST['cardetail']))
	{
		$data=array("id"=>$_REQUEST['mdts']);
		$mdts=$obj->search($conn,$data,'tbl_mdts');		
		$mdts_details=$mdts->fetch_object();
		$data=array("carid"=>$_REQUEST['cardetail']);
		$car=$obj->search($conn,$data,'tbl_car');
		$car_detail=$car->fetch_object();
		//$data=array("carid"=>$_REQUEST['cardetail'],"mdtsid"=>$_REQUEST['mdts'],"status"=>"active");
		$car_schedule=$obj->search_schedule($conn,$_REQUEST['cardetail'],$_REQUEST['mdts']);
	}
	/* Schedule Management */
	if(isset($_REQUEST['cardetail'])&&isset($_REQUEST['mdts'])&&isset($_REQUEST['csid']))
	{
		$schedule=$obj->book_schedule($conn,$_REQUEST['cardetail'],$_REQUEST['mdts'],$_REQUEST['csid']);
		$book_schedule=$schedule->fetch_object();
		?>
		<form method="post">
		<input type="hidden" id="txtCsid" name="txtCsid" value="<?php echo $_REQUEST['csid']; ?>">
		<div class="row" style="margin:20px;">
			<div class="col-sm-4">
				<p id="heading">Timing</p>
			</div>
			<div class="col-sm-8">
				<p id="data"><?php echo $book_schedule->time; ?></p>
			</div>
		</div>
		<div class="row" style="margin:20px;">
			<div class="col-sm-4">
				<p id="heading">Training Days</p>
			</div>
			<div class="col-sm-8">
				<p id="data"><?php echo $book_schedule->noofday; ?></p>
			</div>
		</div>
		<div class="row" style="margin:20px;">
			<div class="col-sm-4">
				<p id="heading">Price</p>
			</div>
			<div class="col-sm-8">
				<p id="data"><?php echo $book_schedule->price; ?></p>
			</div>
		</div>
		<div class="row" style="margin:20px;">
			<div class="col-sm-12">
				<p id="lnk">Confirm Your Details</p>
			</div>
		</div>
		<div class="row" style="margin-bottom:20px;">
			<div class="col-sm-4">
				<p id="heading">Your Start Date</p>
			</div>
			<div class="col-sm-5">
				<input type="text" size="25" id="startdate" placeholder="date in DD-MM-YYYY format" required onblur="d_set(this.value,<?php echo $book_schedule->noofday; ?>)">
			</div>
			<div class="col-sm-3">
				<p id="lnk">(eg.01-06-2016)</p>
			</div>
		</div>
		<div id="Up_date">
		</div>
		</form>
		<?php	
		$_SESSION['price']=$book_schedule->price;
		$_SESSION['csid']=$_REQUEST['csid'];
	}
	/* check availability */
	if(isset($_REQUEST['checkava']))
	{
		$data=array("csid"=>$_REQUEST['csid']);
		$available=$obj->search($conn,$data,'tbl_booking');
		$count=0;
		while($row=$available->fetch_object())
		{
			if(strtotime($_REQUEST['startdate'])<=strtotime($row->training_from))
			{
				$count++;
				?>
				<div class="row" style="margin:20px;">
					<div class="col-sm-12">
						<input type="button" class="btn btn-danger" value="Schedule is Book Upto <?php echo $row->training_from; ?>.. please select start Date after <?php echo $row->training_from; ?>">			
					</div>
				</div>
				<?php 
				break;
			}
		}
		if($count==0)
		{
			$_SESSION['startdate']=$_REQUEST['startdate'];
			$_SESSION['lastdate']=$_REQUEST['lastdate'];
			$data=array("mdtsid"=>$_SESSION['mdts']);
			$picup=$obj->search($conn,$data,'tbl_picuppoint');
			if($cust_details->status=="block")
			{
				?>
				<div class="row"  style="margin-top:20px;margin-bottom:20px;overflow:auto;">
					<div class="col-sm-4"><p id="heading">Upload Your Basic Birth-Document</p></div>
					<div class="col-sm-4">
						<select name="type1">
							<option>Birth-Certificate</option>
							<option>School-Leaving-Cetificatie</option>
							<option>Passport</option>
						</select>
					</div>
					<div class="col-sm-4"><input type="file" name="document1" required></div>
				</div>
				<div class="row"  style="margin-top:20px;margin-bottom:20px;">
					<div class="col-sm-4"><p id="heading">Upload Your Id Proof</p></div>
					<div class="col-sm-4">
						<select name="type2">
							<option>Adhar card</option>
							<option>Voting Card</option>
							<option>Pan card</option>
							<option>Smart card</option>
						</select>
					</div>
					<div class="col-sm-4"><input type="file" name="document2"></div>
				</div>
				<div class="row"  style="margin-top:20px;margin-bottom:20px;">
					<div class="col-sm-4"><p id="heading">Upload Your Resident Proof</p></div>
					<div class="col-sm-4">
						<select name="type2">
							<option>Light Bill</option>
							<option>Vera Bill</option>
							<option>Telephone Bill</option>
						</select>
					</div>
					<div class="col-sm-4"><input type="file" name="document3"></div>
				</div>
				<?php
			}
			?>
			<div class="row" style="margin-top:20px;margin-bottom:20px;">
					<div class="col-sm-4"><p id="heading">Pick You Pick up Point</p></div>
					<div class="col-sm-8">
						<select id="picuppoit" name="picuppoint">
						<?php 
							while($row=$picup->fetch_object())
							{
								?>
								<option value="<?php echo $row->picuppoint; ?>"><?php echo $row->picuppoint; ?></option>
								<?php
							}
						?>
						</select>
					</div>
			</div>
			<div class="row" style="margin:20px;">
				<div class="col-sm-4"></div>
				<div class="col-sm-8">
					<input type="submit" class="btn btn-success" value="Pay Now" name="payment"></div>
				</div>
			</div>
			<?php
		}
	}
	/* Payment */ 
	if(isset($_REQUEST['payment']))
	{
		if($cust_details->status=="block")
		{
			$allowextension=array("jpg","jpeg");
			$document1=explode("/",$_FILES['document1']['type']);
			$extension1=end($document1);
			if(!in_array($extension1,$allowextension))
			{
				?>
				<script>
				alert("Uploaded Document 1 is invalid");
				window.location="training.php";
				</script>
				<?php
			}
			else
			{
				$document3=explode("/",$_FILES['document3']['type']);
				$document2=explode("/",$_FILES['document2']['type']);
				$extension2=end($document2);
				$extension3=end($document3);
				$document1_target="pic/document/".$cust_details->id."_document1_".uniqid().".jpg";
				COPY($_FILES["document1"]["tmp_name"],$document1_target) or die("ERROR in Coping file");
				$document2_target="pic/document/".$cust_details->id."_document2_".uniqid().".jpg";
				COPY($_FILES["document2"]["tmp_name"],$document2_target) or die("ERROR in Coping file");
				$document3_target="pic/document/".$cust_details->id."_document3_".uniqid().".jpg";
				COPY($_FILES["document3"]["tmp_name"],$document3_target) or die("ERROR in Coping file");
				$data=array("type"=>$_REQUEST['type1'],"document"=>$document1_target,"customerid"=>$cust_details->id);
				$ins_doc1=$obj->insert($conn,$data,'tbl_document');
				$data=array("type"=>$_REQUEST['type2'],"document"=>$document2_target,"customerid"=>$cust_details->id);
				$ins_doc2=$obj->insert($conn,$data,'tbl_document');
				$data=array("type"=>$_REQUEST['type3'],"document"=>$document3_target,"customerid"=>$cust_details->id);
				$ins_doc3=$obj->insert($conn,$data,'tbl_document');
				$data=array("status"=>"active");
				$wh=array("id"=>$cust_details->id);
				$upd_customer=$obj->update($conn,$data,$wh,'tbl_customer');
			}
		}
		$data=array("customerid"=>$custid,"csid"=>$_SESSION['csid'],"booking_date"=>$current_date,"training_to"=>$_SESSION['startdate'],"training_from"=>$_SESSION['lastdate'],"picuppoint"=>$_REQUEST['picuppoint']);
		$ins_booking=$obj->insert($conn,$data,'tbl_booking');
		$last=$obj->search_last_booking($conn,$custid);
		$last_record=$last->fetch_object();
		unset($_SESSION['startdate']);
		unset($_SESSION['lastdate']);
		unset($_SESSION['csid']);
		unset($_SESSION['picuppoint']);
		unset($_SESSION['price']);
		//header('location:training.php?payment_conf=true');
	}
	/* date Validation */
	if(isset($_REQUEST['curr_date']))
	{
		$user_date=date("d-m-Y",strtotime($_REQUEST['curr_date']));
		$min_date=date("d-m-Y",mktime(0,0,0,date("m"),date("d")+1,date("Y")));
		$max_date=date("d-m-Y",mktime(0,0,0,date("m"),date("d")+$_REQUEST['addday'],date("Y")));
		//$user_date=date("d-m-Y",strtotime("+".$_REQUEST['addday']." days",$max_date));
		/*date_add($max_date,"");
		date_format($max_date,"d-m-Y");*/
		$valid_date="/^[0-9]{2}-[0-9]{2}-[0-9]{4}$/";
		if(preg_match($valid_date,$_REQUEST['curr_date'])==0)
		{
			?>
			<div class="row" style="margin:20px;">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-8">
					<p id="lnk">Select valid Date</p>
				</div>
			</div>
			<?php
		}
		else if(strtotime($user_date)<strtotime($min_date))
		{
			?>
			<div class="row" style="margin:20px;">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-8">
					<p id="lnk"><?php echo "Please Enter Date Between ".$min_date." and ".$max_date; ?></p>
				</div>
			</div>
			<?php	
		}
		else if(strtotime($user_date)>strtotime($max_date))
		{
			?>
			<div class="row" style="margin:20px;">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-8">
					<p id="lnk"><?php echo "Please Enter Date Between ".$min_date." and ".$max_date; ?></p>
				</div>
			</div>
			<?php	
		}
		else
		{
			$ls=$_REQUEST['addday']-1;
			$last_date=date("d-m-Y",strtotime("+".$ls." days", strtotime($_REQUEST['curr_date'])));
		?>
			<div class="row" >
				<div class="col-sm-4">
					<p id="heading">Training Up to Date </p>
				</div>
				<div class="col-sm-8">
						<input type="text" id="lastdate" name="txtLastdate" value="<?php echo $last_date; ?>" size="25" readonly>
						<input type="hidden" name="txtFirstdate" value="<?php echo $user_date; ?>">
				</div>
			</div>
			<div id="btndis">
			<div class="row" style="margin:20px;">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-8">
					<input type="button" class="btn btn-primary" name="ava" value="Check for Availability" onclick="checkava()">
				</div>
			</div>
			</div>
		<?php
		}
	}
	/* find MDTS */
	if(isset($_REQUEST['findmdts']))
	{
		$mdts_det=$obj->search_ajax($conn,'tbl_mdts',$_REQUEST['findmdts'],'name');
		if(mysqli_num_rows($mdts_det)==0)
		{
			?>
			<div class="row">
				<div class="col-sm-12" style="border-top-style:outset;border-bottom-style:inset;margin:20px;">
					<center><a id="lnk" href="training.php">No Record Found</p></center>
				</div>
			</div>
			<?php
		}
		else
		{
		while($row=$mdts_det->fetch_object())
		{
		?>
		<div class="row" style="margin:20px;border-bottom-style:inset;order-right-style:inset;border-left-style:outset;border-width:5px;"> 
					<div class="col-sm-3" style="margin-bottom:20px;border-right-style:inset;" align="center"><img src="../mdts/<?php echo $row->profilepic; ?>" height="125em"></div>
					<div class="col-sm-8">
						<div class="row">
							<div class="col-sm-3"><p id="heading">Name</p></div>
							<div class="col-sm-6"><p id="data"><?php echo $row->name; ?></p></div>
							<div class="col-sm-3" align="right"><a href="training.php?view_mdtsid=<?php echo $row->id; ?>" id="lnk">View Details</a></div>
						</div>
						<div class="row">
							<div class="col-sm-3"><p id="heading">Address</p></div>
							<div class="col-sm-9"><p id="data"><?php echo $row->address; ?></p></div>
						</div>
						<div class="row">
							<div class="col-sm-3"><p id="heading">Email Address</p></div>
								<div class="col-sm-9"><p id="data"><?php echo $row->email; ?></p></div>
						</div>
						<div class="row">
							<div class="col-sm-3"><p id="heading">contact No</p></div>
							<div class="col-sm-9"><p id="data"><?php echo $row->contactno; ?></p></div>
						</div>
					</div>
				</div>
		<?php		
		}
		}
	}

	/* FAQ */
	if(isset($_REQUEST['findfaq']))
	{
		?>
		<tr>
			<td colspan="2"><hr></td>
		</tr>
		<?php
		$faq_detail=$obj->search_ajax($conn,'tbl_faq',$_REQUEST['findfaq'],'question');
		$i=1;
		while($row=$faq_detail->fetch_object())
				{
					?>
					<tr>
						<td>Q<?php echo $i++;?>.</td>
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
				}
	}
	else if(isset($_REQUEST['disid']))
	{
		$i=$_REQUEST['disid'];
		if($i<=0)
		{
			$i=0;
		}
		$faqdetail=$obj->search_faq($conn,'tbl_faq',$i);
	}
	else if(!isset($_REQUEST['disid']))
	{
		$i=0;
		$faqdetail=$obj->search_faq($conn,'tbl_faq',$i);
	}
	/* Feedback */
	if(isset($_REQUEST['feedback']))
	{
		$data=array("feedback"=>$_REQUEST['txtRev'],"emailid"=>$_REQUEST['txtEmail'],"date"=>$current_date);
		$ins_feedback=$obj->insert($conn,$data,'tbl_feedback');
		$_SESSION['successful']=$cust_details->name.", Your Feedback has been submited Successfully...!!!";
		header('locaiton:contact.php');
	}
	/* Update profile */
	/* profile pic display */
	if(isset($_REQUEST['profilepic']))
	{
		?>
		<form method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-12" align="center"><img src="<?php echo $cust_details->profilepic; ?>" style="border-radius:20px;margin:10px;" height="350px" width="350px;"></div>
				</div>
				<div class="row">
				<div class="col-sm-12" style="margin:20px;">
				<p id="heading">upload your new profile pic</p>
				</div>
				<div class="row" style="margin:20px;">
					<div class="col-sm-4" align="Center"><input type="file" name="newprofile"></div><div class="col-sm-8"><input type="submit" class="btn btn-primary" value="Update" name="updprofile"></div>
				</div>
			</div>
		</form>
		<?php
	}
	/* profile pic update */
	if(isset($_REQUEST['updprofile']))
	{
		$allowextension=array("jpg","jpeg");
		$custpic=explode("/",$_FILES["newprofile"]["type"]);
		$extension=end($custpic);
		$cust_target="pic/".uniqid().".jpg";	
		if(!in_array($extension,$allowextension))
		{
			$_SESSION['error']="Uploaded pic is invalid plz upload valid pic";
		}
		else
		{
			if(isset($cust_details->profilepic))
			{
				unlink($cust_details->profilepic);
			}
			COPY($_FILES["newprofile"]["tmp_name"],$cust_target) or die("ERROR in Coping file");
			$data=array("profilepic"=>$cust_target);
			$wh=array("id"=>$custid);
			$upd_res=$obj->update($conn,$data,$wh,'tbl_customer');
			header("location:profile.php");
		}
	}
	/* license pic display */
	if(isset($_REQUEST['licensepic']))
	{
		?>
		<form method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-12" align="center"><img src="<?php echo $cust_details->licensepic; ?>" style="border-radius:20px;margin:10px;" height="350px" width="350px;"></div>
				</div>
				<div class="row">
				<div class="col-sm-12" style="margin:20px;">
				<p id="heading">upload your new License</p>
				</div>
				<div class="row" style="margin:20px;">
					<div class="col-sm-4" align="Center"><input type="file" name="newlicense" required></div><div class="col-sm-8"><input type="submit" class="btn btn-primary" value="Update License" name="updlicense"></div>
				</div>
			</div>
		</form>
		<?php
	}
	/* license pic update */
	if(isset($_REQUEST['updlicense']))
	{
		$allowextension=array("jpg","jpeg");
		$custpic=explode("/",$_FILES["newlicense"]["type"]);
		$extension=end($custpic);
		$lic_target="pic/".uniqid().".jpg";	
		if(!in_array($extension,$allowextension))
		{
			$_SESSION['error']="Uploaded pic is invalid plz upload valid pic";
		}
		else
		{
			if(isset($cust_details->licensepic))
			{
				unlink($cust_details->licensepic);
			}
			COPY($_FILES["newlicense"]["tmp_name"],$lic_target) or die("ERROR in Coping file");
			$data=array("licensepic"=>$lic_target);
			$wh=array("id"=>$custid);
			$upd_res=$obj->update($conn,$data,$wh,'tbl_customer');
			header("location:profile.php");
		}
	}
	/* User name Display */
	if(isset($_REQUEST['username']))
	{
		?>
		<form method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-12" style="margin:20px;">
					<p id="lnk"><?php echo $cust_details->name ?>, Update Your username..!!</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<p id="data" style="margin:20px;">Enter Your New User Name</p><input type="text" name="txtnewname" size="50" required style="margin:20px;" value="<?php echo $cust_details->name; ?>" pattern="^[a-zA-Z0-9 _@#$%]+$">
					<input type="submit" class="btn btn-primary" style="margin:20px;" name="newname" value="update Username">
				</div>
			</div>
		</form>`
		<?php
	}
	/* Username Update */
	if(isset($_REQUEST['newname']))
	{
		$data=array("name"=>$_REQUEST['txtnewname']);
		$wh=array("id"=>$custid);
		$upd_name=$obj->update($conn,$data,$wh,'tbl_customer');
		header("location:profile.php");
	}
	/* password update */
	if(isset($_REQUEST['password']))
	{
		?>
		<form method="post">
			<div class="row">
				<div class="col-sm-12"><p id="lnk">Update Your Password</p></div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<p id="data" style="margin:20px;">Enter Your Old Password</p><input type="password" name="txtoldpass" onblur="oldpasscheck(this.value)" size="50" required style="margin:20px;">
				</div>
			</div>
			<div id="passdisp">
			</div>
		</form>`
		<?php
	}
	/* old password check */
	if(isset($_REQUEST['oldcheck']))
	{
		if($_REQUEST['oldcheck']==$cust_details->password)
		{
			?>
			<div class="row">
				<div class="col-sm-8">
					<p id="data" style="margin:20px;">Enter Your New Password</p><input type="password" name="txtnewpass" size="50" pattern="^[a-zA-Z0-9 _@.]{6,12}$" required style="margin:20px;">
				</div>
				<div class="col-sm-4">
					<p id=""
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<p id="data" style="margin:20px;">Rewrite Your New Password</p><input type="password" name="txtcnfpass" size="50" required style="margin:20px;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<input type="submit" class="btn btn-primary" style="margin:20px;" name="newpass" value="update password">
				</div>
			</div>
			<?php
		}
		else
		{
			?>
			<div class="row">
				<div class="col-sm-12"><p id="lnk">Old Password is Wrong</p></div>
			</div>
			<?php
		}
	}
	/* passsword update */
	if(isset($_REQUEST['newpass']))
	{
		if($_REQUEST['txtcnfpass']==$_REQUEST['txtnewpass'])
		{
			$data=array("password"=>$_REQUEST['txtnewpass']);
			$wh=array("id"=>$custid);
			$upd_obj=$obj->update($conn,$data,$wh,'tbl_customer');
		}
		else
		{
			$_SESSION['error']="Password Does not match..>!!!!";
			echo "<script type='text/javascript'>alert('password does not match');</script>";
		}
	}
	/* Address Display */
	if(isset($_REQUEST['address']))
	{
		?>
		<form method="post">
			<div class="row">
				<div class="col-sm-12" style="margin:20px;">
					<p id="lnk"><?php echo $cust_details->name ?>, Update Your Current Address..!!</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<p id="data" style="margin:20px;">Enter Your New Address</p>
					<textarea rows="7" cols="50" style="margin:20px;" name="txtnewadd" required><?php echo $cust_details->address; ?></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<input type="submit" class="btn btn-primary" style="margin:20px;" name="newadd" value="update Address">
				</div>
			</div>
		</form>`
		<?php
	}
	/* Address Change */
	if(isset($_REQUEST['newadd']))
	{
		$data=array("address"=>$_REQUEST['txtnewadd']);
		$wh=array("id"=>$custid);
		$upd_obj=$obj->update($conn,$data,$wh,'tbl_customer');
	}
	/* Contact Display */
	if(isset($_REQUEST['contactno']))
	{
		?>
		<form method="post">
			<div class="row">
				<div class="col-sm-12" style="margin:20px;">
					<p id="lnk"><?php echo $cust_details->name ?>, Update Your Current Contact  no..!!</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<p id="data" style="margin:20px;">Enter Your New Contact No</p>
					<input type="text" name="txtcontactno" size="50" pattern="^[0-9]{10}$" required value="<?php echo $cust_details->contactno; ?>" required style="margin:20px;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<input type="submit" class="btn btn-primary" style="margin:20px;" name="newcontactno" value="update Contactno">
				</div>
			</div>
		</form>`
		<?php
	}
	/* contact Update */
	if(isset($_REQUEST['newcontactno']))
	{
		$data=array("contactno"=>$_REQUEST['txtcontactno']);
		$wh=array("id"=>$custid);
		$upd_obj=$obj->update($conn,$data,$wh,'tbl_customer');
	}
	/* open ticket while user book ticket*/
	if(isset($_REQUEST['ticket']))
	{
		$mdts_details=$obj->search_distinct($conn,$custid);
		if(mysqli_num_rows($mdts_details)==0)
		{
			?>
				<div class="row" style="margin:20px;">
					<div class="col-sm-12"><p id="lnk">(you can only complain about the MDTS for which he/she has booked Training)</p></div>
				</div>	
			<?php
		}
		else
		{
		?>
		<form method="post">
			<div class="row" style="margin:20px;">
				<div class="col-sm-12"><p id="heading">*Raise Your Complain</p></div>
			</div>
			<div class="row" style="margin:20px;">
				<div class="col-sm-6"><p id="data">username</p></div>
				<div class="col-sm-6"><p id="data">Email</p></div>
			</div>
			<div class="row" style="margin:20px;">
				<div class="col-sm-6"><input type="text" name="txtname" size="50" value="<?php echo $cust_details->name; ?>" readonly></div>
				<div class="col-sm-6"><input type="text" name="txtemail" size="50" value="<?php echo $cust_details->email; ?>" readonly></div>
			</div>
			<div class="row" style="margin:20px;">
				<div class="col-sm-12"><p id="data">Subject</p></div>
			</div>
			<div class="row" style="margin:20px;">
				<div class="col-sm-12"><input type="text" name="txtsubject" size="50" pattern="^[a-zA-Z0-9 _@$]+$" required></div>
			</div>
			<div class="row" style="margin:20px;">
				<div class="col-sm-12"><p id="data">Complain To</p><p id="lnk">(you can only complain about the MDTS for which he/she has booked Training)</p></div>
			</div>
			<div class="row" style="margin:20px;">
				<div class="col-sm-12">
					<select name="mdtsid">
					<?php 
						while($row=$mdts_details->fetch_object())
						{
							$data=array("id"=>$row->mdtsid);
							$mdts=$obj->search($conn,$data,'tbl_mdts');
							$mdts_data=$mdts->fetch_object();
							?>
							<option value="<?php echo $mdts_data->id; ?>"><?php echo $mdts_data->name; ?></option>
							<?php
						}
					?>
					</select>
				</div>
			</div>
			<div class="row" style="margin:20px;">
				<div class="col-sm-12"><p id="data">Complain/Support</p></div>
			</div>
			<div class="row" style="margin:20px;">
				<div class="col-sm-12"><textarea  pattern="^[a-zA-Z0-9 _@$]+$" name="txtcomplain" required cols="100" rows="7"></textarea></div>
			</div>
			<div class="row" style="margin:20px;">
				<div class="col-sm-12"><input type="submit" name="addcomplain" value="submit" class="btn btn-primary"></div>
			</div>

		</form>
		<?php
		}
	}
	/* insert complain */
	if(isset($_REQUEST['addcomplain']))
	{
		$data=array("subject"=>$_REQUEST['txtsubject'],"complain"=>$_REQUEST['txtcomplain'],"customerid"=>$custid,"complain_date"=>$current_date,"mdtsid"=>$_REQUEST['mdtsid']);
		$ins_complain=$obj->insert($conn,$data,'tbl_complain');
		header('location:complain.php');
	}
	if(isset($_REQUEST['oldticket']))
	{
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
				<div class="col-sm-2"><p id="heading" >Complain ID</p></div>
				<div class="col-sm-2"><p id="heading">Complain Subject</p></div>
				<div class="col-sm-3"><p id="heading">Complain</p></div>
				<div class="col-sm-3"><p id="heading">Solution</p></div>
				<div class="col-sm-2"><p id="heading">-</p></div>
			</div>
			<?php
			while($row=$complain_details->fetch_object())			
			{
				?>
				<div class="row" style="border-bottom-style:inset;margin-bottom:20px;">
					<div class="col-sm-2"><p id="data"><?php echo $row->complainid; ?></p></div>
					<div class="col-sm-2"><p id="data"><?php echo $row->subject; ?></p></div>
					<div class="col-sm-3"><p id="data"><?php echo $row->complain; ?></p></div>
					<div class="col-sm-3"><p id="data"><?php echo $row->solution; ?></p></div>
					<div class="col-sm-2"><a id="lnk" onclick="complain_detail(<?php echo $row->complainid; ?>)">View Complain</p></div>
				</div>
				<?php
			}
		}
	}
	/* view complain */
	if(isset($_REQUEST['viewticket']))
	{
		$data=array("complainid"=>$_REQUEST['viewticket'],"customerid"=>$custid);
		$comp=$obj->search($conn,$data,'tbl_complain');
		if(mysqli_num_rows($comp)==0)
		{
			?>
				<div class="row">
					<div class="col-sm-12"><p id="lnk">Oppps..!!! Invalid Complain Id...</p></div>
				</div>
			<?php
		}
		else
		{
		$comp_details=$comp->fetch_object();
		$data=array("id"=>$comp_details->mdtsid);
		$mdts_name=$obj->search($conn,$data,'tbl_mdts');
		$mdts_details=$mdts_name->fetch_object();
		?>
			<div class="row" style="margin-top:20px;margin-bottom:20px;border-bottom-style:inset">
				<div class="col-sm-4"><p id="heading">Complain ID</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $comp_details->complainid; ?></p></div>
			</div>
			<div class="row" style="margin-bottom:20px;border-bottom-style:inset">
				<div class="col-sm-4"><p id="heading">Subject</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $comp_details->subject; ?></p></div>
			</div>
			<div class="row" style="margin-bottom:20px;border-bottom-style:inset">
				<div class="col-sm-4"><p id="heading">Complain</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $comp_details->complain; ?></p></div>
			</div>
			<div class="row" style="margin-bottom:20px;border-bottom-style:inset">
				<div class="col-sm-4"><p id="heading">Solution</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $comp_details->solution; ?></p></div>
			</div>
			<div class="row" style="margin-bottom:20px;border-bottom-style:inset">
				<div class="col-sm-4"><p id="heading">Complain Date</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $comp_details->complain_date; ?></p></div>
			</div>
			<div class="row" style="margin-bottom:20px;border-bottom-style:inset">
				<div class="col-sm-4"><p id="heading">Attended Date</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $comp_details->attended_date; ?></p></div>
			</div>
			<div class="row" style="margin-bottom:20px;border-bottom-style:inset">
				<div class="col-sm-4"><p id="heading">Training School Name</p></div>
				<div class="col-sm-8"><p id="data"><?php echo $mdts_details->name; ?></p></div>
			</div>
		<?php
		}
	}
	if(isset($_REQUEST['pdfgen']))
	{
		require_once('fpdf16/fpdf.php');
	class PDF extends FPDF
	{
		function Header()
		{
			if(!empty($_FILES["file"]))
			{
			$uploaddir = "logo/";
			$nm = $_FILES["file"]["name"];
			$random = rand(1,99);
			move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddir.$random.$nm);
			$this->Image($uploaddir.$random.$nm,10,10,20);
			unlink($uploaddir.$random.$nm);
		}
		$this->SetFont('Arial','B',12);
		$this->Ln(1);
		}
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
		function ChapterTitle($num, $label)
		{
			$this->SetFont('Arial','',12);
			$this->SetFillColor(200,220,255);
			$this->Cell(0,6,"$num $label",0,1,'L',true);
			$this->Ln(0);
		}
		function ChapterTitle2($num, $label)
		{
			$this->SetFont('Arial','',12);
			$this->SetFillColor(249,249,249);
			$this->Cell(0,6,"$num $label",0,1,'L',true);
			$this->Ln(0);
		}
	}

		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		//Heading
		$pdf->SetFont('Times','',20);
		$pdf->SetTextColor(30);
		$pdf->Cell(0,3,"Carsikho Invoice",0,1,'C');
		//Invocie Number
		$pdf->Cell(0,20,'',0,1,'R');
		$pdf->ChapterTitle('Booking Number ',$_REQUEST['txtBookingid']);
		$pdf->ChapterTitle('Bookig Date ',$current_date);
		//customer Details
		$pdf->SetFont('Times','',15);
		$pdf->SetTextColor(32);
		$pdf->Cell(0,20,'',0,1,'R');
		$pdf->SetFillColor(224,235,255);
		$pdf->SetDrawColor(192,192,192);
		//Customer Details
		$pdf->Cell(190,7,'Customer Details',0,1,'C');
		$pdf->SetFont('Times','',13);
		$pdf->Cell(150,7,'Customer Name',1,0,'L');
		$pdf->Cell(40,7,$_REQUEST['txtCustname'],1,1,'C');
		$pdf->Cell(150,7,'Customer Address',1,0,'L');
		$pdf->Cell(40,7,$_REQUEST['txtCustadress'],1,1,'C');
		$pdf->Cell(150,7,'Customer Contactno',1,0,'L');
		$pdf->Cell(40,7,$_REQUEST['txtCustcontactno'],1,1,'C');
		$pdf->Cell(0,20,'',0,1,'R');
		//Training Details
		$pdf->SetFont('Times','',15);
		$pdf->Cell(190,7,'Motor Driving Training Details',0,1,'C');
		$pdf->SetFont('Times','',13);
		$pdf->Cell(100,10,'Training School Name',1,0,'L');
		$pdf->Cell(90,10,$_REQUEST['txtTraining'],1,1,'C');
		$pdf->Cell(100,10,'Training School Address',1,0,'L');
		$pdf->Cell(90,10,$_REQUEST['txtAddress'],1,1,'C');
		$pdf->Cell(100,10,'Training School Contactno',1,0,'L');
		$pdf->Cell(90,10,$_REQUEST['txtContactno'],1,1,'C');
		$pdf->Cell(100,10,'Training Car Model',1,0,'L');
		$pdf->Cell(90,10,$_REQUEST['txtCarname'],1,1,'C');
		$pdf->Cell(100,10,'Training CarNumber',1,0,'L');
		$pdf->Cell(90,10,$_REQUEST['txtCarnumber'],1,1,'C');
		$pdf->Cell(100,10,'Training Booking Date',1,0,'L');
		$pdf->Cell(90,10,$_REQUEST['txtBookingdate'],1,1,'C');
		$pdf->Cell(100,10,'Training Start Date',1,0,'L');
		$pdf->Cell(90,10,$_REQUEST['txtStartdate'],1,1,'C');
		$pdf->Cell(100,10,'Training End Date',1,0,'L');
		$pdf->Cell(90,10,$_REQUEST['txtEnddate'],1,1,'C');
		$pdf->Cell(100,10,'Training Time',1,0,'L');
		$pdf->Cell(90,10,$_REQUEST['txtMdtstime'],1,1,'C');
		$pdf->Cell(100,10,'Training Price',1,0,'L');
		$pdf->Cell(90,10,$_REQUEST['txtPrice'],1,1,'C');
		$pdf->Cell(100,10,'Pick Up Point',1,0,'L');
		$pdf->Cell(90,10,$_REQUEST['txtPicuppoint'],1,1,'C');
		$filename=$_REQUEST['txtCustname']."_".$_REQUEST['txtBookingid'].".pdf";
		$pdf->Output('../invoice/'.$filename,'F');
		$data=array("invoice"=>$filename);
		$wh=array("bookingid"=>$_REQUEST['txtBookingid']);
		$upd_booking=$obj->update($conn,$data,$wh,'tbl_booking');
		header('location:details.php');
	}
}
?>