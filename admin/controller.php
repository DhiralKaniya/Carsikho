<?php
include("model.php");
session_start();
$obj=new mdts;
$obj1=new connection;
$conn=$obj1->db_connect();
date_default_timezone_set('Asia/Kolkata');
$current_date=date("d-m-Y");
//echo $current_date;
if(!isset($_SESSION['admin']))
{
	header('location:../index.php');
}

/* search total customer */
$cust=$obj->search_once($conn,'tbl_customer');
$total_cust=mysqli_num_rows($cust);

/* video details */
$data=array("status"=>"active");
$act_video_dis=$obj->search($conn,$data,'tbl_ecarvideos');

$data=array("status"=>"block");
$blk_video_dis=$obj->search($conn,$data,'tbl_ecarvideos');

/* search total mdts */
$cust=$obj->search_once($conn,'tbl_mdts');
$total_mdts=mysqli_num_rows($cust);

/* Booking History */
$book_rec=$obj->booking_details($conn);

/* Total Appoinment */
$cust=$obj->search_once($conn,'tbl_booking');
$total_appoint=mysqli_num_rows($cust);

/* Total Car */
$car_count=$obj->search_once($conn,'tbl_car');
$total_car=mysqli_num_rows($car_count);

/* Total Videos */
$video_count=$obj->search_once($conn,'tbl_ecarvideos');
$total_video=mysqli_num_rows($video_count);

/* Total City */
$city_count=$obj->search_once($conn,'tbl_city');
$total_city=mysqli_num_rows($city_count);

/* Test */
$test=$obj->search_once($conn,'tbl_test');

