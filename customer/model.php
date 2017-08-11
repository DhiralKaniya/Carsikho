<?php
class connection
{
	public function db_connect()
	{
		$conn=new mysqli("mysql.hostinger.in","u749094136_abcd","funny@143","u749094136_abcd") or die(mysqli_error());
		return $conn;
	}
}
class customer
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
	public function not_search($conn,$city,$tbl_name)
	{
		$qry="select * from $tbl_name where cityid not in($city) and status='active'";
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
	public function book_schedule($conn,$carid,$mdtsid,$csid)
	{
		$qry="select csid,ts.mdtstime as time,noofday,price from tbl_car tc,tbl_schedule ts,tbl_car_schedule tcs where tcs.carid=tc.carid and tcs.scheduleid=ts.schid and tcs.csid='$csid' and tc.carid='$carid' and tcs.mdtsid='$mdtsid' and status='active'";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;		
	}
	public function search_schedule($conn,$carid,$mdtsid)
	{
		$qry="select csid,ts.mdtstime as time,noofday,price from tbl_car tc,tbl_schedule ts,tbl_car_schedule tcs where tcs.carid=tc.carid and tcs.scheduleid=ts.schid and tc.carid='$carid' and tcs.mdtsid='$mdtsid' and status='active'";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;		
	}
	public function search_video($conn)
	{
		$qry="select * from tbl_ecarvideos te,tbl_mdts tm where te.mdtsid=tm.id and te.status='active'";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;		
	}
	public function search_once($conn,$tbl_name)
	{
		$qry="select * from $tbl_name";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;	
	}
	public function search_last_booking($conn,$custid)
	{
		$qry="select tb.bookingid,tm.name,tm.address,tm.contactno,tc.carname,tc.carnumber,ts.mdtstime,tcs.price,tb.booking_date,tb.training_from,tb.training_to,tb.picuppoint,tc.carpic from tbl_booking tb,tbl_car_schedule tcs,tbl_car tc,tbl_mdts tm,tbl_schedule ts where tb.customerid=$custid and tb.csid=tcs.csid and tc.carid=tcs.carid and tm.id=tcs.mdtsid and ts.schid=tcs.scheduleid order by tb.bookingid desc limit 1";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;
	}
	public function test_search($conn,$tbl_name)
	{
		$qry="select * from $tbl_name order by rand() limit 1,1";
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
	public function search_faq($conn,$tbl_name,$start)
	{
		$qry="select * from $tbl_name limit $start,10";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;	
	}
	public function search_ajax($conn,$tbl_name,$value,$fiildname)
	{
		$qry="select * from $tbl_name where $fiildname like '%$value%'";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;	
	}
	public function search_booking($conn,$custid)
	{
		$qry="select tm.name,tm.address,tm.contactno,tb.invoice,tc.carname,tc.carnumber,ts.mdtstime,tb.booking_date,tb.training_from,tb.training_to,tb.picuppoint from tbl_booking tb,tbl_car_schedule tcs,tbl_car tc,tbl_mdts tm,tbl_schedule ts where tb.customerid='$custid' and tb.csid=tcs.csid and tc.carid=tcs.carid and tm.id=tcs.mdtsid and ts.schid=tcs.scheduleid";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;	
	}
	public function search_distinct($conn,$custmerid)
	{
		$qry="select DISTINCT(tcs.mdtsid) from tbl_car_schedule tcs,tbl_booking tb where customerid='$custmerid' and tb.csid=tcs.csid";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;
	}
}
?>