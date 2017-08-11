<?php
class connect
{
	public function db_connect()
	{
		$conn=new mysqli("mysql.hostinger.in","u749094136_abcd","funny@143","u749094136_abcd") or die(mysqli_error());
		return $conn;
	}
}
class carshikho
{
	public function search($tbl_name,$data,$conn)
	{
		$tbl_values=array_values($data);
		$tbl_key=array_keys($data);
		$i=0;
		$len=count($data);
		$qry="select * from $tbl_name where";
		foreach($data as $dd)
		{
			if($len==$i+1)
			{
				$qry.=" ".$tbl_key[$i]."='".$tbl_values[$i]."'";
			}
			else
			{
				$qry.=" ".$tbl_key[$i]."='".$tbl_values[$i]."' and";
			}
			$i++;
		}
		$res=$conn->query($qry) or die(mysqli_error());
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
	public function findstate($conn,$cityid)
	{
		$qry="select * from tbl_state where id = (select stateid from tbl_city where id=$cityid)";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;
	}
	public function search_faq($conn,$tbl_name,$start)
	{
		$qry="select * from $tbl_name limit $start,10";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;	
	}
	public function find_faq($conn,$tbl_name,$value)
	{
		$qry="select * from $tbl_name where question like '%$value%'";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;	
	}
	public function search_once($conn,$tbl_name)
	{
		$qry="select * from $tbl_name";
		$res=$conn->query($qry) or die(mysqli_error());
		return $res;
	}
}
?>