/* Test Delete */
if(isset($_REQUEST['del_question']))
{
	$data=array("questionid"=>$_REQUEST['del_question']);
	$del_quest=$obj->delete($conn,$data,'tbl_test');
	header('location:test.php');
}
/* Test Question Find */
if(isset($_REQUEST['upd_question']))
{
	$data=array("questionid"=>$_REQUEST['upd_question']);
	$fnd_question=$obj->search($conn,$data,'tbl_test');
	$question=$fnd_question->fetch_object();
}
/* Test Question Update */
if(isset($_REQUEST['que_update']))
{
	$filename=$_FILES['iconpage']['name'];
	if($filename==null) 
	{
		$data=array("question"=>$_REQUEST['question'],"option1"=>$_REQUEST['option1'],"option2"=>$_REQUEST['option3'],"option3"=>$_REQUEST['option3'],"option4"=>$_REQUEST['option3'],"option4"=>$_REQUEST['option4'],"answer"=>$_REQUEST['answer']);		
	}
	else
	{
		$target_path="icon/".uniqid().".jpg";
		COPY($_FILES['iconpage']['tmp_name'],"../".$target_path);
		$data=array("question"=>$_REQUEST['question'],"option1"=>$_REQUEST['option1'],"option2"=>$_REQUEST['option3'],"option3"=>$_REQUEST['option3'],"option4"=>$_REQUEST['option3'],"option4"=>$_REQUEST['option4'],"answer"=>$_REQUEST['answer'],"img"=>$target_path);	
	}
	$wh=array("questionid"=>$_REQUEST['questionid']);
	$upd_ques=$obj->update($conn,$data,$wh,'tbl_test');
	header('location:test.php');
}
if(isset($_REQUEST['que_add']))
{
	$filename=$_FILES['iconpage']['name'];
	if($filename==null) 
	{
		$data=array("question"=>$_REQUEST['question'],"option1"=>$_REQUEST['option1'],"option2"=>$_REQUEST['option3'],"option3"=>$_REQUEST['option3'],"option4"=>$_REQUEST['option3'],"option4"=>$_REQUEST['option4'],"answer"=>$_REQUEST['answer']);		
	}
	else
	{
		$target_path="icon/".uniqid().".jpg";
		COPY($_FILES['iconpage']['tmp_name'],"../".$target_path) or die("error in copy");
		$data=array("question"=>$_REQUEST['question'],"option1"=>$_REQUEST['option1'],"option2"=>$_REQUEST['option3'],"option3"=>$_REQUEST['option3'],"option4"=>$_REQUEST['option3'],"option4"=>$_REQUEST['option4'],"answer"=>$_REQUEST['answer'],"img"=>$target_path);	
	}
	$add_que=$obj->insert($conn,$data,'tbl_test');
	header("location:test.php");
}
/* CUSTOMER View */
if(isset($_REQUEST['cstid']))
{
	$data=array("id"=>$_REQUEST['cstid']);
	$cust_view=$obj->search($conn,$data,'tbl_customer');
	$cust_display=$cust_view->fetch_object();
	$data=array("id"=>$cust_display->cityid);
	$city=$obj->search($conn,$data,'tbl_city');
	$city_detail=$city->fetch_object();
}
/* MDTS View */
if(isset($_REQUEST['mdtid']))
{
	$mdtsid=$_REQUEST['mdtid'];
	$data=array("id"=>$mdtsid);
	$mdts_view=$obj->search($conn,$data,'tbl_mdts');
	$mdts_display=$mdts_view->fetch_object();
	$data=array("id"=>$mdts_display->cityid);
	$city=$obj->search($conn,$data,'tbl_city');
	$city_detail=$city->fetch_object();
	$data=array("mdtsid"=>$mdtsid);
	$car_details=$obj->search($conn,$data,'tbl_car');
	$schedule_details=$obj->search($conn,$data,'tbl_schedule');	
	$ecar_details=$obj->search($conn,$data,'tbl_ecarvideos');	
}
/* video update */
if(isset($_REQUEST['videoid'])&&isset($_REQUEST['status']))
{
	if($_REQUEST['status']=="active")
	{
		$data=array("status"=>"block");
	}
	else
	{
		$data=array("status"=>"active");	
	}
	$wh=array("video_id"=>$_REQUEST['videoid']);
	$res=$obj->update($conn,$data,$wh,'tbl_ecarvideos');
	header('location:ecar.php');
}
if(isset($_REQUEST['updvideo']))
{
	$data=array("video_id"=>$_REQUEST['updvideo']);
	$vid_detail=$obj->search($conn,$data,'tbl_ecarvideos');
}
if(isset($_REQUEST['updlink']))
{
	$data=array("video_path"=>$_POST['video_path']);
	$wh=array("video_id"=>$_POST['video_id']);
	$res=$obj->update($conn,$data,$wh,'tbl_ecarvideos');
	header('location:ecar.php');
}
/* MDTS Details */
if(isset($_REQUEST['ecar']))
{
		if(isset($ecar_details))
		{
			$i=0;
			while($row=$ecar_details->fetch_object())
			{
				?>
				<td> 
				<table class="table table-bordered">
					<tr>
						<td><iframe style="margin: 20px;" src="<?php echo $row->video_path; ?>?autoplay=0&autohide=2" height="250px" width="250px" allowfullscreen></iframe></td>
					</tr>
					<tr>
						<td align="center"><?php echo $row->video_title; ?>-<a href="mdts.php?videoid=<?php echo $row->video_id; ?>&status=<?php echo $row->status; ?>&mdtid=<?php echo $_REQUEST['mdtid']; ?>"><?php echo $row->status; ?></a></td>
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
		}
		unset($ecar_details);
}
/* unset valu */
if(isset($_REQUEST['contain']))
{
		?>
		<?php
}
/* schedule display */
if(isset($_REQUEST['schedule']))
{
	if(isset($schedule_details))
		{
			?>
				<table class="table hover">
					<tr>
					<td>Sr No.</td>
					<td>Schedule Timing</td>
					</tr>
					<?php
					$i=1; 
					while($row=$schedule_details->fetch_object())
					{
						?>
						<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row->mdtstime; ?></td>
						</tr>
						<?php
					}
					?>
					</table>		
			</td>
			<?php
			unset($schedule);
		}
}
/* assign schedule display */
if(isset($_REQUEST['ass_schedule']))
{
	$res_carsch=$obj->search_car_sch($conn,$mdtsid,$_REQUEST['carid']);
	?>
		<table class="table hover">
			<tr>
                <td>Sr No</td>
                <td>Timing</td>
                <td>Price</a></td>
                <td>Number of Day</td>
                <td>status</td>
            </tr>
             <?php
             $i=1;
			while($row=$res_carsch->fetch_object())
			{
				?>
	            <tr>
	            <td><?php echo $i++;?></td>
	            <td><?php echo $row->mdtstime; ?></td>
	            <td><?php echo $row->price; ?></a></td>
	            <td><?php echo $row->noofday; ?></a></td>
	            <td><?php echo $row->status; ?></a></td>
	            </tr>
	            <?php
			}
		?>
		</table>
	<?php
}
/* car details display */
if(isset($_REQUEST['car']))
{
		?>
			<tr>
			<?php
			$i=0;
			while($row=$car_details->fetch_object())
			{
				$i++;
				?>
				<td>
					<table class="table table-bordered">

					<tr>
					<td align="center"><img src="../mdts/<?php echo $row->carpic; ?>" height="125px" width="100px"></img></td>
					<td align="center"><img src="../mdts/<?php echo $row->rcbookpic; ?>" height="125px" width="100px"></img></td>
					</tr>

					<tr align="center">
					<td colspan="2" onClick="setcarsch('carsch','carassdetail',<?php echo $_REQUEST['mdtid']; ?>,<?php echo $row->carid; ?>)"><font style="cursor:pointer;"><?php echo $row->carname; ?>-<?php echo $row->carnumber; ?></font></td>
					</tr>

					</table>		
				</td>
				<?php
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
		<?php
}
/* basic details display */
if(isset($_REQUEST['general']))
{
	?>
	<tr>
				<td>Email Id</td>	
				<td><?php echo $mdts_display->email; ?></td>
				<td>Status</td>
				<td><a href="mdts.php?mdtsid=<?php echo $mdts_display->id; ?>&status=<?php echo $mdts_display->status; ?>"><?php echo $mdts_display->status; ?></a></td>
			</tr>
			<tr>
				<td>Contact No </td>
				<td><?php echo $mdts_display->contactno; ?></td>
				<td>Address</td>
				<td><?php echo $mdts_display->address; ?></td>
			</tr>
			<tr>
				<td>City</td>
				<td><?php echo $city_detail->cityname; ?></td>
				<td>Registration Date</td>
				<td><?php echo $mdts_display->regdate; ?></td>
			</tr>
			<tr>
				<td>License Pic</td>
				<td><img src="../mdts/<?php echo $mdts_display->licensepic; ?>" height="250px" width="250px"></td>
				<td>Profile Pic</td>
				<td><img src="../mdts/<?php echo $mdts_display->profilepic; ?>" height="250px" width="250px"></td>
			</tr>
	<?php
}


/* MDTS arrprove side */
if(!isset($_REQUEST['mdtsdis1']))
{
	$data=array("status"=>"active");
	$mai=0;
	$mdts_app_detail=$obj->search_once_limit($conn,$data,0,'tbl_mdts','regdate');
}
else if(isset($_REQUEST['mdtsdis1']))
{

	if($_REQUEST['mdtsdis1']<=0)
	{
		$start=0;
		$mai=0;
	}
	else
	{
		$start=$_REQUEST['mdtsdis1'];
		$mai=$_REQUEST['mdtsdis1'];
	}
	$data=array("status"=>"active");	
	$mdts_app_detail=$obj->search_once_limit($conn,$data,$start,'tbl_mdts','regdate');	
}

/* MDTS block side */
if(!isset($_REQUEST['mdtsdis2']))
{
	$mbi=0;
	$data=array("status"=>"block");
	$mdts_block_detail=$obj->search_once_limit($conn,$data,0,'tbl_mdts','regdate');
}
else if(isset($_REQUEST['mdtsdis2']))
{

	if($_REQUEST['mdtsdis2']<=0)
	{
		$start=0;
		$mbi=0;
	}
	else
	{
		$start=$_REQUEST['mdtsdis2'];
		$mbi=$_REQUEST['mdtsdis2'];
	}
	$data=array("status"=>"active");	
	$mdts_block_detail=$obj->search_once_limit($conn,$data,$start,'tbl_mdts','regdate');	
}
/* mdts aprrove data */
if(isset($_REQUEST['mdtsid'])&&isset($_REQUEST['status']))
{
	$wh=array("id"=>$_REQUEST['mdtsid']);
	if($_REQUEST['status']=="active")
	{
		$data=array("status"=>"block");
	}
	else
	{
		$data=array("status"=>"active");	
	}
	$upd_res=$obj->update($conn,$data,$wh,'tbl_mdts');
	header('location:mdts.php');
}
/* customer approve */
if(!isset($_REQUEST['custdis1']))
{
	$cai=0;
	$data=array("status"=>"active");
	$cust_app_detail=$obj->search_once_limit($conn,$data,0,'tbl_customer','regdate');
}
else if(isset($_REQUEST['custdis1']))
{
	if($_REQUEST['custdis1']<=0)
	{
		$start=0;
		$cai=0;
	}
	else
	{
		$start=$_REQUEST['custdis1'];
		$cbi=$_REQUEST['custdis1'];
	}	
	$data=array("status"=>"active");
	$cust_app_detail=$obj->search_once_limit($conn,$data,$start,'tbl_customer','regdate');	
}

/* customer block */
if(!isset($_REQUEST['custdis2']))
{
	$cbi=0;
	$data=array("status"=>"block");
	$cust_block_detail=$obj->search_once_limit($conn,$data,0,'tbl_customer','regdate');
}
else if(isset($_REQUEST['custdis2']))
{
	if($_REQUEST['custdis2']<=0)
	{
		$start=0;
		$cbi=0;
	}
	else
	{
		$start=$_REQUEST['custdis2'];
		$cbi=$_REQUEST['custdis2'];
	}	
	$data=array("status"=>"block");
	$cust_block_detail=$obj->search_once_limit($conn,$data,$start,'tbl_customer','regdate');	
}
/* Customer aprrove data */
if(isset($_REQUEST['custid'])&&isset($_REQUEST['status']))
{
	$wh=array("id"=>$_REQUEST['custid']);
	if($_REQUEST['status']=="active")
	{
		$data=array("status"=>"block");
	}
	else
	{
		$data=array("status"=>"active");	
	}
	$upd_res=$obj->update($conn,$data,$wh,'tbl_customer');
	header('location:customer.php');
}
/* Comaplain */
if(!isset($_REQUEST['disid1']))
{
	$pen_complain=$obj->search_complain($conn,"active",0);
}
else if(isset($_REQUEST['disid1']))
{
	if($_REQUEST['disid1']<=0)
	{
		$start=0;
		$i=0;
	}
	else
	{
		$start=$_REQUEST['disid1'];
		$i=$_REQUEST['disid1'];
	}	
	$pen_complain=$obj->search_complain($conn,"active",$start);
}
if(!isset($_REQUEST['disid2']))
{
	$att_complain=$obj->search_complain($conn,"attended",0);
}
else if(isset($_REQUEST['disid2']))
{
	if($_REQUEST['disid2']<=0)
	{
		$start=0;
		$j=0;
	}
	else
	{
		$start=$_REQUEST['disid2'];
		$i=$_REQUEST['disid2'];
	}	
	$att_complain=$obj->search_complain($conn,"attended",$start);
}

/*if(isset($_REQUEST['cmpid'])&&isset($_REQUEST['status']))
{
	if($_REQUEST['status']=="active")
	{
		$data=array("status"=>"attended");
	}
	else
	{
		$data=array("status"=>"active");	
	}
	$wh=array("complainid"=>$_REQUEST['cmpid']);
	$cmpupd=$obj->update($conn,$data,$wh,'tbl_complain');
	header('location:complain.php');
}*/
/* FAQ */
if(isset($_REQUEST['disid']))
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
/* feedback*/
$fdback=$obj->search_feedback($conn,'tbl_feedback');

/* Ajax */
if(isset($_REQUEST['newFaq']))
{
	?>
		<tr>
			<td style="margin:10px;">Question</td>
			<td style="margin:10px;"><textarea name="txtQuestion" placeholder="Enter Question" required cols=30></textarea></td>
		</tr>
		<tr>
			<td style="margin:10px;">Answer</td>
			<td style="margin:10px;"><textarea name="txtAnswer" placeholder="Enter Answer" required cols="30"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td style="margin:10px;"><input type="Submit" value="Add FAQ" name="addFaq"></td>
		</tr>
	<?php
}
/* /Ajax */
/*add New FAQ */
if(isset($_REQUEST['addFaq']))
{
	$data=array("question"=>$_POST['txtQuestion'],"answer"=>$_POST['txtAnswer']);
	$ins_faq=$obj->insert($conn,$data,'tbl_faq');
	header('location:faq.php');
}

/*update FAQ */
if(isset($_REQUEST['faqupd']))
{
	$data=array("faqid"=>$_REQUEST['faqupd']);
	$upd_rec=$obj->search($conn,$data,'tbl_faq');
	$upd_res=$upd_rec->fetch_object();
}
if(isset($_REQUEST['updFaq']))
{
	$data=array("question"=>$_POST['txtQuestion'],"answer"=>$_POST['txtAnswer']);
	$wh=array("faqid"=>$_POST['txtFaqid']);
	$res=$obj->update($conn,$data,$wh,'tbl_faq');
	header('location:faq.php');
}
if(isset($_REQUEST['faqdel']))
{
	$data=array("faqid"=>$_REQUEST['faqdel']);
	$res=$obj->delete($conn,$data,'tbl_faq');
	header('location:faq.php');
}
/* Excel Download */
if(isset($_REQUEST['dis_history']))
{
	header("content-type: application/vnd-ms-excel");
	header("content-Disposition: attachment;filename=booking_report.xls");
	include("booking_data.php");
}
?>