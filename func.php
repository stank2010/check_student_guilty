<?php


function add($DATE,$num,$type,$reff)
{
	$re=mysql_query("select * from student");
	$B=1;
    while($B==1 && $list=mysql_fetch_array($re))
    if($list['num']==$num)
    {
    	$point=Pcode($type);
		
  	    $ADD=$list['count']+1;	
        $command="UPDATE student SET count='$ADD' WHERE num='$num' ";
        mysql_query($command);
        
		$pADD=$list['point']+$point;		
        $command="UPDATE student SET point='$pADD' WHERE num='$num' ";
   	    mysql_query($command);
   	    /*
        $late=0;
	   	if(booch($type))$late=1;
        $late+=$list['late'];
        */
        $command="UPDATE student SET late='$late' WHERE num='$num' ";
   	   	mysql_query($command);
        $B=0;
        
        date_default_timezone_set("Asia/Bangkok");
		$TIME;
		$id=mysql_num_rows(mysql_query("select * from list"))+1;
		
		$re=mysql_query("insert into list values ('$id','$DATE','$TIME','$num','$point','$type','$reff')");	
		
		//Q($list['name'],$num,$pADD);
	}
    
    return $B;
}

function Pcode($a)
{
     if($a[0]=='1')return 5;
else if($a[0]=='2')return 10;
else if($a[0]=='3')return 20;
else if($a[0]=='4')return 30;
else return 0;
}

function checklog($id,$pw)
{
$t=mysql_query("SELECT * FROM user WHERE id='$id' and pw='$pw'");
$s=mysql_fetch_assoc($t);
if($s['pw']==$pw&&$pw!=null&&$id!=null)return true;
else return false;
}

function guity($NUM) //ในตารางความผิด
{
	$re=mysql_query("select * from list order by id desc");
	while($st=mysql_fetch_array($re))
	if($NUM==$st['num'])
 	{
    	echo "<tr>";
    	echo "<td>".$st['date']."</td>";
    	echo "<td>".$st['time']."</td>";
    	echo "<td>".$st['type']."</td>";
    	echo "<td>".$st['point']."</td>";
		echo "<td>".$st['ref']."</td>";
    	echo "</tr>";
 	}
}

function booch($a) { return $a=="A03"||$a=="B01";} //เช็คความผิดที่มาสาย

function late($NUM) //ตารางมาสาย
{
	$re=mysql_query("select * from list order by id desc");
	while($st=mysql_fetch_array($re))
	if($NUM==$st['num'] && booch($st['type'])) 
 	{
    	echo "<tr>";
    	echo "<td>".$st['date']."</td>";
    	echo "<td>".$st['time']."</td>";
    	echo "<td>"."late"."</td>";
    	echo "<td>".$st['point']."</td>";
		echo "<td>".$st['ref']."</td>";
    	echo "</tr>";
 	}
}

function Q($name,$num,$point)
{
	$re=mysql_query("select * from queue");
	
	if($point<=0)$i="q4";
	else if($point<=20)$i="q3";
	else if($point<=50)$i="q2";
	else if($point<=70)$i="q1";
	else $i="q0";
	
	if($i!="q0")
	{
		$B=1;
		while($B==1 && $inQ=mysql_fetch_array($re))
		if(is_array($inQ)&&$inQ['num']==$num)
		{
			$command="UPDATE queue SET ".$i."=2 WHERE num='$num' ";
   	   		mysql_query($command);	
			$B=0;
			break;
		}
	
		if($B==1)
		{
			$cmd="insert into queue(name,num,".$i.") values ('$name','$num',2)";
			mysql_query($cmd);
		}
	}
}


?>
