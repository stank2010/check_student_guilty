
<html>
<head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> </head>
<link href="css/bootstrap.css" rel="stylesheet">

<?php 
include "access.php";
include "func.php";
$snum=$_GET['stu_num'];
$re=mysql_query("select * from student");

while($st=mysql_fetch_array($re))
if($snum==$st['num'])break;

?>



<div class="container">
<!--<img align="right" src="data:image/jpeg;base64,<?php echo base64_encode( $st['pic'] ); ?>" style="width:150px;height:200px;"/>-->

<?php
echo "<h3>Name : ".$st['name'];
echo "<br><br>Class:".$st['class'];
echo "<br><br>Student No. ".$st['num'];
echo "<br><br>Point : ".$st['point'];
echo "<br><br>Late : ".$st['late']." times</h3>";
?>
<a class="btn btn-primary" href=<?php echo "Printer/print.php?stu_num=".$snum?> role="button" >Print </a>
<a class="btn btn-primary" href=<?php echo "Edite.php?stu_num=".$snum?> role="button" >Edite </a>
<br><br>

</div>

<th><h2 align="center">
	<form method="get">
	<input class="btn btn-danger" type="submit" name="ei" value='guity'> 
		History
	<input class="btn btn-warning" type="submit" name="ei" value='late'> 
	<input type="hidden" name="stu_num" value=<?php echo $st['num']; ?>> 
	</form>
	</h2></th>
	
<table class="table">
   <tr>
     <th>Date</th>
	 <th>เรื่อง</th> 
     <th>Type</th>
     <th>Point</th>
	 <th>หมายเหตุ</th>
	 <th>#</th>
   <tr> 

<?php 
if($_GET['ei']=="late")late($snum);
else
{
	$value=array(
	"101"=>"แต่งกายผิดระเบียบ",
	"102"=>"แสดงกิริยา วาจา ก้าวราว",
	"103"=>"หลบหนีคาบเรียน",
	"104"=>"หลบหนีเข้าแถว",
	"105"=>"หลบหนีการตรวจระเบียบต่างๆ",
	"106"=>"ความผิดอื่นๆที่เทียบเท่า",
	
	"201"=>"หนีโรงเรียน",
	"202"=>"หลีกหนีการรายงานตัว",
	"203"=>"ทะเลาะวิวาท",
	"204"=>"ส่งเสริมให้ผู้อื่นทำผิด",
	"205"=>"มาโรงเรียนสายมาก 5 ครั้ง",
	"206"=>"ทำเสียงดังรบกวน",
	"207"=>"ทำให้ทรัพย์สินผู้อื่นหรือของโรงเรียนเสียหาย",
	"208"=>"เขียนข้อความหรือภาพไม่เหมาะสม",
	"209"=>"ปฎิบัตตัวไม่เหมาะสมกับสภาพนักเรียน",
	"210"=>"ใช้โทรศัพท์ในเวลาเรียน หรือ สภานที่ไม่เหมาะสม",
	"211"=>"ความผิดอื่นๆที่เทียบเท่า",
	
	"301"=>"ดื่มขอมึนเมาหรือสูบบุหรี่",
	"302"=>"ลักทรัพย์",
	"303"=>"เล่นการพนัน",
	"304"=>"ข่มขู่แสดงตนเป็นอันธพาล",
	"305"=>"ทะเลาะวิวาทถึงใช้กำลัง",
	"306"=>"เจตนาทำลายทรัพย์สินผู้อื่นหรือของโรงเรียนเสียหาย",
	"307"=>"แสดงอาการลบหลู่ ครู-อาจารย์",
	"308"=>"พฤติกรรมชู้สาว",
	"309"=>"เที่ยวเตร่ผิดเวลา",
	"310"=>"เจตนาปลอมแปลงเอกสาร",
	"311"=>"หลบหลีกการกระทำผิดโดยเจตนา",
	"312"=>"ความผิดอื่นๆที่เทียบเท่า",
	
	"401"=>"เสพยาเสพติดขั้นร้ายแรง",
	"402"=>"นำยาเสพติดมาจำหน่ายจ่ายแจก",
	"403"=>"พกพาอ าวุธมาโรงเรียน",
	"404"=>"ทำร้ายร่างกายผู้อื่นถึงบาดเจ็บ",
	"405"=>"เป็นต้นเหตุของการทะเลาะวิวาทระหว่างกลุ่ม",
	"406"=>"ชักชวนบุคคลภายนอกมาทะเลาะวิวาทถึงใช้กำลัง",
	"407"=>"ลักทรัพย์ที่มีมูลค่าสูง",
	"408"=>"กรรโชกทรัพย์ผู้อื่น",
	"409"=>"ทำผิดกฏหมายสูงกว่าลหุโทษและตกเป็นผู้ต้องหาในคดี",
	"410"=>"ความผิดอื่นๆที่เทียบเท่า"
	);
	
	$re=mysql_query("select * from list order by id desc");
	while($st=mysql_fetch_array($re))
	if($snum==$st['num'])
 	{
    	echo "<tr>";
    	echo "<td>".$st['date']."</td>";
    	echo "<td>".$value[$st['type']]."</td>";
    	echo "<td>".$st['type']."</td>";
    	echo "<td>".$st['point']."</td>";
		echo "<td>".$st['ref']."</td>";
		echo '<td><a class="btn btn-primary" href=edite_list.php?id='.$st['id'].' role="button" >Edite</a> ';
		echo ' <a class="btn btn-danger" href="del_list.php?id='.$st['id'].'&stu_num='.$st['num'].'" role="button" >Delete </a> ';
    	echo "</tr>";
 	}
}

	
?>
</table>
</html>
