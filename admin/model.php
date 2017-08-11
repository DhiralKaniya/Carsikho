<?php
class connection
{
	public function db_connect()
	{
		$conn=new mysqli("mysql.hostinger.in","u749094136_abcd","funny@143","u749094136_abcd") or die(mysqli_error());
		return $conn;
	}
}
class mdts
{
	public function search($conn,$data,$tbl_name)
	{
		$mdts_keys=array_keys($data);
		$mdts_value=array_values($data);
		$len=count($data);
		$i=0;
		$qry="select * from $tbl_name where";
		foreach($data as $dd)
		{
			if($len==$i+1)
			{
				$qry.=" ".$mdts_keys[$i].=" ='".$mdts_value[$i]."'";
			}
			else
			{
				$qry.=" ".$mdts_keys[$i].=" ='".$mdts_value[$i]."' and";
			}
			$i++;
		}
		$res=$conn->query($qry);
		return $res;
	}
	public function search_car_sch($conn,$mdtsid,$carid)
	{
		$qry="select * from tbl_car_schedule tcs,tbl_schedule ts where ts.schid=tcs.scheduleid and tcs.mdtsid=$mdtsid and carid=$carid";
		$res=$conn->query($qry) or die(mysql_error());
		return $res;
	}
	public function booking_details($conn)
	{
		$qry="select tc.name as custname,tm.name as mdtsname,tcar.carname,tcar.carnumber,ts.mdtstime,booking_date,training_to,training_from,picuppoint from tbl_booking tb,tbl_customer tc,tbl_car tcar,tbl_car_schedule tcs,tbl_schedule ts,tbl_mdts tm where tb.customerid=tc.id and tb.csid=tcs.csid and tcs.mdtsid=tm.id and tcs.carid=tcar.carid and tcs.scheduleid=ts.schid order by booking_date DESC";
		$res=$conn->query($qry) or die(mysql_error());
		return $res;
	}
	public function update($conn,$data,$whcon,$tbl_name)
	{
		$qry="update $tbl_name set ";
		$data_key=array_keys($data);
		$data_value=array_values($data);
		$len=count($data);
		$wh_key=array_keys($whcon);
		$wh_values=array_values($whcon);
		$len1=count($whcon);
		$i=0;
		foreach ($data as $dd) {
			if($len==$i+1)
			{
				$qry.=$data_key[$i]."='".$data_value[$i]."' where ";
			}
			else
			{
				$qry.=" ".$data_key[$i]."='".$data_value[$i]."',";
			}
			$i++;
		}
		$i=0;
		foreach($whcon as $wh) {
			if($len1==$i+1)
			{
				$qry.=$wh_key[$i]."='".$wh_values[$i]."'";
			}
			else
			{
				$qry.=$wh_key[$i]."='".$wh_values[$i]."'' and  ";
			}
			$i++;
		}
		//echo $qry;
		$res=$conn->query($qry) or die(mysql_error());
		return $res;
	}
	public function insert($conn,$data,$tbl_name)
	{
		$mdts_keys=array_keys($data);
		$mdts_values=array_values($data);
		$ins_key=implode(",",$mdts_keys);
		$ins_value=implode("','",$mdts_values);
		$qry="insert into $tbl_name($ins_key) values('$ins_value')";
		//echo $qry;
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;
	}
	public function delete($conn,$data,$tbl_name)
	{
		$mdts_keys=array_keys($data);
		$mdts_values=array_values($data);
		$qry="delete from $tbl_name where ";
		//echo $qry;
		$i=0;
		$len=count($data);
		foreach($data as $dd)
		{
			if($len==$i+1)
			{
				$qry.=" ".$mdts_keys[$i].=" ='".$mdts_values[$i]."'";
			}
			else
			{
				$qry.=" ".$mdts_keys[$i].=" ='".$mdts_values[$i]."' and";
			}
			$i++;
		}
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;	
	}
	public function search_once($conn,$tbl_name)
	{
		$qry="select * from $tbl_name";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;	
	}
	public function search_faq($conn,$tbl_name,$start)
	{
		$qry="select * from $tbl_name limit $start,10";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;	
	}
	public function search_feedback($conn,$tbl_name)
	{
		$qry="select * from $tbl_name order by date desc";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;	
	}
	public function search_complain($conn,$status,$start)
	{
		$qry="select complainid,name,email,contactno,complain,tc.status,complain_date,solution,attended_date from tbl_complain tc,tbl_customer ts where tc.customerid=ts.id and tc.status='$status' limit $start,10";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;	
	}
	public function search_once_limit($conn,$data,$start,$tbl_name,$order)
	{
		$mdts_keys=array_keys($data);
		$mdts_value=array_values($data);
		$len=count($data);
		$i=0;
		$qry="select * from $tbl_name where";
		foreach($data as $dd)
		{
			if($len==$i+1)
			{
				$qry.=" ".$mdts_keys[$i].=" ='".$mdts_value[$i]."'";
			}
			else
			{
				$qry.=" ".$mdts_keys[$i].=" ='".$mdts_value[$i]."' and";
			}
			$i++;
		}
		$qry.=" order by ".$order." limit ".$start.",10";
		//echo $qry;
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;		
	}
}
?>