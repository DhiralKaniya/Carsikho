<?php
session_start();
include("model.php");
$obj1=new carshikho;
$obj2=new connect;
$conn=$obj2->db_connect();

//echo "call";
/*current date */
date_default_timezone_set('Asia/Kolkata');
$current_date=date("d-m-Y");

/*--if Customer is already login--*/
if(isset($_SESSION['customerid']))
{
	header('location:customer/');
}
/*--if mdts is already login--*/
if(isset($_SESSION['mdtsid']))
{
	header('location:mdts');
}
if(isset($_SESSION['admin']))
{
	header('location:admin');
}
/* TOTAL */
/* search total customer */
$cust=$obj1->search_once($conn,'tbl_customer');
$total_cust=mysqli_num_rows($cust);

/* search total mdts */
$mdts=$obj1->search_once($conn,'tbl_mdts');
$total_mdts=mysqli_num_rows($mdts);

/* Total Appoinment */
$app=$obj1->search_once($conn,'tbl_booking');
$total_appoint=mysqli_num_rows($app);
/*--AJAX--*/
//unset($_SESSION['admin']);
if(isset($_REQUEST['cityid']))
{
	$res=$obj1->findstate($conn,$_REQUEST['cityid']);
	$fetch_state=$res->fetch_object();
	?>
    <input type="text" value="<?php echo $fetch_state->statename; ?>" readonly size="50" >
    <?php	
}
/*--/AJAX--*/
/*--fill city--*/
$city=$obj1->search_once($conn,'tbl_city');

