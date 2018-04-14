<?php 
	class Test extends CI_Controller {
	
		public function index()
		{
			$this->readExcel();
		}
		
		public function readExcel(){
			$this->load->library('excel');
			$objReader = PHPExcel_IOFactory::load('assets/upload/classs.xls');
			$sheetData = $objReader->getActiveSheet()->toArray(true,true,true,true);
			echo "<table border=1>";
			$sec = 0;
			$sec_temp = 0;
			foreach ($sheetData as $data) {
				//if (preg_match('/\bare\b/',$a));
				if (strpos($data['B'], 'รหัสวิชา') !== false) {
					//echo $data['B'].'<br> ';					
					$sec = substr($data['B'], strlen($data['B'])-1,1);
					//echo 'Sec = '.$sec.'<br>';
					$code = substr($data['B'],26,6);					
					//echo 'Sub Code = '.$code.'<br>';
					$credit = substr(substr($data['B'],strpos($data['B'], 'หน่วยกิต'),27),24,4);
					//echo 'Credit = '.$credit.'<br>';
					$s_name = str_replace("หน่วยกิต","",substr(substr($data['B'],strpos($data['B'],$code),strpos($data['B'], 'หน่วยกิต')),8));
					//echo 'S Name = '.$s_name.'<br>';
					if($sec == 5){
						//echo "peerasak";
						echo "Sec = ".$sec;

						if (strpos($data['H'], 'ผู้สอน') !== false) {
							echo $data['H'].'<br>';
						}

						if (strpos($data['C'], 'รหัสประจำตัว') !== false) {
							echo $data['C'].'<br>';
						}

						if (strpos($data['D'], 'นาย') !== false || strpos($data['D'], 'นางสาว') !== false) {
							echo $data['D'].'<br>';
						}

					}
				}

				// if (strpos($data['H'], 'ผู้สอน') !== false) {
				// 	echo $data['H'].'<br>';
				// }
				// if (strpos($data['H'], 'ผู้สอน') !== false) {
				// 	echo $data['H'].'<br>';
				// }
				// print_r ($data);
				echo "<tr>";
				//$this->writeColumn($data['A']);
				$this->writeColumn($data['B']);
				$this->writeColumn($data['C']);
				$this->writeColumn($data['D']);
				$this->writeColumn($data['E']);
				$this->writeColumn($data['F']);
				//$this->writeColumn($data['G']);
				$this->writeColumn($data['H']);
				$this->writeColumn($data['I']);
				$this->writeColumn($data['J']);
				echo "</tr>";
			}
			echo "</table>";
		}
		
		public function writeColumn($data){
			echo "<td>$data</td>";
		}
	}
?>
