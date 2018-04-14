
<?php
	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear - $strHour:$strMinute:$strSeconds";
	}		


	
	//echo  hash( 'sha512', hash( 'sha256',sha1(md5('1234'))));
?>

<?php

$date2 = new DateTime();

$date1 = new DateTime('2000-01-01');
$date = new DateTime('2000-01-01');

//$diff=date_diff($date1,$date2);
echo $date1->diff($date2)->format("%R%y years %m month %d days, %h hours and %i minuts").'<br>';
//echo $diff->format("%R%a days").'<br>';


date_add($date, date_interval_create_from_date_string('7 days'));
echo date_format($date, 'Y-m-d'); echo "<br>";
date_add($date, date_interval_create_from_date_string('7 days'));
echo date_format($date, 'Y-m-d'); echo "<br>";
date_add($date, date_interval_create_from_date_string('7 days'));
echo date_format($date, 'Y-m-d'); echo "<br>";
date_add($date, date_interval_create_from_date_string('7 days'));
echo date_format($date, 'Y-m-d'); echo "<br>";
date_add($date, date_interval_create_from_date_string('7 days'));
echo date_format($date, 'Y-m-d'); echo "<br>";
date_add($date, date_interval_create_from_date_string('7 days'));
echo date_format($date, 'Y-m-d'); echo "<br>";
date_add($date, date_interval_create_from_date_string('7 days'));
echo date_format($date, 'Y-m-d'); echo "<br>";
date_add($date, date_interval_create_from_date_string('7 days'));
echo date_format($date, 'Y-m-d'); echo "<br>";
date_add($date, date_interval_create_from_date_string('7 days'));
echo date_format($date, 'Y-m-d'); echo "<br>";
date_add($date, date_interval_create_from_date_string('7 days'));
echo date_format($date, 'Y-m-d'); echo "<br>";
date_add($date, date_interval_create_from_date_string('7 days'));
echo date_format($date, 'Y-m-d'); echo "<br>";

?>

<div data-widget-group="group1">
	<div class="row">
		<div class="col-md-3">
			<div class="info-tile tile-orange" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
				<div class="tile-icon"><i class="fa fa-book"></i></div>
				<div class="tile-heading"><span>วิิชา</span></div>
				<div class="tile-body"><span>150</span></div>
				<!-- <div class="tile-footer"><span class="text-success">22.5% <i class="fa fa-level-up"></i></span></div> -->
			</div>	
		</div>
		
		<div class="col-md-3">
			<div class="info-tile tile-success" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
				<div class="tile-icon"><i class="fa fa-sitemap"></i></div>
				<div class="tile-heading"><span>กลุ่ม</span></div>
				<div class="tile-body"><span>5100</span></div>
				<!-- <div class="tile-footer"><span class="text-danger">12.7% <i class="fa fa-level-down"></i></span></div> -->
			</div>
		</div>

		<div class="col-md-3">
			<div class="info-tile tile-info" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
				<div class="tile-icon"><i class="fa fa-users"></i></div>
				<div class="tile-heading"><span>นักเรียน</span></div>
				<div class="tile-body"><span>150</span></div>
				<!-- <div class="tile-footer"><span class="text-success">5.2% <i class="fa fa-level-up"></i></span></div> -->
			</div>
		</div>

		<div class="col-md-3">
			<div class="info-tile tile-danger" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
				<div class="tile-icon"><i class="fa fa-send-o"></i></div>
				<div class="tile-heading"><span>Visitors</span></div>
				<div class="tile-body"><span>600</span></div>
				<!-- <div class="tile-footer"><span class="text-danger">10.5% <i class="fa fa-level-down"></i></span></div> -->
			</div>
		</div>	


	</div>
</div>