/* --login Process --*/
if(isset($_POST['login']))
{
	/*--customer login--*/
	$pass=$_REQUEST['txtPass'];
	if($_REQUEST['txtcaptcha']==$_SESSION['code'])
	{
		$data=array("email"=>$_POST['txtEmail'],"password"=>$pass);
		$result=$obj1->search('tbl_customer',$data,$conn);
		while($row=$result->fetch_object())
			{
				/*$i=true;
				setcookie("customerid",base64_encode($row->id));
				setcookie("customername",base64_encode($row->name));
				setcookie("customerimage",base64_encode($row->profilepic));*/
				$_SESSION['customerid']=$row->id;
				$_SESSION['customername']=$row->name;
				$_SESSION['customerimage']=$row->profilepic;
			}
		if(isset($_SESSION['customerid']))
		{
			header('location:customer');
		}
		else
		{
			/*--if there is not customer then it check for mdts login --*/
			$data=array("email"=>$_POST['txtEmail'],"password"=>$pass,"status"=>"active");
			$res=$obj1->search('tbl_mdts',$data,$conn);
			while($row=$res->fetch_object())
			{
				$_SESSION['mdtsid']=$row->id;
				$_SESSION['mdtsname']=$row->name;
			}
			if(isset($_SESSION['mdtsid']))
			{
				//$i=true;
				header('location:mdts');
			}
			else
			{
				if(base64_encode($_POST['txtEmail'])==base64_encode("admin")&&base64_encode($pass)==base64_encode("admin123"))
					{
						//$i=true;
						//setcookie("admin",base64_encode($_POST['txtEmail']));
						$_SESSION['admin']=$_POST['txtEmail'];
						header('location:admin');
					}
					else
					{
						$_SESSION['loginerror']="invalid username or password..";
					}
			}
		}
	}
	else
	{
		$_SESSION['loginerror']="Captach Code is Invalid..";
	}
}
/* MDTS Registration */
if(isset($_REQUEST['register']))
{
	if($_REQUEST['txtcaptcha']==$_SESSION['code'])
	{
		$allowextension=array("jpg","jpeg");
		$mdtslic=explode("/",$_FILES["mdtslic"]["type"]);
		$mdtsprofile=explode("/",$_FILES['profilepic']['type']);
		$extension1=end($mdtslic);
		$extension2=end($mdtsprofile);
		if(!in_array($extension1,$allowextension) || !in_array($extension2,$allowextension))
		{
			$_SESSION['error']="Uploaded pic is invalid plz upload JPEG or JPG file only";
		}
		else
		{
			$mdts_lic="pic/licpic/".uniqid().".jpg";
			$mdts_profile="pic/profilepic/".uniqid().".jpg";
			COPY($_FILES["mdtslic"]["tmp_name"],"mdts/".$mdts_lic) or die("ERROR in Coping file");
			COPY($_FILES["profilepic"]["tmp_name"],"mdts/".$mdts_profile) or die("ERROR in Coping file");
			$data=array("name"=>$_REQUEST['txtName'],"contactno"=>$_REQUEST['txtContact'],"email"=>$_REQUEST['txtEmail'],"address"=>$_REQUEST['txtAdd'],"cityid"=>$_REQUEST['city'],"licensepic"=>$mdts_lic,"profilepic"=>$mdts_profile,"status"=>"active","regdate"=>$current_date,"password"=>$_REQUEST['txtPass']);
			$res=$obj1->insert($conn,$data,'tbl_mdts');
			$_SESSION['error']="Your Details has been submitted Successfully...Admin will be check details,Please try to login after 2 hours....";
			header('location:login.php');
		}
	}
	else
	{
		$_SESSION['error']="captcha code is invalid... or inputed Data is Invalid....";
	}
}
/* Customer Registration */
if(isset($_REQUEST['signup']))
{
	$birth_date=$_REQUEST['dt']."-".$_REQUEST['month']."-".$_REQUEST['year'];
	if($_REQUEST['txtcaptcha']==$_SESSION['code'])
	{
		if($_REQUEST['txtPass']==$_REQUEST['txtConfpass'])
		{
			$licheck=$_FILES['licpic']['name'];
			if($licheck=="")
			{
				$allowextension=array("jpg","jpeg");
				$custprofile=explode("/",$_FILES['profilepic']['type']);
				$extension2=end($custprofile);
				if(!in_array($extension2,$allowextension))
				{
					$_SESSION['error']="Uploaded pic is invalid plz upload JPEG or JPG file only";
				}
				else
				{
					$cust_profile="pic/".uniqid().".jpg";
					COPY($_FILES["profilepic"]["tmp_name"],"customer/".$cust_profile) or die("ERROR in Coping file");
					$data=array("name"=>$_REQUEST['txtName'],"dob"=>$birth_date,"email"=>$_REQUEST['txtEmail'],"password"=>$_REQUEST['txtPass'],"contactno"=>$_REQUEST['txtContact'],"address"=>$_REQUEST['txtAdd'],"cityid"=>$_REQUEST['city'],"profilepic"=>$cust_profile,"regdate"=>$current_date,"status"=>"block");
					$res=$obj1->insert($conn,$data,'tbl_customer');
					$_SESSION['loginerror']="Your Details has been submitted Successfully...Login with your EmailId and Password..";
					header('location:login.php');
				}
			}
			else
			{
				$allowextension=array("jpg","jpeg");
				$custlic=explode("/",$_FILES["licpic"]["type"]);
				$custprofile=explode("/",$_FILES['profilepic']['type']);
				$extension1=end($custlic);
				$extension2=end($custprofile);
				if(!in_array($extension1,$allowextension) || !in_array($extension2,$allowextension))
				{
					$_SESSION['error']="Uploaded pic is invalid plz upload JPEG or JPG file only";
				}
				else
				{
					$cust_lic="pic/".uniqid().".jpg";
					$cust_profile="pic/".uniqid().".jpg";
					COPY($_FILES["licpic"]["tmp_name"],"customer/".$cust_lic) or die("ERROR in Coping file");
					COPY($_FILES["profilepic"]["tmp_name"],"customer/".$cust_profile) or die("ERROR in Coping file");
					$data=array("name"=>$_REQUEST['txtName'],"dob"=>$birth_date,"email"=>$_REQUEST['txtEmail'],"password"=>base64_encode($_REQUEST['txtPass']),"contactno"=>$_REQUEST['txtContact'],"address"=>$_REQUEST['txtAdd'],"cityid"=>$_REQUEST['city'],"licensepic"=>$cust_lic,"profilepic"=>$cust_profile,"regdate"=>$current_date,"status"=>"block");
					$res=$obj1->insert($conn,$data,'tbl_customer');
					$_SESSION['loginerror']="Your Details has been submitted Successfully...Login with your EmailId and Password..";
					header('location:login.php');
				}	
			}
		}
		else
		{
			$_SESSION['error']="Password Does not Match...";		
		}
	}
	else
	{
		$_SESSION['error']="captcha code is invalid...or Inputed Data is Invalid...";
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
	$faq_detail=$obj1->find_faq($conn,'tbl_faq',$_REQUEST['findfaq']);
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
	$faqdetail=$obj1->search_faq($conn,'tbl_faq',$i);
}
else if(!isset($_REQUEST['disid']))
{
	$i=0;
	$faqdetail=$obj1->search_faq($conn,'tbl_faq',$i);
}
/* Feedback */
if(isset($_REQUEST['feedback']))
{
	$data=array("feedback"=>$_REQUEST['txtRev'],"emailid"=>$_REQUEST['txtEmail'],"date"=>$current_date);
	$ins_feedback=$obj1->insert($conn,$data,'tbl_feedback');
	header('locaiton:contact.php');
}
/* Date Validation */
if(isset($_REQUEST['dis_year']))
{
	?>
	<option value="01">January</option>
	<option value="02">Febuary</option>
	<option value="03">March</option>
	<option value="04">April</option>
	<option value="05">May</option>
	<option value="06">June</option>
	<option value="07">July</option>
	<option value="08">August</option>
	<option value="09">September</option>
	<option value="10">October</option>
	<option value="11">November</option>
	<option value="12">December</option>
	<?php
}
if(isset($_REQUEST['dis_day']))
{
	$month=$_REQUEST['month'];
	$year=$_REQUEST['year'];
	if($year%4==0&&$month==2)
	{
		$i=1;
		while($i<10)
		{
			?>
			<option value="0<?php echo $i; ?>">0<?php echo $i; ?></option>
			<?php
			$i++;
		}
		while($i<30)
		{
			?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php
			$i++;
		}
	}
	else if($month==2)
	{
		$i=1;
		while($i<10)
		{
			?>
			<option value="0<?php echo $i; ?>">0<?php echo $i; ?></option>
			<?php
			$i++;
		}
		while($i<29)
		{
			?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php
			$i++;
		}	
	}
	else if($month%2==0)
	{
		$i=1;
		while($i<10)
		{
			?>
			<option value="0<?php echo $i; ?>">0<?php echo $i; ?></option>
			<?php
			$i++;
		}
		while($i<31)
		{
			?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php
			$i++;
		}
	}
	else
	{
		$i=1;
		while($i<10)
		{
			?>
			<option value="0<?php echo $i; ?>">0<?php echo $i; ?></option>
			<?php
			$i++;
		}
		while($i<32)
		{
			?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php
			$i++;
		}	
	}

}
/* license display */
if(isset($_REQUEST['license']))
{
	if($_REQUEST['license']=="true")
	{
	?>
	<td></td>
	<td><input type="file" name="licpic" required></td>
	<?php
	}
	else
	{
		?>
		<?php
	}
}
?>