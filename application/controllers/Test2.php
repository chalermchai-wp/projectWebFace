<?php 
	class Test2 extends CI_Controller {
	
		public function index()
		{
			$this->readExcel();
		}
		
		public function readExcel(){
			$this->load->library('excel');
			// $objReader = PHPExcel_IOFactory::load('assets/upload/classs.xls');
			// $sheetData = $objReader->getActiveSheet()->toArray(true,true,true,true);
			
			$excelReader = PHPExcel_IOFactory::createReaderForFile('assets/upload/classs.xls');
			$excelObj = $excelReader->load('assets/upload/classs.xls');
			$worksheet = $excelObj->getSheet(0);
			$lastRow = $worksheet->getHighestRow();
			
			$s_code = '';
			$s_name = '';
			$sec = 0;
			$credit = 0;
			$t_name = '';
			$time = '';
			$term = 0;
			$year = 0;

			//echo "<table>";
			for ($row = 1; $row <= $lastRow; $row++) {

				if($row == 2){
					$term_temp = explode("/",substr($worksheet->getCell('E'.$row)->getValue(),strpos($worksheet->getCell('E'.$row)->getValue(), '/')-1));
					$term = $term_temp[0];
					$year = $term_temp[1];
					echo 'เทอม = ' .$term .'  ปี '. $year. '<br>';
				}

				if($row == 4){
					$s_code = substr($worksheet->getCell('B'.$row)->getValue(),26,6);
					$s_name = str_replace("หน่วยกิต","",substr(substr($worksheet->getCell('B'.$row)->getValue(),strpos($worksheet->getCell('B'.$row)->getValue(),$s_code),strpos($worksheet->getCell('B'.$row)->getValue(), 'หน่วยกิต')),8));
					$credit = substr(substr($worksheet->getCell('B'.$row)->getValue(),strpos($worksheet->getCell('B'.$row)->getValue(), 'หน่วยกิต'),27),24,4);

					echo 'วิชา = '.$s_name."<br>";
					echo 'รหัส = '.$s_code."<br>";
					echo 'หน่วยกิต = '.$credit."<br>";					
				}

				if(strpos($worksheet->getCell('B'.$row)->getValue(), 'วันเวลาเรียน') !== false){
					// echo $worksheet->getCell('B'.$row)->getValue().'<br>';
					$day = str_replace("วันเวลาเรียน","",substr($worksheet->getCell('B'.$row)->getValue(),0,strrpos($worksheet->getCell('B'.$row)->getValue(),'.')));
					$time = str_replace("วันเวลาเรียน","",$worksheet->getCell('B'.$row)->getValue());
					$d_len = strlen($day);
					$time = explode(" ",trim(substr($time,$d_len+1)));

					echo 'เรียนวัน '.$day." เวลา $time[0] <br>";
					
				}

				if(strpos($worksheet->getCell('B'.$row)->getValue(), 'Sec') !== false){
					$sec = substr($worksheet->getCell('B'.$row)->getValue(),strlen($worksheet->getCell('B'.$row)->getValue())-1,1);										
					$t_name =  str_replace("ผู้สอน ","",$worksheet->getCell('H'.$row)->getValue());
					
					// if($t_name != $t_name){
						echo "สอน = ".$t_name ."<br>";
					// }
					//echo 'Sec = '.$sec.'  ';					
				}else{					
					if(strpos($worksheet->getCell('D'.$row)->getValue(), 'นาย') !== false || strpos($worksheet->getCell('D'.$row)->getValue(), 'นางสาว') !== false){										
						echo 'Sec = '.$sec.'  ';
						echo $worksheet->getCell('C'.$row)->getValue().' '.$worksheet->getCell('D'.$row)->getValue().'<br>';	
					}
				}

				// if(strpos($worksheet->getCell('D'.$row)->getValue(), 'นาย') !== false || strpos($worksheet->getCell('D'.$row)->getValue(), 'นางสาว') !== false){										
				// 	//echo 'Sec = '.$sec.'  ';
				// 	echo $worksheet->getCell('C'.$row)->getValue().' '.$worksheet->getCell('D'.$row)->getValue().'<br>';	
				// }else{					
				// 	//echo 'Sec = '.$sec.'  ';
				// 	//echo $worksheet->getCell('C'.$row)->getValue();
				// }
				
				// echo "<tr><td>";
				// echo $worksheet->getCell('B'.$row)->getValue();
				// echo "</td><td>";
				// echo $worksheet->getCell('C'.$row)->getValue();			
				// echo "</td><td>";
				// echo $worksheet->getCell('D'.$row)->getValue();			
				// echo "</td><td>";
				// echo $worksheet->getCell('E'.$row)->getValue();			
				// echo "</td><td>";
				// echo $worksheet->getCell('F'.$row)->getValue();			
				// echo "</td><td>";
				// echo $worksheet->getCell('H'.$row)->getValue();			
				// echo "</td><tr>";
				
			}
			//echo "</table>";	
					
		}
		
	}
?>
