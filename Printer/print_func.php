<?php
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
$table; 
$f;
//$PHPWord = new PHPWord();

function ROW($word,$style,$font)
{
	global $table,$f;
	$table->addRow();
	for($i=0;$i<6;$i++)
		$table->addCell(500,$style)->addText($word[$i],$font);
}	

function make($NUM)
{
	$check=false;
	
	global $table,$f,$PHPWord,$section,$value;
	
	$re=mysql_query("select * from student");
	while($st=mysql_fetch_array($re))
	if($NUM==$st['num'])break;
	
	
	
	// New portrait section
	$fontStyle = array('align'=>'center','size'=>20);// Define font style for first rows

	$f= array('size'=>12,'align'=>'center');

	//$PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>100));

//$text="เลขประจำตัว  ".$NUM."  ".$st['name']." ห้อง".$st['class'];
//$section->addText($text, $fontStyle,'pStyle');

// Define table style arrays
	$styleTable = array('borderSize'=>6, 'borderColor'=>'000000','cellMargin'=>60,'tableAlign' => 'center',);
	$first = array('borderBottomSize'=>6, 'borderBottomColor'=>'000000','borderSize'=>6,'height'=>20);

// Define cell style arrays
	$styleCell = array('align'=>'center');
	$styleCellBTLR = array('textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);

	$txt= "เลขประจำตัว  ".$NUM.' '.$st['name']." ห้อง ".$st['class'];
	
	$section->addText($txt,array('size'=>15));

	$PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);// Add table style

	$table = $section->addTable();// Add table

	$word=array('ลำดับ','วันเดือนปี','รหัส','เรื่อง','คะแนน',' หมายเหตุ ');
	ROW($word,$first,$fontStyle);

	$j=0; $sum=0;
	$re=mysql_query("select * from list order by date asc");
	while($st=mysql_fetch_array($re))
	if($NUM==$st['num'])
	{
		$check=true;
		$j++;
		$WORD=$value[ $st['type'] ];
		$word=array(" $j ",$st['date'],$st['type'],$WORD,$st['point'],$st['ref']);
		ROW($word,$first,$f);
		$sum+=$st['point'];
	}

	$S1 = array('borderSize'=>6,'borderLeftColor'=>'FFFFFF' ,'borderRightColor'=>'FFFFFF');
	$L1 = array('borderSize'=>6,'borderRightColor'=>'FFFFFF');
	$R1 = array('borderSize'=>6,'borderLeftColor'=>'FFFFFF');

	$table->addRow(100);
	$table->addCell(200,$L1)->addText('');
	$table->addCell(200,$S1)->addText('');
	$table->addCell(200,$S1)->addText('');
	$table->addCell(4000,$S1)->addText("รวมคะแนน",$f);
	$table->addCell(200,$S1)->addText($sum,$f);
	$table->addCell(1000,$R1)->addText('คะแนน',$f);

		return $check;
}

?>